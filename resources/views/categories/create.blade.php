@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route("categories.store") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Technika</label>
                                {{--                                <input type="text" class="form-control" name="reg_number">--}}
                                <input type="text" class="form-control" @error('techniques') is-invalid @enderror name="techniques" value="{{old('techniques') }}">
                                @error('techniques')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dydis</label>
                                {{--                                <input type="text" class="form-control" name="brand">--}}
                                <input type="text" class="form-control" @error('size') is-invalid @enderror name="size" value="{{old('size') }}">
                                @error('size')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Žanras</label>
                                {{--                                <input type="text" class="form-control" name="model">--}}
                                <input type="text" class="form-control" @error('genres') is-invalid @enderror name="genres" value="{{old('genres') }}">
                                @error('genres')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Autoriaus Vardas</label>


                                <select name="product_id" class="form-select">
                                    <option  value=""> Pasirinkite autorių</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} {{ $product->surname }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

