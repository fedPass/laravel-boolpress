@extends('layouts.public')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                {{-- <h1>Posts per la categoria {{ $category->name }}</h1> --}}
                <ul>
                    @forelse ($posts as $post)
                        <li>
                            <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                        </li>
                    @empty
                        <li>Non ci sono posts da mostrare</li>
                    @endforelse
                </ul>
                <a class="btn btn-info" href="{{ route('blog') }}">Torna alla lista di tutti i posts</a>
            </div>
        </div>
    </div>
@endsection
