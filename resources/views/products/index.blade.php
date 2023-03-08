@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Meno kūriniai</div>

                            <div class="card-body">
                                <a href="{{ route("products.create") }}" class="btn btn-success float-end">Pridėti naują meno kūrinį</a>
<hr>
                                <form method="post" action="{{ route('products.search') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Pavadinimas</label>
{{--                                        <input class="form-control" type="text" name="artname" value="{{ $artname }}" >--}}
                                        <input class="form-control" type="text" name="artname" value="{{ $filter->artname??"" }}" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Autoriaus vardas</label>
                                        <input class="form-control" type="text" name="name" value="{{ $filter->name??'' }}" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Autoriaus pavardė</label>
                                        <input class="form-control" type="text" name="surname" value="{{ $filter->surname??'' }}" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kaina</label>
                                        <input class="form-control" type="text" name="price" value="{{ $filter->price??'' }}" >
                                    </div>
                                    <button class="btn btn-info">Ieškoti</button>
                                </form>
                                <hr>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Pavadinimas</th>
                                        <th>Autoriaus vardas</th>
                                        <th>Autoriaus pavardė</th>
                                        <th>Kaina</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->artname }} </td>
                                            <td>{{ $product->name }} </td>
                                            <td>{{ $product->surname }} </td>
                                            <td>{{ $product->price }} </td>
                                            <td>
{{--                                                @foreach( $product->categories as $category)--}}
{{--                                                    {{ $category->genres }}--}}
{{--                                                    {{ $category->techniques}} {{ $category->size}}<br>--}}
{{--                                                @endforeach--}}

                                            </td>
                                            <td style="width: 200px;">
                                                <a href="{{ route("products.edit", $product->id) }}" class="btn btn-success">Redaguoti</a>
{{--                                                @if ($product->categories->count()==0)--}}
                                                <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">Ištrinti</a>
{{--                                                @endif--}}
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
