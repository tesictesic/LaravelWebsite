@extends('layout')
@section('content')
    <div class="container dj-t-mt-5">
        <div class="row">
            <!-- Login forma -->
            <div class="col-md-6">
                <h2 class="dj-t-mb-3">Login</h2>
                <form action="{{route('login.login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                @if(session('error-msg'))
                    <p class="alert alert-danger">{{session('error-msg')}}</p>
                @endif
                <p class="dj-t-mt-3">Don't have an account? <a href="{{route('register')}}" id="dj-t-register">Register here</a></p>
                <p class="dj-t-mt-3"><a href="{{route('reset_password')}}" id="dj-t-register">Forgot your password?</a></p>
            </div>
            <div class="col-md-6">
                <p class="dj-t-padding-top80">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses,
                    view and track your orders in your account and more</p>
            </div>
        </div>
    </div>
@endsection
