
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("categories.edit", $category->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label class="form-label">Technika</label>
                                <input type="text" class="form-control" name="techniques" value="{{$category->techniques}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dydis</label>
                                <input type="text" class="form-control" name="size" value="{{$category->size}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Žanras</label>
                                <input type="text" class="form-control" name="genres" value="{{$category->genres}}">

                            </div>

                            <div class="mb-3">
                                <label class="form-label"> Autorius</label>

                                <select name="product_id" class="form-select">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ ($product->id==$category->product_id)?'selected':'' }}>{{ $product->artname }} {{ $product->name }} {{ $product->surname }} {{ $product->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"> Autorius</label>

                                                            <select name="product_id" class="form-select">
                                                                @foreach($products as $product)
                                                                    <option value="{{ $product->id }}"  {{ ($product->id==$category->product_id)?'selected':'' }}>{{ $product->surname }}{{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                            <button class="btn btn-success">Išsaugoti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

