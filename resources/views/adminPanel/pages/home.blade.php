@extends('adminPanel.adminlayout')
@section('admin_content')
    <style>


        /* Obrub za badge-ove */
        .badge-outline-primary {
            color: #007bff;
            border: 2px solid #007bff;
            background-color: transparent; /* Dodaj transparentnu pozadinu */
        }

        .badge-outline-success {
            color: #28a745;
            border: 2px solid #28a745;
            background-color: transparent;
        }

        .badge-outline-danger {
            color: #dc3545;
            border: 2px solid #dc3545;
            background-color: transparent;
        }

        .badge-outline-warning {
            color: #ffc107;
            border: 2px solid #ffc107;
            background-color: transparent;
        }

        .badge-outline-info {
            color: #17a2b8;
            border: 2px solid #17a2b8;
            background-color: transparent;
        }

        /* Prilagodba boje pozadine za tip gumba */
        button {
            background-color: transparent !important; /* Dodaj !important kako bi osigurao primjenu stila */
            border: none;
            cursor: pointer;
            outline: none;
        }
    </style>
    <div class="main-panel">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Logs</h4>
                        <div class="d-flex mb-3">
                            <button class="badge badge-outline-primary mx-2" onclick="FilterLogs(this)" data-log="All">All</button>
                            <button  class="badge badge-outline-success mx-2"  onclick="FilterLogs(this)" data-log="Login" >Login</button>
                            <button  class="badge badge-outline-danger mx-2" onclick="FilterLogs(this)" data-log="Logout" >Logouts</button>
                            <button  class="badge badge-outline-warning mx-2" onclick="FilterLogs(this)" data-log="Register">Register</button>
                            <button  class="badge badge-outline-info mx-2" onclick="FilterLogs(this)" data-log="Order" >Orders</button>
                            <button  class="badge badge-outline-info mx-2" onclick="FilterLogs(this)" data-log="Servicing" >Servicing</button>
                            <div class="mr-auto"></div>
                                <div class="input-group">
                                    <input type="date" class="form-control" placeholder="date_of" name="date_of" onchange="FilterLogs(this)" style="margin-left: 20px;"/>
                                    <input type="date" class="form-control" placeholder="date_to" name="date_to" onchange="FilterLogs(this)" style="margin-left: 20px;"/>
                                </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light fw-semibold">
                                <tr>
                                    <th>Value</th>
                                    <th>Log type</th>
                                </tr>
                                </thead>
                                <tbody id="ispis">
                                @if(count($logs)>0)
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>{{$log->value}}</td>
                                            <td>
                                            @if($log->name=='Login')
                                                <div class="badge badge-outline-success">{{$log->name}}</div>
                                            @elseif($log->name=='Logout')
                                                <div class="badge badge-outline-danger">{{$log->name}}</div>
                                                @elseif($log->name=='Register')
                                                    <div class="badge badge-outline-warning">{{$log->name}}</div>
                                                @else
                                                    <div class="badge badge-outline-info">{{$log->name}}</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td>
                                        There are no logs right now
                                    </td>
                                @endif

                                </tbody>
                            </table>
                            <div id="paginacija" style="text-align: center"></div>
                            {{$logs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
