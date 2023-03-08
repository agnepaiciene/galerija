@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Meno kūriniai</div>

                    <div class="card-body">
                        <form method="post" action="{{ route("products.store") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Meno kūrinio pavadinimas</label>
                                <input type="text" class="form-control" name="artname">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autoriaus vardas</label>
                                <input type="text" class="form-control" name="name">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autoriaus pavardė</label>
                                <input type="text" class="form-control" name="surname">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kaina</label>
                                <input type="text" class="form-control" name="price">

                            </div>

                            <button class="btn btn-success">Pridėti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
