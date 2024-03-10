@extends('layout')
@section('content')
    <style>
        .container2 {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .user-info {
            margin:100px 0px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 30%;
            margin-right: 50px;
        }
        .car-info{
            margin:100px 0px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 30%;
            margin-left: 50px;
        }

        .user-info h2, .car-info h2 {
            color: #333;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #submit {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        #button:hover {
            background-color: #267bb5;
        }
        .steps .step {
            display: block;
            width: 100%;
            margin-bottom: 35px;
            text-align: center
        }

        .steps .step .step-icon-wrap {
            display: block;
            position: relative;
            width: 100%;
            height: 80px;
            text-align: center
        }

        .steps .step .step-icon-wrap::before,
        .steps .step .step-icon-wrap::after {
            display: block;
            position: absolute;
            top: 50%;
            width: 50%;
            height: 3px;
            margin-top: -1px;
            background-color: #e1e7ec;
            content: '';
            z-index: -1
        }

        .steps .step .step-icon-wrap::before {
            left: 0
        }

        .steps .step .step-icon-wrap::after {
            right: 0
        }

        .steps .step .step-icon {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            border: 1px solid #e1e7ec;
            border-radius: 50%;
            background-color: #f5f5f5;
            color: #374250;
            font-size: 38px;
            line-height: 81px;
        }

        .steps .step .step-title {
            margin-top: 16px;
            margin-bottom: 0;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .steps .step:first-child .step-icon-wrap::before {
            display: none
        }

        .steps .step:last-child .step-icon-wrap::after {
            display: none
        }

        .steps .step.completed .step-icon-wrap::before,
        .steps .step.completed .step-icon-wrap::after {
            background-color: #0da9ef
        }

        .steps .step.completed .step-icon {
            border-color: #0da9ef;
            background-color: #0da9ef;
            color: #fff
        }

        @media (max-width: 576px) {
            .flex-sm-nowrap .step .step-icon-wrap::before,
            .flex-sm-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 768px) {
            .flex-md-nowrap .step .step-icon-wrap::before,
            .flex-md-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 991px) {
            .flex-lg-nowrap .step .step-icon-wrap::before,
            .flex-lg-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 1200px) {
            .flex-xl-nowrap .step .step-icon-wrap::before,
            .flex-xl-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        .bg-faded, .bg-secondary {
            background-color: #f5f5f5 !important;
        }
        .card {
            margin-bottom: 3rem;
        }

        .rounded-top {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .text-center {
            text-align: center;
        }

        .text-white {
            color: #fff;
        }

        .text-lg {
            font-size: 1.25rem;
        }

        .bg-dark {
            background-color: #343a40;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-medium {
            font-weight: 500;
        }



        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .steps {
            padding-top: 2rem;
            padding-bottom: 1rem;
        }

        .padding-top-2x {
            padding-top: 2rem;
        }

        .padding-bottom-1x {
            padding-bottom: 1rem;
        }


    </style>

    <div class="container">
        <div class="section-header">
            <h2>Order page</h2>
        </div>
        <div class="container2">
            <div class="user-info">
                <h2>User information:</h2>
                <form action="{{route('order_store')}}" method="post">
                    @csrf
                <div class="form-group">
                 <img src="{{asset('assets/images/users-resize/'.$user->picture)}}"/>
                </div>
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" id="ime" name="first_name" value="{{$user->first_name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" id="prezime" name="last_name" value="{{$user->last_name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="telefon">Email:</label>
                    <input type="email" id="email" name="email" value="{{$user->email}}" readonly>
                </div>
                <div class="form-group">
                    <label for="location">Location(city with street):</label>
                    <input type="text" id="location" name="location" value="{{old('location')}}"/>
                    @if($errors->has('location'))
                        <p class="alert alert-danger">{{$errors->first('location')}}</p>
                    @endif
                </div>
            </div>
            <div id="kitica">
                <img src="{{asset('assets/images/cars/'.$vehicle->image)}}" alt="Auto slika">
            </div>
            <div class="car-info">
                <h2>Car information:</h2>
                <div class="form-group">
                    <label for="marka">Brand:</label>
                    <input type="text" id="marka" value="{{$vehicle->marka_naziv}}" readonly>
                </div>
                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text" id="model" value="{{$vehicle->model_naziv}}" readonly>
                </div>
                <div class="form-group">
                    <label for="godina">Manufactured Year:</label>
                    <input type="text" id="godina" value="{{$vehicle->year}}" readonly>
                </div>
                <div class="form-group">
                    <label for="boja">Color:</label>
                    <input type="text" id="boja" value="{{$vehicle->boja_naziv}}" readonly>
                </div>
                <div class="form-group">
                    <label for="gorivo">Fuel:</label>
                    <input type="text" id="gorivo" value="{{$vehicle->gorivo_naziv}}" readonly>
                </div>
                <div class="form-group">
                    <label for="karoserija">Body Type:</label>
                    <input type="text" id="karoserija" value="{{$vehicle->karoserija_naziv}}" readonly>
                </div>
                <div class="form-group">
                    <label for="cena">Price:</label>
                    <input type="text" id="cena" value="{{$vehicle->price}}" readonly>
                </div>
            </div>
        </div>
        <div class="basic_text dj-t-mb-5">
            <h4>Ordering your dream car is a seamless process at our dealership. Choose from a wide range of models, customize your preferences, and leave the rest to us. Our easy-to-use online form ensures a hassle-free ordering experience. Feel free to reach out to our dedicated support team for any assistance along the way</h4>
        </div>

            <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}"/>
            <input type="hidden" name="user_id" value="{{$user->id}}"/>
            <input type="submit" id="submit" value="Finish Order"/>
        </form>
        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif
    </div>


@endsection
