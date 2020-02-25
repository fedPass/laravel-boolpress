@extends('layouts.public')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $post->title }}</h1>
                {{-- se ho img recuperala da storage --}}
                @if (!empty($post->cover_img))
                    <img src="{{ asset('storage/'. $post->cover_img) }}" alt="{{ $post->title }}">
                @endif
                <p>{{ $post->content }}</p>
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
                <p><small> - {{ $post->author }} - </small></p>
                <a class="btn btn-info" href="{{ route('blog') }}">Torna alla lista dei posts</a>
            </div>
        </div>
    </div>
@endsection
