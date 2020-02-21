@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Crea nuovo post</h1>
                <form action="{{ route('admin.posts.update',['post'=> $post->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title">Titolo</label>
                      <input type="text" class="form-control" id="title" placeholder="Titolo" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                      <label for="author">Autore</label>
                      <input type="text" class="form-control" id="author" placeholder="Autore" name="author" value="{{ $post->author }}">
                    </div>
                    <div class="form-group">
                      <label for="content">Testo post</label>
                      <textarea type="text" class="form-control" id="content" placeholder="Testo del post" name="content" rows="8">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="cover_img_update">Immagine di copertina</label>
                      {{-- se c'è l'immagine già, la visualizzo --}}
                      @if ($post->cover_img)
                          <img src="{{ asset('storage/'. $post->cover_img) }}" alt="{{ $post->title }}">
                      @endif
                      <input type="file" class="form-control-file" id="cover_img_update" name="cover_img_update">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </form>
            </div>
        </div>
    </div>
@endsection
