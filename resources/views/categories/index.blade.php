@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fw-bold">Kategorijos</div>

                    <div class="card-body ">
                        <a href="{{ route("categories.create") }}" class="btn btn-success float-end mb-3" >Pridėti naują </a>

                        <form method="post" action="{{route('categories.search')}}">
                            @csrf

{{--                            <div class="mb-3">--}}
{{--                                <select class="form-select" aria-label="multiple select example" name="product_id">--}}
{{--                                    <br>--}}

{{--                                    <option  value=""> Pasirinkite meno kūrinį</option>--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <option  value="{{$category->product->id}}" {{ ($category->product->id==$product_id)?'selected':'' }}>{{$category->product->artname}} </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <hr>


                            <div class="mb-3">
                                <label class="form-label">Technika</label>
                                <input class="form-control" type="text" name="techniques" value="{{ $filter->techniques??"" }}">

                            </div>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Dydis</label>
{{--                                <input class="form-control" type="search"  name="size"  value="{{$size}}">--}}
                                <input class="form-control" type="text" name="size" value="{{ $filter->size??"" }}">
                            </div>

                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Žanras</label>
{{--                                <input class="form-control" type="search"  name="genres"  value="{{$genres}}">--}}
                                <input class="form-control" type="text" name="genres" value="{{ $filter->genres??"" }}">
                            </div>

                            <button class=" btn btn-info">Ieškoti</button>

                        </form>
                        <form method="post" action="{{route('categories.forget')}}">
                            @csrf
                            <button class="btn btn-danger m-2 ">Išvalyti paiešką</button>
                        </form>


                        <table class="table">
                            <thead class="fw-bold">
                            <tr class="fw-bold">
{{--                                <th>ID</th>--}}
                                <th class="fw-bold">Technika</th>
                                <th class="fw-bold">Dydis</th>
                                <th class="fw-bold">Žanras</th>
                                <th class="fw-bold">Autoriaus Id</th>
                                <th>Autoriaus Vardas</th>
                                <th>Autoriaus Pavardė</th>
                                <th>Kaina</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
{{--                                    <td>{{ $category->id }} </td>--}}
                                    <td>{{ $category->techniques }} </td>
                                    <td>{{ $category->size }} </td>
                                    <td>{{ $category->genres }} </td>
                                    <td>{{ $category->product_id }}</td>
{{--                                    <td>{{ $category->product->name }}</td>--}}
{{--                                    <td>{{ $category->product->surname}}</td>--}}
{{--                                    <td>{{ $category->product->price}}</td>--}}
                                    <td style="width: 150px;">
                                        <a href="{{ route("categories.edit", $category->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route("categories.destroy", $category->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
