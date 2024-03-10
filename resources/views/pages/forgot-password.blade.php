@extends('layout')
@section('content')
    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

    @if(!isset($user))
            <div class="container dj-t-mt-3">
                <div class="row">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="text-center">
                                <div>
                                    <h2>Please enter here your email:</h2>
                                </div>
                                <fieldset>
                                    <form action="{{route('reset_password_next')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
                                            @if($errors->has('email'))
                                                <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                            @endif
                                        </div>
                                        <input class="btn btn-lg btn-primary btn-block" value="Send email" type="submit">

                                    </form>
                                    <form action="{{route('login')}}" method="get">
                                        <input type="submit" value="Go Back" class="btn btn-warning btn btn-lg btn-block">
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    @else
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/users-resize/'.$user->picture)}}" width="180" class="img-thumbnail logo img-circle"/>
                            <div>
                                <h3 class="text-center">{{$user->first_name." ".$user->last_name}}</h3>
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <form action="{{route('reset_password_finish')}}" method="post">
                                        @csrf
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="password_new" name="password" id="password" type="password"/>
                                        <small>Your password require 8 characters at least one uppercase one lowercase one symbol</small>
                                        @if($errors->has('password'))
                                            <p class="alert alert-danger">{{$errors->first('password')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="repeat password" name="re_password" id="re_password" type="password"/>
                                        @if($errors->has('re_password'))
                                            <p class="alert alert-danger">{{$errors->first('re_password')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}"/>
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Reset" />
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection
