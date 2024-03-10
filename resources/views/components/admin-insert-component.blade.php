<div class="main-panel">
    <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{{$tabela}}</h4>
                <p class="card-description"> Basic form layout </p>
                <form class="forms-sample" action="{{route($tabela.'.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="table" value="{{$tabela}}">
                    @foreach($kolone as $kolona)

                        @if(!Illuminate\Support\Str::contains($kolona, ['created_at', 'updated_at', 'id', 'remember_token','reset_code']) || Illuminate\Support\Str::contains($kolona, '_id'))
                            @if(Illuminate\Support\Str::contains($kolona, '_id') || Illuminate\Support\Str::contains($kolona, 'parent_id'))
                                @if($lista1!=null && $tabela=='models')
                                    <div class="form-group">
                                        <label for="exampleSelectGender">model</label>
                                        <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                            <option value="0">Choose</option>
                                            @foreach($lista1 as $ddl)
                                                <option value="{{$ddl->id}}" {{old($kolona)==$ddl->id?"selected":""}}
                                                >{{$ddl->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has($kolona))
                                        <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                    @endif
                                    @continue
                                @endif
                                @if($lista1!=null && $kolona=='brand_id')
                                    <div class="form-group">
                                        <label for="exampleSelectGender">brand</label>
                                        <select class="form-control" id="{{$kolona}}" name="{{$kolona}}">'
                                            <option value="0">Choose</option>
                                            @foreach($lista1 as $ddl)
                                                <option value="{{$ddl->id}}" {{old($kolona)==$ddl['id']?'selected':""}}>{{$ddl->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has($kolona))
                                            <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                        @endif
                                    </div>
                                        <div class="form-group" id="djordje-none">
                                            <label for="exampleSelectGender">model_id</label>
                                            <h3 id="djordje_h3"></h3>
                                            <select class="form-control" id="model_id" name="model_id">
                                                <option value="0">Choose</option>
                                            </select>
                                            @if($errors->has('model_id'))
                                                <p class="alert alert-danger">{{$errors->first('model_id')}}</p>
                                            @endif
                                        </div>
                                    @continue
                                @endif

                                @if($lista2!=null && $kolona=='car_body_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">car body</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($lista2 as $ddl)
                                                    <option value="{{$ddl['id']}}" {{old($kolona)==$ddl['id']?'selected':""}}>{{$ddl['name']}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has($kolona))
                                                <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                            @endif
                                        </div>
                                        @continue
                                    @endif
                                    @if($lista3!=null && $kolona=='fuel_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">fuel</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($lista3 as $ddl)
                                                    <option value="{{$ddl['id']}}" {{old($kolona)==$ddl['id']?'selected':""}}>{{$ddl['name']}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has($kolona))
                                                <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                            @endif
                                        </div>
                                            @continue
                                    @endif
                                    @if($lista4!=null && $kolona=='color_id')
                                        <div class="form-group">
                                            <label for="exampleSelectGender">color</label>
                                            <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                <option value="0">Choose</option>
                                                @foreach($lista4 as $ddl)
                                                    <option value="{{$ddl['id']}}" {{old($kolona)==$ddl['id']?'selected':""}}>{{$ddl['color_name']}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has($kolona))
                                                <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                            @endif
                                        </div>
                                            @continue
                                    @endif
                                        @if(($lista1!=null))
                                            <div class="form-group">
                                                <label for="exampleSelectGender">{{ substr($kolona,0,strpos($kolona,'_')) }}</label>
                                                <select class="form-control" id="exampleSelectGender" name="{{$kolona}}">'
                                                    <option value="0">Choose</option>
                                                    @foreach($lista1 as $ddl)
                                                        <option value="{{$ddl['id']}}" {{old($kolona)==$ddl['id']?'selected':""}}>{{$ddl['name']}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has($kolona))
                                                    <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                                @endif
                                            </div>
                                        @endif
                            @elseif(Illuminate\Support\Str::contains($kolona, 'description'))
                                <div class="form-group">
                                    <label for="exampleTextarea1">{{$kolona}}</label>
                                    <textarea class="form-control" name="{{$kolona}}" placeholder="{{$kolona}}" id="exampleTextarea1" rows="4">{{old($kolona)}}</textarea>
                                    @if($errors->has($kolona))
                                        <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                    @endif
                                </div>
                            @elseif(Illuminate\Support\Str::contains($kolona, 'password'))
                                <div class="form-group">
                                    <label for="price">{{$kolona}}</label>
                                    <div class="password-container">
                                        <input type="password" id="password" placeholder="{{$kolona}}" name="{{$kolona}}" class="form-control" value="{{old($kolona)}}"/>
                                        <span class="mdi mdi-eye" id="togglePassword"></span>
                                    </div>
                                    <small>Your password require 8 characters at least one uppercase one lowercase one symbol</small>
                                    @if($errors->has($kolona))
                                        <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                    @endif
                                </div>
                            @elseif(Illuminate\Support\Str::contains($kolona, 'price')||(Illuminate\Support\Str::contains($kolona, 'seats')||(Illuminate\Support\Str::contains($kolona, 'horsepower')||(Illuminate\Support\Str::contains($kolona, 'year')))))
                                <div class="form-group">
                                    <label for="price">{{$kolona}}</label>
                                    <input type="number" id="{{$kolona}}" placeholder="{{$kolona}}" name="{{$kolona}}" class="form-control" value="{{old($kolona)}}"/>
                                    @if($errors->has($kolona))
                                        <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                    @endif
                                </div>
                            @elseif(Illuminate\Support\Str::contains($kolona, 'image') || Illuminate\Support\Str::contains($kolona, 'picture') || Illuminate\Support\Str::contains($kolona, 'icon'))
                                <div class="form-group">
                                    <label>{{$kolona}}:</label>
                                    <input type="file" class="form-control" name="{{$kolona}}" value="{{old($kolona)}}"/>
                                    @if($errors->has($kolona))
                                        <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                    @endif
                                </div>
                            @elseif(Illuminate\Support\Str::contains($kolona, 'date_of') || Illuminate\Support\Str::contains($kolona, 'date_to'))
                                <div class="form-group">
                                    <label>{{$kolona}}</label>
                                    <input type="date" name="{{$kolona}}" class="form-control"  value="{{old($kolona)}}"/>
                                </div>
                                @if($errors->has($kolona))
                                    <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                @endif
                            @else
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{ $kolona }}</label>
                                    <input type="text" class="form-control" id="{{ $kolona }}" name="{{ $kolona }}" placeholder="{{ $kolona }}" value="{{old($kolona)}}">
                                    @if($errors->has($kolona))
                                        <p class="alert alert-danger">{{$errors->first($kolona)}}</p>
                                    @endif
                                </div>
                            @endif
                        @endif
                    @endforeach
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route($tabela.'.index')}}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

