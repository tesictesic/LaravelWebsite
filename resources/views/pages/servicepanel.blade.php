@extends('layout')
@section('content')

    <div class="container dj-t-mt-5">
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
                        <div class="step">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-config"></i></div>
                            </div>
                            <h4 class="step-title">Processing Servicing</h4>
                        </div>
                        <div class="step">
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
            <div>
                <a href="{{route('service')}}" style="width: 50px; padding: 5px; margin-bottom: 5px; background-color: #007bff; color: #fff; border: 1px solid #007bff; border-radius: 5px; text-align: center">&#8592;</a>
                <a href="{{route('cars')}}" style="width: 50px; padding: 5px; background-color: #6c757d; color: #fff; border: 1px solid #6c757d; border-radius: 5px; text-align: center">X</a>
            </div>
            <h4 class="dj-t-mt-3">Filtering services:</h4>
            <div class="dj-t-mt-3 dj-t-mb-3">
                <button onclick="showAllCheckbox()" style="padding: 5px; background-color: #007bff; color: #fff; border: 1px solid #007bff; border-radius: 5px;">Everything</button>
                @foreach($servispaketi as $paket)
                    <button onclick="filterCheckbox({{$paket->id}})" style="margin-right: 10px; padding: 5px; background-color: #007bff; color: #fff; border: 1px solid #007bff; border-radius: 5px;">{{$paket->name}}</button>
                @endforeach




            </div>
            <form action="{{route('invoice')}}" method="get">
            <div class="col-md-6" style="border: 1px solid #bbb; margin: 30px 0px;">


                <div class="list-group">
                    <div class="list-group-item" style="border: none; ">
                        @foreach($usluge as $usluga)
                        <div class="custom-control custom-checkbox uslugaCheckbox"  data-paket="{{$usluga->service_packet_id}}">
                            <input type="checkbox" class="custom-control-input cekboxovi" name="services[]" id="{{$usluga->name}}" value="{{$usluga->id}}">
                            <label class="custom-control-label" for="{{$usluga->name}}">
                                <img src="{{asset($usluga->icon)}}" alt="Servis 1" class="mr-2" width="30" height="30">
                                {{$usluga->name}}
                            </label>
                            <p style="padding-left: 50px">{{$usluga->description}}</p>
                            <div style="display: flex; justify-content: flex-end">
                                <strong>{{$usluga->price}}$</strong>
                            </div>
                        </div>
                        @endforeach
                            @if($errors->has('services'))
                                <p class="alert alert-danger">{{$errors->first('services')}}</p>
                            @endif


                    </div>
                    <!-- Dodajte slične blokove za ostale servise -->
                </div>
            </div>

            <!-- Box sa napomenom i text areom -->
            <div class="col-md-6 dj-t-mt-3">
                <div class="form-group">
                    <h4 class="">Date:</h4>
                    <input type="date" name="date" id="date" class="form-control"/>
                    @if($errors->has('date'))
                        <p class="alert alert-danger">{{$errors->first('date')}}</p>
                    @endif
                </div>

            </div>
            <div class="col-md-6 dj-t-mt-3" >
                <div class="form-group">
                    <h4 class="">Note:</h4>
                    <textarea class="form-control" id="note" rows="5" name="note"></textarea>
                </div>
                @if($errors->has('note'))
                    <p class="alert alert-danger">{{$errors->first('note')}}</p>
                @endif
            </div>


            <div class="dj-t-mt-3">
                <!-- Box sa prikazom izabranih usluga -->
                <div class="col-md-6 dj-t-mt-5">
                    <input type="hidden" name="vehicle_user" value="{{json_encode($vehicle_user)}}">
                    <div class="card-djordje">
                        <div class="card-body" style="padding:20px;">
                            <p class="card-title"><i class="flaticon-car"></i> {{$vehicle_user->marka_naziv." ".$vehicle_user->model_naziv." ".$vehicle_user->label}}</p>
                            <p class="card-title"><i class="fi fi-sr-user"></i>{{$vehicle_user->first_name."".$vehicle_user->last_name}}</p>
                        </div>

                    </div>
                </div>
        </div>
            <div class="dj-t-mt-3">
                <!-- Box sa prikazom izabranih usluga -->
                <div class="col-md-6 dj-t-mt-5">
                    {{--                    @dd($vehicle_user)--}}
                    <div class="card-djordje">
                        <p class="card-text">Choose service:</p>
                        <ul class="list-group list-group-flush usluge_lista" style="display: flex; flex-direction: column;">

                        </ul>

                        <strong id="ukupno" style="display: flex; justify-content: flex-end"></strong>
                    </div>
                </div>
            </div>

                <!-- Dugme za zakazivanje -->
                <div class="col-md-12">
                    <input type="submit" value="Schedule a service" class="btn btn-primary btn-block mt-4" style="width:50%;margin: 0px auto;"/>
                </div>
            </form>
            </div>
        </div>




@endsection
