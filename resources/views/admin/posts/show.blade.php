@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $post->title }}</h1>
                <img src="{{ asset('storage/'. $post->cover_img) }}" alt="{{ $post->title }}">
                <p>{{ $post->content }}</p>
                <p>Autore: {{ $post->author }}</p>
                <p>Slug: {{ $post->slug }}</p>
                <p>Categoria: {{ $post->category ? $post->category->name : 'Non ancora indicata' }}</p>
                <p>Tag:
                    @if (($post->tags)->isNotEmpty())
                        @foreach ($post->tags as $tag)
                            {{-- uso if ternario per togliere la virgola ad ultimo loop --}}
                            {{ $tag->name }}{{ $loop->last ? '' : ',' }}
                        @endforeach
                    @else
                        Non ancora inseriti
                    @endif
                </p>
                <p>Categoria: {{ $post->category ? $post->category->name : 'Non ancora indicata' }}</p>
                <p>Creato il: {{ $post->created_at }}</p>
                <p>Modificato il: {{ $post->updated_at }}</p>
                <a class="btn btn-info" href="{{ route('admin.posts.index') }}">Torna alla lista dei posts</a>
            </div>
        </div>
    </div>
@endsection
