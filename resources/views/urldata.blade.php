
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
            Cantidad de visitas <span> <h1> {{ (int)$redirect->count }}</h1></span>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            Link pequeño <h2><a href="{{ $redirect->generated_url }}">{{ $redirect->generated_url }}</a></h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            Link para seguimiento(esta pagina) <a href="{{ route('url.show',['hash'=>$redirect->hexaid]) }}">{{ route('url.show',['hash'=>$redirect->hexaid]) }}</a></h1>
        </div>
    </div>
</div>
@endsection
