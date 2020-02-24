@extends('layouts.public')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h1>Erroe 404: pagina non trovata</h1>
                <p>La pagina cercata non esiste!</p>
                <a class="btn btn-info" href="{{ route('blog') }}">Torna alla lista dei posts</a>
            </div>
        </div>
    </div>
@endsection
