
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Informacion de</h2> <h1>{{ $redirect->to_url }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            Cantidad de visitas {{ (int)$redirect->count }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            Link pequeño <a href="">{{ $redirect->generated_url }}</a></h1>
        </div>
    </div>
</div>
@endsection
