@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $post->title }}</h1>
                <img src="{{ asset('storage/'. $post->cover_img) }}" alt="{{ $post->title }}">
                <p><small>{{ $post->author }}</small></p>
                <p>{{ $post->content }}</p>
                <p>Slug: {{ $post->slug }}</p>
                <p>Creato il: {{ $post->created_at }}</p>
                <p>Modificato il: {{ $post->updated_at }}</p>
                <a class="btn btn-info" href="{{ route('admin.posts.index') }}">Torna alla lista dei posts</a>
            </div>
        </div>
    </div>
@endsection
