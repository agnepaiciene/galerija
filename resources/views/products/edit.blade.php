@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Meno kūriniai</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("products.update", $product->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label class="form-label">Meno kūrinio pavadinimas</label>
                                <input type="text" class="form-control" name="artname" value="{{$product->artname}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autoriaus vardas</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autoriaus pavardė</label>
                                <input type="text" class="form-control" name="surname" value="{{$product->surname}}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kaina</label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}">

                            </div>

                            <button class="btn btn-success">Išsaugoti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
