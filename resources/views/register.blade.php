
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            Registrar nueva url
        </div>
    </div>

    <form action="/registurl" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Direccion web</label>
            <input name="to_url" type="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="url">
            @error('to_url')
                <div class="text-danger">
                    <small> Direccion web ya registrada</small>
                </div>
            @enderror
            <small id="emailHelp" class="form-text text-muted">Ingrese una url por exemplo http://www.google.com</small>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
