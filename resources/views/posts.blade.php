@extends('layouts.public')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Lista di tutti i posts</h1>
                <ul>
                    @forelse ($posts as $post)
                        <li>{{ $post->title }}</li>
                    @empty
                        <li>Non ci sono posts da visualizzare</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection
