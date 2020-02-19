@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Crea nuovo post</h1>
                <form class="" action="index.html" method="post">
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
                      <textarea type="text" class="form-control" id="content" placeholder="Testo del post" name="content">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection
