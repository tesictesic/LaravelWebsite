@extends('layout')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <div class="container dj-t-mt-5">
        <div class="container padding-bottom-3x mb-1">
            <div class="card mb-3">

                <div class="card-body">
                    <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                        <div class="step">
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
        <div class="jumbotron">
            <h1 class="display-4">Welcome {{\Illuminate\Support\Facades\Session::get('user')->first_name}}!</h1>
            <p class="lead">Choose vehicle.</p>
            <form action="{{route('service-panel')}}" method="GET">
                <div class="form-group">
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Session::get('user')->id}}">
                </div>
            <div class="form-group">
                <select class="form-control" id="ddlVozila" name="vehicle_id">
                    @foreach($vehicles as $veh)
                        <option value="{{$veh->id}}">{{$veh->marka_naziv." ".$veh->model_naziv." ".$veh->label}}</option>
                    @endforeach
                    <!-- Dodajte dodatne opcije prema potrebi -->
                </select>
            </div>
            <button class="btn btn-primary" onclick="preusmeriNaServis()">Choose services</button>
            </form>
        </div>
    </div>
@endsection
