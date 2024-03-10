@extends('layout')
@section('content')
    <div class="dj-t-mt-5">

        <div class="container">
            <h2 class="dj-t-mb-5">Contact admin</h2>

            <form action="{{route('checkMessage')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ime">Name:</label>
                    <input type="text" class="form-control" id="ime" name="name" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <p>{{$errors->first('name')}}</p>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            <p>{{$errors->first('email')}}</p>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}">
                    @if($errors->has('subject'))
                        <div class="alert alert-danger">
                            <p>{{$errors->first('subject')}}</p>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" >{{old('message')}}</textarea>
                    @if($errors->has('message'))
                        <div class="alert alert-danger">
                            <p>{{$errors->first('message')}}</p>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
            @if (session('success-msg'))
                <div class="alert alert-success">
                    <p>{{session('success-msg')}}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
