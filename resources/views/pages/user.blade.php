@extends('layout')
@section('content')

    <style>
        .spinner-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-spinner {
            border: 4px solid #3498db; /* Boja spiner-a */
            border-top: 4px solid transparent;
            border-radius: 50%;
            width: 24px; /* Prilagodite veličinu spiner-a */
            height: 24px; /* Prilagodite veličinu spiner-a */
            animation: spin 1s linear infinite; /* Animacija za rotaciju */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .status-circle {
            width: 16px; /* Prilagodite veličinu kružića */
            height: 16px; /* Prilagodite veličinu kružića */
            border-radius: 50%;
            background-color: #2ecc71; /* Zelena boja */
            margin-left: 10px; /* Razmak između spiner-a i kružića */
        }

        .completed {
            background-color: #2ecc71; /* Zelena boja kada je završeno */
        }
    </style>

    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-sm-2 dj-t-mt-3" style="margin:20px 40px;">
                <img title="profile image" class="img-circle img-responsive" style=" border: 1px solid red;" src="{{asset('assets/images/users-resize/'.$user->picture)}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">

                <ul class="list-group">
                    <li class="list-group-item text-muted">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>First Name:</strong></span>{{$user->first_name}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Last Name:</strong></span>{{$user->last_name}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Email:</strong></span>{{$user->email}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Role:</strong></span>{{$user->role_name}}</li>
                </ul>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Liked car</strong></span>{{$user_lajkovana_auta_broj}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Liked comments</strong></span>{{$user_lajkovani_komentari}}</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Owned cars</strong></span>{{$user_cars}}</li>
                </ul>

            </div>

            <div class="col-sm-9">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#home1" data-toggle="tab">History of Bying</a></li>
                    <li><a href="#messages" data-toggle="tab">History of car reviews</a></li>
                    <li><a href="#service" data-toggle="tab">History of servicing cars</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home1">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Fuel</th>
                                    <th>Body Typ</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Date of buying</th>
                                    <th>Delivery status</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                @if(count($user_narudzbine)>0)
                                    @foreach($user_narudzbine as $narudzbina)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$narudzbina->marka_naziv}}</td>
                                            <td>{{$narudzbina->model_naziv}}</td>
                                            <td>{{$narudzbina->gorivo_naziv}}</td>
                                            <td>{{$narudzbina->karoserija_naziv}}</td>
                                            <td>{{$narudzbina->boja_naziv}}</td>
                                            <td>${{$narudzbina->price}}</td>
                                            <td>{{$narudzbina->datum}}</td>
                                            <td>{{$narudzbina->status_name}}</td>
                                            <td>
                                                @if ($narudzbina->status_id == 2)
                                                    <div class="spinner-container">
                                                        <div class="custom-spinner"></div>
                                                    </div>
                                                @elseif ($narudzbina->status_id == 1)
                                                    <div class="status-circle completed"></div>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <td>There are no user bought car</td>
                                @endif
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <div class="tab-pane" id="messages">
                        <h2></h2>
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Fuel</th>
                                <th>Body Typ</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Number of stars</th>
                            </tr>
                            </thead>
                            <tbody id="items">
                            @if(count($user_lajkovana_auta)>0)
                                @foreach($user_lajkovana_auta as $x)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$x->marka_naziv}}</td>
                                        <td>{{$x->model_naziv}}</td>
                                        <td>{{$x->gorivo_naziv}}</td>
                                        <td>{{$x->karoserija_naziv}}</td>
                                        <td>{{$x->boja_naziv}}</td>
                                        <td>${{$x->price}}</td>
                                        <td>{{$x->value}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td>There are no user liked car</td></tr>
                            @endif

                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="service">
                        <h2></h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car</th>
                                    <th>Services Items</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody id="items">
                                @if(count($services)>0)

                                    @foreach($services as $index=>$s)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$s['marka_naziv']." ".$s['model_naziv']." ".$s['label']}}</td>
                                            <td>{{$s['services']}}</td>
                                            <td>${{$s['total_price']}}</td>

                                      </tr>
                                    @endforeach
                                @else
                                    <tr><td>There are no serviced car</td></tr>
                                @endif

                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings">
                        <hr>
                        <form class="form" action="{{route('edit')}}" method="post" enctype="multipart/form-data" id="registrationForm">
                            @csrf
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any."
                                    value="{{$user->first_name!=null?$user->first_name:old('first_name')}}"
                                    >
                                    @if($errors->has('first_name'))
                                        <p class="alert alert-danger">{{$errors->first('first_name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any."
                                       value="{{$user->last_name!=null?$user->last_name:old('last_name')}}"
                                    >
                                    @if($errors->has('last_name'))
                                        <p class="alert alert-danger">{{$errors->first('last_name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email."
                                        value="{{$user->email!=null?$user->email:old('email')}}"
                                    >
                                    @if($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Picture</h4></label>
                                    <input type="file" class="form-control" id="file" name="picture"/>
                                    @if($errors->has('picture'))
                                        <p class="alert alert-danger">{{$errors->first('picture')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="slika" name="user_id" value="{{$user->id}}" >
                            </div>


                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection
