@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="float-left">Gestisci i tuoi post</h1>
                <a class="btn btn-success float-right" href="{{ route('admin.posts.create') }}">Crea nuovo post</a>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Titolo</th>
                      <th scope="col">Categoria</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Tag</th>
                      <th scope="col">Autore</th>
                      <th scope="col">Azioni</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($posts as $post)
                          <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            {{-- uso if ternario, se non ho categoria metti - --}}
                            <td>{{ $post->category ? $post->category->name : '-' }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                @forelse ($post->tags as $tag)
                                    {{ $tag->name }}{{ $loop->last ? '' : ',' }}
                                @empty
                                    -
                                @endforelse
                            </td>
                            <td>{{ $post->author }}</td>
                            <td>
                                <a class="btn btn-outline-info" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Visualizza</a>
                                <a class="btn btn-info" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica</a>
                                <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-outline-danger" type="submit" value="Cancella">
                                </form>
                            </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="7">Non ci sono posts</td>
                          </tr>
                      @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
