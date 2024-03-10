@extends('layout')
@section('filter')
    <style>
        .text-bg-danger {
            background-color: #e74c3c;
            color: #fff;
        }

        /* Secondary */
        .text-bg-warning {
            background-color: #f39c12;
            color: #fff;

        }

        /* Success */
        .text-bg-success {
            background-color: #2ecc71;
            color: #fff;

        }
        .row_ispis{
            display: flex;
            flex-direction: column;
            background-color: #f0f0f0; /* Dodajte sivu pozadinsku boju */
            padding: 10px;
        }
        .element {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .element p {
            margin: 5px 0;
        }
    </style>
    <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="model-search-content">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2>brand</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control" id="brend_id">
                                                <option value="0">Choose</option>
                                                @foreach($marka as $m)
                                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach

                                            </select><!-- /.select-->
                                        </div><!-- /.model-select-icon -->
                                    </div>
                                    <div class="single-model-search">
                                        <h2>body type</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control"  id="karoserija">

                                                <option value="0">Choose</option><!-- /.option-->
                                                @foreach($karoserije as $karoserija)
                                                    <option value="{{$karoserija->id}}">{{$karoserija->name}}</option>
                                                @endforeach

                                            </select><!-- /.select-->
                                        </div><!-- /.model-select-icon -->
                                    </div>
                                </div>
                                <div class="col-md-offset-1 col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2>model</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control"  id="modeli">
                                            </select><!-- /.select-->
                                        </div><!-- /.model-select-icon -->
                                    </div>
                                    <div class="single-model-search">
                                        <h2>Price from</h2>
                                        <div class="model-select-icon">
                                            <input type="text" class="form-control" name="cena_od" id="cena_od"/>
                                        </div><!-- /.model-select-icon -->
                                    </div>

                                </div>
                                <div class="col-md-offset-1 col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2>fuel</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control"  id="gorivo">
                                                <option value="0">Choose</option><!-- /.option-->
                                                @foreach($goriva as $gorivo)
                                                    <option value="{{$gorivo->id}}">{{$gorivo->name}}</option>
                                                @endforeach

                                            </select><!-- /.select-->
                                        </div><!-- /.model-select-icon -->
                                    </div>
                                    <div class="single-model-search">
                                        <h2>Price to</h2>
                                        <div class="model-select-icon">
                                            <input type="text" class="form-control" name="cena_do" id="cena_do" />
                                        </div><!-- /.model-select-icon -->
                                    </div>
                                </div>


                                <div class="col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2 style="margin-left:40px;">Sorting</h2>
                                        <div class="model-select-icon">
                                            <select id="sorting" class="form-control" style="margin-left:40px;">
                                                <option value="0">Choose</option>
                                                <option value="asc">Price ASC</option>
                                                <option value="desc">Price DESC</option>
                                            </select>
                                        </div><!-- /.model-select-icon -->
                                    </div>
                                    <div class="single-model-search text-center">
                                        <button class="welcome-btn model-search-btn" id="searchButton">
                                            search
                                        </button>
                                        @if(\Illuminate\Support\Facades\Session::has('user'))
                                            <button type="button" id="favouriteButton" class="btn btn-primary welcome-btn model-search-btn" style="display: none" data-id="{{\Illuminate\Support\Facades\Session::get('user')->id}}" data-toggle="modal" data-target="#myModal">Bookmark search</button>
                                            <button type="button" style="margin-top:20px; margin-left:50px; padding:15px;" class="btn btn-success" id="load_search"  data-id="{{\Illuminate\Support\Facades\Session::get('user')->id}}" data-toggle="modal" data-target="#exampleModal">
                                                Bookmarked Searches
                                            </button>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('content')
    <section id="featured-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
                <p>checkout <span>the</span> featured cars</p>
                <h2>featured cars</h2>
                @if(\Illuminate\Support\Facades\Session::has('user'))
                <input type="hidden" id="user_id" value="{{\Illuminate\Support\Facades\Session::get('user')->id}}">
                @endif
            </div><!--/.section-header-->
            <div class="featured-cars-content">
                <div class="row" id="ispis_auta">
                </div>
                <div id="paginacija"></div>


            </div>
            </div>
        </div><!--/.container-->

    </section>


    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Bookmark searches</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <label for="imeInput">Name of bookmark</label>
                    <input type="text" class="form-control" id="imeInput">
                    <p style="color: red"></p>
                </div>
                <div id="kategorije">
                    <p id="izabrano" style="text-align: center"></p>
                </div>
                <div id="ispis">
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="save_insert">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bookmarked searches</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name of search</th>
                            <th scope="col">Searches</th>
                            <th scope="col">Date of searches</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ispis_tabela">
                        @if(isset($bookmars))
                            @forelse($bookmars as $b)
                                <tr>
                                    <td>{{$b->name}}</td>
                                    <td>
                                        {{ $b->brand_name ?? '' }}
                                        {{ $b->model_name ?? '' }}
                                        {{ $b->karoserija_name ?? '' }}
                                        {{ $b->gorivo_name ?? '' }}
                                        {{ $b->search_parameters->cena_od ?? '' }}
                                        {{ $b->search_parameters->cena_do ?? '' }}
                                        {{ $b->search_parameters->sorting ?? '' }}
                                    </td>
                                    <td>
                                        {{$b->date_of_archiving}}
                                    </td>
                                    <td>
                                        <button class="ucitaj_search" data-ids="{{json_encode($b->search_parameters)}}"><i class="fa fa-share" style="color:blue"  aria-hidden="true"></i></button>
                                        <button class="obrisi_search" data-delete_id="{{$b->id}}" ><i class="fa fa-trash" style="color: red" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td>There are no bookmarked searches</td></tr>
                            @endforelse
                        @endif

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

