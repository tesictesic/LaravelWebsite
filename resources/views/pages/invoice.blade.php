
@extends('layout')
@section('content')
    <style>
        .text-danger strong {
            color: #9f181c;
        }
        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }
        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }
        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }
        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }
        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }
        .receipt-main thead th {
            color:#fff;
        }
        .receipt-right h5 {
            font-size: 20px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }
        .receipt-right p {
            font-size: 18px;
            margin: 0px;
        }
        .receipt-right p i {
            text-align: center;
            width: 18px;
        }
        .receipt-main td {
            padding: 9px 20px !important;
        }
        .receipt-main th {
            padding: 13px 20px !important;
        }
        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }
        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }
        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }
        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }
        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>
    <div class="col-md-12 dj-t-mt-5">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <div class="container padding-bottom-3x mb-1">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                        <div class="step completed">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-car"></i></div>
                            </div>
                            <h4 class="step-title">Choose Car</h4>

                        </div>
                        <div class="step completed">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-config"></i></div>
                            </div>
                            <h4 class="step-title">Processing Servicing</h4>
                        </div>
                        <div class="step completed">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-cart"></i></div>
                            </div>
                            <h4 class="step-title">Confirmed Servicing</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div id="printaj">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="{{asset('assets/images/users-resize/'.$vehicle_user->picture)}}" style="width: 71px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>CarVilla</h5>
                                <p >57634567 <i class="fa fa-phone"></i></p>
                                <p>carvilla@gmail.com<i class="fa fa-envelope-o"></i></p>
                                <p>Serbia<i class="fa fa-location-arrow"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5>{{$vehicle_user->first_name." ".$vehicle_user->last_name}}</h5>
                                <p><b>Email: {{$full_user->email}}</p>
                                <p><b>Role: </b>{{$full_user->role_name}}</p>
                                <p><b>Vehicle: {{$vehicle_user->marka_naziv." ".$vehicle_user->model_naziv." ".$vehicle_user->label}}</p>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h3>INVOICE # {{rand(100,10000)}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Service pack name</th>
                            <th>Service name</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $total=0;
                        @endphp
                        @foreach($usluge as $usluga)
                            @php
                            $total=$total+(int)$usluga->price
                            @endphp
                            <tr>
                                <td class="col-md-3">{{$usluga->service_name}}</td>
                                <td class="col-md-3">{{$usluga->name}}</td>
                                <td class="col-md-9">{{$usluga->description}}</td>
                                <td class="col-md-3"><img src="{{asset($usluga->icon)}}"/></td>
                                <td class="col-md-3">${{$usluga->price}}</td>
                            </tr>
                        @endforeach
                        </tr>
                            <td class="text-right" colspan="2"><h2><strong>Total: </strong></h2></td>
                            <td class="text-right" colspan="3"><h2><strong><i class="fa fa-usd" aria-hidden="true"></i>{{$total}}</strong></h2></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <p><b>Date of servicing: </b>{{$date}}</p>
                                @if($note!=null)
                                   <div id="note" style="word-break: break-all; width: 55%;">
                                       <p>Note:<small style="font-weight: normal;">{{$note}}</small></p>
                                   </div>
                                @endif
                                <h5 style="color: rgb(140, 140, 140);">Thanks for servicing.!</h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left d-flex" style="justify-content: end">
                                <form action="{{route('insert_services')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="{{$full_user->id}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="vehicle_id" value="{{$vehicle_user->vehicle_id}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="services_id" value="{{json_encode($services_id)}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="date" value="{{$date_insert}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="note" value="{{$note}}"/>
                                    </div>
                                    @if(!(session('success')))
                                    <input type="submit" class="btn btn-success" value="Finish Service"/>
                                    @endif
                                </form>
                                @if(session('success'))
                                    <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif
    </div>
@endsection


