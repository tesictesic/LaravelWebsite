<div class="main-panel">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$tabelaa}}</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" action="{{route($tabelaa.'.update',$tabelaa!='orders_status'?[rtrim($tabelaa,'s')=>$korisnik->id]:[$tabelaa=>$korisnik->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @foreach($kol as $kolona)
                            @if(!Illuminate\Support\Str::contains($kolona, ['created_at', 'updated_at', 'id', 'remember_token','password','reset_code']) || Illuminate\Support\Str::contains($kolona, '_id'))
                                @if(Illuminate\Support\Str::contains($kolona, '_id') || Illuminate\Support\Str::contains($kolona, 'parent_id'))
                                    @if($ddl1!=null && $tabelaa=='models')
                                            <div class="form-group">
                                                <label for="exampleSelectGender">model</label>
                                                <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                    <option value="0">Choose</option>
                                                    @foreach($ddl1 as $ddl)
                                                        <option value="{{$ddl->id}}"
                                                            {{$ddl->id==$korisnik->parent?"selected":""}}
                                                        >{{$ddl->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        @if($errors->has($kolona))
                                            <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                        @endif
                                            @continue
                                    @endif
                                    @if($ddl1!=null && $kolona=='brand_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">brand</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($ddl1 as $ddl)
                                                    <option value="{{$ddl->id}}"
                                                        {{$ddl->name==$korisnik->marka_naziv?"selected":""}}
                                                    >{{$ddl->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($ddl5!=null)
                                            <div class="form-group">
                                                <label for="exampleSelectGender">model </label>
                                                <select class="form-control" id="exampleSelectGender" name="model_id">
                                                    <option value="0">Choose</option>
                                                    @foreach($ddl5 as $ddl)
                                                        <option value="{{$ddl->id}}" {{$ddl->name==$korisnik->model_naziv?"selected":""}} >{{$ddl->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('model_id'))
                                                    <p class="alert alert-danger">{{$errors->first('model_id')}}</p>
                                                @endif
                                            </div>
                                        @endif
                                        @continue
                                    @endif
                                    @if($ddl2!=null && $kolona=='car_body_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">car body</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($ddl2 as $ddl)
                                                    <option value="{{$ddl['id']}}"
                                                        {{$ddl['id']==$korisnik->car_body_id?"selected":""}}
                                                    >{{$ddl['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @continue
                                    @endif
                                    @if($ddl3!=null && $kolona=='fuel_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">fuel</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($ddl3 as $ddl)
                                                    <option value="{{$ddl['id']}}"
                                                        {{$ddl['id']==$korisnik->fuel_id?"selected":""}}
                                                    >{{$ddl['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @continue
                                    @endif
                                    @if($ddl4!=null && $kolona=='color_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">color</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($ddl4 as $ddl)
                                                    <option value="{{$ddl['id']}}"
                                                        {{$ddl['id']==$korisnik->color_id?"selected":""}}
                                                    >{{$ddl['color_name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @continue
                                    @endif

                                    @if($ddl1!=null)
                                        @if($tabelaa=='car_price')
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">{{ substr($kolona,0,strpos($kolona,'_')) }}</label>
                                                    <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                        <option value="0">Choose</option>
                                                        @foreach($ddl1 as $ddl)
                                                            <option value="{{$ddl['id']}}"
                                                                {{$ddl['id']==$korisnik->id?"selected":""}}
                                                            >{{$ddl['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @continue
                                            @endif
                                        <div class="form-group">
                                            <label for="exampleSelectGender">{{ substr($kolona,0,strpos($kolona,'_')) }}</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($ddl1 as $ddl)
                                                    <option value="{{$ddl['id']}}"
                                                        {{$ddl['id']==$korisnik->$kolona?"selected":""}}
                                                    >{{$ddl['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @continue
                                    @endif
                                @elseif(Illuminate\Support\Str::contains($kolona, 'description'))
                                    <div class="form-group">
                                        <label for="exampleTextarea1">{{$kolona}}</label>
                                        <textarea class="form-control" name="{{$kolona}}" id="exampleTextarea1" rows="4">{{$korisnik->$kolona}}</textarea>
                                    </div>
                                @elseif(Illuminate\Support\Str::contains($kolona, 'price'))
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" class="form-control" name="price" value="{{$korisnik->$kolona}}"/>
                                    </div>
                                @elseif(Illuminate\Support\Str::contains($kolona, 'image') || Illuminate\Support\Str::contains($kolona, 'picture') || Illuminate\Support\Str::contains($kolona, 'icon'))
                                    <div class="form-group">
                                        <label>{{$kolona}}:</label>
                                        <input type="file" class="form-control" name="{{$kolona}}"/>
                                    </div>
                                @elseif(Illuminate\Support\Str::contains($kolona, 'date_of') || Illuminate\Support\Str::contains($kolona, 'date_to'))
                                    <div class="form-group">
                                        <label>{{$kolona}}</label>
                                        <input type="date" name="{{$kolona}}" class="form-control" value="{{$korisnik->$kolona}}"/>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">{{ $kolona }}</label>
                                        <input type="text" class="form-control" id="{{ $kolona }}" name="{{ $kolona }}" value="{{$errors->has($kolona)?old($kolona):$korisnik->$kolona}}">
                                        @if($errors->has($kolona))
                                            <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        <button type="submit" class="btn btn-primary mr-2">Edit</button>
                        <a href="{{route($tabelaa.'.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(session('greska'))
        <p class="alert alert-danger">{{session('greska')}}</p>
    @endif
</div>

