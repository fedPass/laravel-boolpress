@extends('layouts.public')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $post->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center">
                {{-- se ho img recuperala da storage --}}
                @if (!empty($post->cover_img))
                    <img class="card-img" src="{{ asset('storage/'. $post->cover_img) }}" alt="{{ $post->title }}">
                @endif
            </div>
            <div class="col-lg-8 pt-4">
                <p>{{ $post->content }}</p>
                <p><small> - {{ $post->author }} - </small></p>
                {{--se ho la categoria collegati all'oggetto category e prendi la sua proprietà name --}}
                @if (!empty($post->category))
                    <p>Categoria: <a href="{{ route('blog.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></p>
                @endif
                {{-- se ho dei tag collegati ciclali e stampali (!empty non funziona per le collection)--}}
                @if (($post->tags)->isNotEmpty())
                    <p>Tag:
                        @foreach ($post->tags as $tag)
                            {{-- uso if ternario per togliere la virgola ad ultimo loop --}}
                            <a href="{{ route('blog.tag', ['slug' => $tag->slug]) }}">{{ $tag->name }}{{ $loop->last ? '' : ',' }}</a>
                        @endforeach
                    </p>
                @endif
                <a class="btn btn-info" href="{{ route('blog') }}">Torna alla lista dei posts</a>
            </div>
        </div>
    </div>
@endsection
