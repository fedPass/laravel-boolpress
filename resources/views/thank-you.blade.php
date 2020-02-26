@extends('layouts.public')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Grazie per averci contattato</h1>
                <p>Provvederemo nel più breve tempo possibile a metterci in contatto con te!</p>
                <a class="btn btn-info" href="{{ route('public.home') }}">Torna alla Home</a>
            </div>
        </div>
    </div>
@endsection
