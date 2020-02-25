@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Crea nuovo post</h1>
                {{-- visualizzazione degli errori di validazione nel form --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.posts.update',['post'=> $post->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title">Titolo</label>
                      {{-- nel value come primo parametro del old gli passo "ultima modifica" se non c'è prende il seocndo che è il valore già precompilato --}}
                      <input type="text" class="form-control" id="title" placeholder="Titolo" name="title" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                      <label for="author">Autore</label>
                      <input type="text" class="form-control" id="author" placeholder="Autore" name="author" value="{{ old('author', $post->author) }}">
                    </div>
                    <div class="form-group">
                      <label for="content">Testo post</label>
                      <textarea type="text" class="form-control" id="content" placeholder="Testo del post" name="content" rows="8">{{ old('content', $post->content) }}</textarea>
                    </div>
                    @if($categories->count() > 0)
                        <div class="form-group">
                          <select name="category_id" required>
                              <option value="">Seleziona la categoria</option>
                              @foreach ($categories as $category)
                                  {{-- se questo post ha la categoria mettila come selected --}}
                                  <option
                                    {{-- se avevo inserito qualcosa prima dell'errore recupera l'old --}}
                                      @if (!empty(old('category_id')))
                                          {{ old('category_id') == $category->id ? 'selected' : '' }}
                                      @else
                                          {{-- altrimenti recupera quella preselezionata --}}
                                          {{ ($post->category && ($post->category->id == $category->id)) ? 'selected' : '' }}
                                      @endif
                                        value="{{ $category->id }}" >
                                          {{ $category->name }}
                                  </option>
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
                                <input id="tag_{{$tag->id}}" type="checkbox"
                                {{-- se si è verificato un errore --}}
                                @if ($errors->any())
                                    {{ in_array($tag->id, old('tag_id', array())) ? 'checked' : '' }}
                                @else
                                    {{ ($post->tags)->contains($tag) ? 'checked' : ''}}
                                @endif
                                name="tag_id[]" value="{{ $tag->id }}">
                                {{-- se il post conntiene già dei tag segnali come checked --}}
                                {{ $tag->name }}
                            </label>
                        @endforeach
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
