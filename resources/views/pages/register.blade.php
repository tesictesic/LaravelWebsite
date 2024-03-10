@extends('layout')
@section('content')

    <div class="container dj-t-mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="dj-t-mb-3">Registration Form</h2>
                <form method="post" action="{{route('register.register')}}">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter first name" value="{{old('first_name')}}">
                        @if($errors->has('first_name'))
                                <p class="alert alert-danger">{{$errors->first('first_name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter last name" value="{{old('last_name')}}">
                        @if($errors->has('last_name'))
                            <p class="alert alert-danger">{{$errors->first('last_name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <p class="alert alert-danger">{{$errors->first("email")}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" {{old('password')}}>
                        <small>Your password require 8 characters at least one uppercase one lowercase one symbol</small>
                        @if($errors->has('password'))
                            <p class="alert alert-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="re-password">Retype Password</label>
                        <input type="password" class="form-control" id="re-password" name="re-password" placeholder="Retype password">
                        @if($errors->has('re-password'))
                            <p class="alert alert-danger">{{$errors->first('re-password')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                @if(session('success'))
                    <p class="alert alert-success">{{session('success')}}</p>
                @endif
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22971.89079204288!2d19.542381610266265!3d43.96999084193554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4759b5b3065fab8b%3A0x413e9e18a3c84975!2z0JHQsNGY0LjQvdCwINCR0LDRiNGC0LA!5e0!3m2!1ssr!2srs!4v1709242381417!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
