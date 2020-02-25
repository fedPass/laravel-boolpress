@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Crea nuovo post</h1>
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Titolo</label>
                      <input type="text" class="form-control" id="title" placeholder="Titolo" name="title">
                    </div>
                    <div class="form-group">
                      <label for="author">Autore</label>
                      <input type="text" class="form-control" id="author" placeholder="Autore" name="author">
                    </div>
                    <div class="form-group">
                      <label for="content">Testo post</label>
                      <textarea type="text" class="form-control" id="content" placeholder="Testo del post" name="content" rows="8"></textarea>
                    </div>
                    {{-- se ho le categorie in db nella tab categories crea select  --}}
                    {{-- @if(!empty($categories)) --}}
                    @if($categories->count() > 0)
                        <div class="form-group">
                            {{-- la select ha il name della colonna per sfruttare il fill() --}}
                          <select name="category_id" required>
                              <option value="">Seleziona la categoria</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                        </div>
                    @else
                        {{-- se non ho ancora categoria salvate in db da associare aggiungi la prima --}}
                        <a href="#">Aggiungi la prima categoria</a>
                    @endif
                    <div class="form-group">
                        <span>Seleziona tags per questo post:</span>
                        @foreach ($tags as $tag)
                            <label for="tag_{{$tag->id}}">
                                {{-- come name alla checkbox mettiamo un array visto che possiamo selezionare più voci --}}
                                {{-- usiamo come value tag_id perchè è universale, tag->name potrebbe cambiare con la lingua per es --}}
                                <input id="tag_{{$tag->id}}" type="checkbox" name="tag_id[]" value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                      <label for="cover_img">Immagine di copertina</label>
                      <input type="file" class="form-control-file" id="cover_img" name="cover_img">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection
