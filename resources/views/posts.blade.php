@extends('layouts.public')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h1>Lista di tutti i posts</h1>
                {{-- <ul> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                @forelse ($posts as $post)
                    <div class="card col-lg-3 m-4">
                      <img src="{{ $post->cover_img }}" class="card-img-top" alt="{{ $post->title }} poster">
                      <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="btn btn-primary">Leggi post</a>
                      </div>
                    </div>
                    {{-- <li>
                        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}"> {{ $post->title }} </a>
                    </li> --}}
                @empty
                    {{-- <li>Non ci sono posts da visualizzare</li> --}}
                    <p>Non ci sono posts da visualizzare</p>
                @endforelse
            </div>
        </div>
                {{-- </ul> --}}

    </div>

@endsection
