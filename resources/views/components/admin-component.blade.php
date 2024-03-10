<style>
    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
        color: #636363;
        width: 400px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -10px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }

    .modal-confirm .modal-body {
        color: #999;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
        padding: 10px 15px 25px;
    }

    .modal-confirm .modal-footer a {
        color: #999;
    }

    .modal-confirm .icon-box {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        z-index: 9;
        text-align: center;
        border: 3px solid #f15e5e;
    }

    .modal-confirm .icon-box i {
        color: #f15e5e;
        font-size: 46px;
        display: inline-block;
        margin-top: 13px;
    }

    .modal-confirm .btn,
    .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
    }

    .modal-confirm .btn-secondary {
        background: #c1c1c1;
    }

    .modal-confirm .btn-secondary:hover,
    .modal-confirm .btn-secondary:focus {
        background: #a8a8a8;
    }

    .modal-confirm .btn-danger {
        background: #f15e5e;
    }

    .modal-confirm .btn-danger:hover,
    .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
    #djordje_modal_velicina{
        margin-top:150px;
    }
</style>
<div class="main-panel">
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$table}}</h4>
                <div class="table-responsive">
                    @if($table!='comments')
                    <a href="{{route($table.".create")}}" class="btn btn-primary my-2">Insert</a>
                    @endif
                    <table class="table table-striped border mb-0">
                        <thead class="table-light fw-semibold">
                        <tr>
                            @foreach($columns as $column)
                                @if(($column=="password")||($column=='id')||($column=='reset_code'))
                                    @continue
                                @endif
                                @if($column=='vehicle_id')
                                    <td>vehicle name</td>
                                    @continue
                                @endif
                                @if($column=='user_id')
                                        <td>user name</td>
                                        @continue
                                    @endif
                                @if(($column=="remember_token"))
                                    @continue
                                @endif
                                @if($column=='role_id')
                                    <td>role name</td>
                                    @continue
                                    @endif
                                @if(($column=="service_packet_id"))
                                    <td>service packet</td>
                                    @continue
                                @endif
                                @if($table=='brands')
                                    @if($column=='parent_id')
                                        @continue
                                    @endif
                                @endif
                                @if($table=='vehicles')
                                    @if($column=='brand_id')
                                        <td>brand</td>
                                        @continue
                                    @elseif($column=='car_body_id')
                                        <td>car body</td>
                                        @continue
                                    @elseif($column=='fuel_id')
                                        <td>fuel </td>
                                        @continue
                                    @elseif($column=='color_id')
                                        <td>color </td>
                                        @continue
                                    @endif
                                @endif

                                <th>{{ $column }}</th>
                            @endforeach
                            @if($table!='comments')
                                    <th>Update</th>
                            @endif

                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($datas) > 0)
                            @foreach($datas as $d)
                                <tr>
                                    @foreach($columns as $index => $column)
                                        @if(($column=="password")||($column=='id')||($column=='reset_code'))
                                            @continue
                                        @endif
                                            @if($column=='price')
                                                <td>{{"$".$d->$column}}</td>
                                                @continue
                                            @endif
                                        @if($column=='old_price')
                                            <td>{{$d->$column!=null?"$".$d->$column:""}}</td>
                                            @continue
                                            @endif
                                        @if($column=='vehicle_id')
                                            <td>{{$d->vehicles_name}}</td>
                                            @continue
                                        @endif
                                        @if($column=='service_packet_id')
                                            <td>{{$d->service_packs_name}}</td>
                                            @continue
                                        @endif
                                            @if($column=='user_id')
                                                <td>{{$d->user_name}}</td>
                                                @continue
                                            @endif
                                        @if($column=="remember_token")
                                            @continue
                                        @endif
                                        @if($column=='picture')
                                            <td>
                                                <img src="{{asset('assets/images/users-resize/'.$d->$column)}}" style="width: 50px; height: 50px" alt=""/>
                                            </td>
                                            @continue
                                        @endif
                                        @if($column=='icon')
                                            <td>
                                                <img src="{{asset($d->$column)}}"  alt=""/>
                                            </td>
                                            @continue
                                        @endif
                                        @if($column=='role_id')
                                                    <td>{{$d->roles_name}}</td>
                                                    @continue;
                                        @endif
                                        @if($column=='parent_id')
                                            @continue
                                        @endif
                                        @if($table=='vehicles')
                                            @if($column=='brand_id')
                                                <td>{{$d->marka_naziv}}</td>
                                                @continue
                                            @elseif($column=='car_body_id')
                                                <td>{{$d->karoserija_naziv}}</td>
                                                @continue
                                            @elseif($column=='fuel_id')
                                                <td>{{$d->gorivo_naziv}}</td>
                                                @continue
                                            @elseif($column=='color_id')
                                                <td>{{$d->gorivo_naziv}}</td>
                                                @continue
                                            @elseif($column=='image')
                                                <td>
                                                    <img src="{{asset('assets/images/cars-resize/'.$d->image)}}" style="width: 50px; height: 50px"/>
                                                </td>
                                                @continue
                                            @else
                                            @endif
                                        @endif
                                        <td>{{ $d->$column }}</td>
                                    @endforeach
                                    @if($table!='comments')
                                    <td>
                                        @if($table=='orders_status')
                                            <a class="btn btn-warning" href="{{ route("$table" . '.edit', [$table => $d->id]) }}">Update</a>
                                        @else
                                        <a class="btn btn-warning" href="{{ route("$table" . '.edit', [rtrim($table, 's') => $d->id]) }}">Update</a>
                                        @endif
                                    </td>
                                        @endif
                                    <td>
                                        <a class="btn btn-danger brisanje" data-id="{{ $d->id }}" data-table="{{$table}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="{{ count($columns) + 2 }}">There are no {{ $table }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-3" style="margin: 0px auto; width: 15%;">
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="myModal" class="modal fade" >
    <div class="modal-dialog modal-confirm" id="djordje_modal_velicina">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" id="otkazi" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"  id="delete">Delete</button>
            </div>
        </div>
    </div>
</div>



{{--<div class="row ">--}}
{{--    <div class="col-12 grid-margin">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <h4 class="card-title">Logout Logs</h4>--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>First Name</th>--}}
{{--                            <th>last Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Date:</th>--}}
{{--                        </tr>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @if(count($logouts)>0)--}}
{{--                            @for($i=0;$i<count($logouts);$i++)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$logouts[$i][0]}}</td>--}}
{{--                                    <td>{{$logouts[$i][1]}}</td>--}}
{{--                                    <td>{{$logouts[$i][2]}}</td>--}}
{{--                                    <td>{{$logouts[$i][3]}}</td>--}}
{{--                                </tr>--}}
{{--                            @endfor--}}
{{--                        @else--}}
{{--                            <td>--}}
{{--                                There are no logs right now--}}
{{--                            </td>--}}
{{--                        @endif--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
