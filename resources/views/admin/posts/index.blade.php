@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Gestisci i tuoi post</h1>
                <a class="btn btn-info float-right" href="{{ route('admin.posts.create') }}">Crea nuovo post</a>
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titolo</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Autore</th>
                  <th scope="col">Azioni</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($posts as $post)
                      <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->author }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Visualizza</a>
                        </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5">Non ci sono posts</td>
                      </tr>
                  @endforelse
              </tbody>
            </table>
        </div>
    </div>
@endsection
