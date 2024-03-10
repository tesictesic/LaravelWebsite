@extends('layout')
@section('content')
    <style>
        .row2 {
            margin-bottom: 10px; /* Razmak između redova */
            background-color: #ffffff; /* Boja pozadine kontejnera */
            padding: 30px; /* Odstupanje unutar kontejnera */
            border-radius: 8px; /* Zaobljeni rubovi */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Senka */
            color: #495057;
        }

        .col-sm-6 {
            font-weight: bold; /* Boldiranje specifikacija (Brand, Model, ...) */
        }
        .content-item {
            padding:30px 0;
            background-color:#FFFFFF;
        }

        .content-item.grey {
            background-color:#F0F0F0;
            padding:50px 0;
            height:100%;
        }

        .content-item h2 {
            font-weight:700;
            font-size:35px;
            line-height:45px;
            text-transform:uppercase;
            margin:20px 0;
        }

        .content-item h3 {
            font-weight:400;
            font-size:20px;
            color:#555555;
            margin:10px 0 15px;
            padding:0;
        }

        .content-headline {
            height:1px;
            text-align:center;
            margin:20px 0 70px;
        }

        .content-headline h2 {
            background-color:#FFFFFF;
            display:inline-block;
            margin:-20px auto 0;
            padding:0 20px;
        }

        .grey .content-headline h2 {
            background-color:#F0F0F0;
        }

        .content-headline h3 {
            font-size:14px;
            color:#AAAAAA;
            display:block;
        }


        #comments {
            box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
            background-color:#FFFFFF;
        }

        #comments form {
            margin-bottom:30px;
        }

        #comments .btn {
            margin-top:7px;
        }

        #comments form fieldset {
            clear:both;
        }

        #comments form textarea {
            height:100px;
        }

        #comments .media {
            border-top:1px dashed #DDDDDD;
            padding:20px 0;
            margin:0;
        }

        #comments .media > .pull-left {
            margin-right:20px;
        }

        #comments .media img {
            max-width:100px;
        }

        #comments .media h4 {
            margin:0 0 10px;
        }

        #comments .media h4 span {
            font-size:14px;
            float:right;
            color:#999999;
        }

        #comments .media p {
            margin-bottom:15px;
            text-align:justify;
        }

        #comments .media-detail {
            margin:0;
        }

        #comments .media-detail li {
            color:#AAAAAA;
            font-size:12px;
            padding-right: 10px;
            font-weight:600;
        }

        #comments .media-detail a:hover {
            text-decoration:underline;
        }

        #comments .media-detail li:last-child {
            padding-right:0;
        }

        #comments .media-detail li i {
            color:#666666;
            font-size:15px;
            margin-right:10px;
        }
    </style>
    <section class="container dj-t-mt-5 car-details">
        <div class="row">
            <div class="col-md-6">

                <img src="{{asset('assets/images/cars/'.$data->image)}}" alt="Automobil" class="car-image">
            </div>
            <div class="col-md-6">
                <h1>{{$data->marka_naziv." ".$data->model_naziv." ".$data->label}}</h1>
                <p class="dj-t-mt-3">
                   {{$data->description}}
                </p>
                <div class="dj-t-mt-3">
                    <strong>
                        Price: ${{$data->price}}
                    </strong>
                    @if(\Illuminate\Support\Facades\Session::has('user'))
                    <a class="btn btn-primary" href="{{route('order.page',['car_id'=>$data->id,"user_id"=>\Illuminate\Support\Facades\Session::get('user')->id])}}" style="margin-left: 30px;">Order</a>
                </div>
                @endif
            </div>




        </div>
                <h2 style="text-align: center; margin:25px 0px;">Specification:</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <div class="row2">
                                    <div class="col-sm-6">Brand:</div>
                                    <div class="col-sm-6">{{ $data->marka_naziv }}</div>
                                </div>
                                <div class="row2">
                                    <div class="col-sm-6">Model:</div>
                                    <div class="col-sm-6">{{ $data->model_naziv }}</div>
                                </div>
                                @if($data->label)
                                    <div class="row2">
                                        <div class="col-sm-6">Number of doors:</div>
                                        <div class="col-sm-6">{{ $data->label }}</div>
                                    </div>
                                @endif
                                <div class="row2">
                                    <div class="col-sm-6">kW:</div>
                                    <div class="col-sm-6">{{ floor($data->horsepower/1.36) }}</div>
                                </div>
                                <div class="row2">
                                    <div class="col-sm-6">ks:</div>
                                    <div class="col-sm-6">{{ $data->horsepower }}</div>
                                </div>
                                <div class="row2">
                                    <div class="col-sm-6">Manufactured year:</div>
                                    <div class="col-sm-6">{{ $data->year }}</div>
                                </div>
                                <div class="row2">
                                    <div class="col-sm-6">Number of doors:</div>
                                    <div class="col-sm-6">{{ $data->seats }}</div>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <section class="content-item" id="comments">
            @if(\Illuminate\Support\Facades\Session::has('user'))
            <div class="container">
                <div class="row">
                    <div class="col-sm-11">
                        <form>
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{\Illuminate\Support\Facades\Session::get('user')->id}}"/>
                            <h3 class="pull-left">New Comment</h3>
                            <button  class="btn btn-primary pull-right" id="dodavanje_komentara">Submit</button>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-3 col-lg-2 hidden-xs">
                                        <img class="img-responsive" src="{{asset('assets/images/users-resize/'.\Illuminate\Support\Facades\Session::get('user')->picture)}}" alt>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                        <textarea class="form-control" id="message"></textarea>
                                        <small>Your message must be greather than 10 elements</small>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
{{--                        <h3>4 Comments</h3>--}}
                        <div id="ispis_komentara">


                        </div>



                    </div>
                </div>
            </div>
            @endif
        </section>
    </section>
    @if(\Illuminate\Support\Facades\Session::has('user'))
    <div id="paginacija" style="text-align: center">dadadadada</div>
    @endif
@endsection
