@extends('layout')
@section('content')
    <style>
        /* Stilizacija kartice */
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Stilizacija slike */
        .card-body img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        /* Stilizacija naslova i opisa */
        .card-body h2 {
            color: #17a2b8; /* Bootstrap primary color */
        }

        .card-body p {
            margin-bottom: 20px;
        }

        /* Stilizacija forme */
        .form-control {
            text-align: center;
        }

        /* Stilizacija dugmeta */
        .btn {
            background-color: #17a2b8; /* Bootstrap primary color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Stilizacija grešaka */
        .alert-danger {
            background-color: #f8d7da; /* Bootstrap danger background color */
            color: #721c24; /* Bootstrap danger text color */
            border: 1px solid #f5c6cb; /* Bootstrap danger border color */
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
    <div class="container">
        <br>
        <div class="row" style="display:flex;justify-content: center;">
            <div class="col-lg-5 col-md-7 mx-auto my-auto">
                <div class="card" style="padding: 20px;">
                    <div class="card-body px-lg-5 py-lg-5 text-center">
                        <img src="{{asset('assets/images/users-resize/'.$user->picture)}}" class="rounded-circle avatar-lg img-thumbnail mb-4" alt="profile-image">
                        <h2 class="text-info">2FA Security</h2>
                        <p class="mb-4">Enter 6-digits code from your athenticatior app.</p>
                        <form action="{{route('user_check_code')}}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-lg-2 col-md-2 col-2 ps-0 ps-md-2">
                                    <input type="text" class="form-control text-lg text-center" maxlength="1" name="first_char" placeholder="_" aria-label="2fa">
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ps-0 ps-md-2">
                                    <input type="text" class="form-control text-lg text-center" maxlength="1" name="second_char" placeholder="_" aria-label="2fa">
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ps-0 ps-md-2">
                                    <input type="text" class="form-control text-lg text-center" maxlength="1" name="third_char" placeholder="_" aria-label="2fa">
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 pe-0 pe-md-2">
                                    <input type="text" class="form-control text-lg text-center" maxlength="1" name="four_char" placeholder="_" aria-label="2fa">
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 pe-0 pe-md-2">
                                    <input type="text" class="form-control text-lg text-center" maxlength="1" name="five_char" placeholder="_" aria-label="2fa">
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 pe-0 pe-md-2">
                                    <input type="text" class="form-control text-lg text-center" maxlength="1" name="six_char" placeholder="_" aria-label="2fa">
                                </div>
                                <div>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                </div>
                            </div>
                            <div class="text-center" style="margin-top:30px;">
                                <input type="submit" class="btn bg-info btn-lg my-4" value="Continue"/>
                            </div>
                        </form>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
