@extends('layouts.public')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $post->title }}</h1>
                @if (!empty($post->cover_img))
                    <img src="{{ asset('storage/'. $post->cover_img) }}" alt="{{ $post->title }}">
                @endif
                <p>{{ $post->content }}</p>
                <p><small> - {{ $post->author }} - </small></p>
                <a class="btn btn-info" href="{{ route('blog') }}">Torna alla lista dei posts</a>
            </div>
        </div>
    </div>
@endsection
