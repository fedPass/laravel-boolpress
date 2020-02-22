@extends('layouts.public')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h1>Contattaci</h1>
                <form action="{{ route('contatti.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="text" class="form-control" id="name" placeholder="Nome" name="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="subject">Oggetto</label>
                      <input type="text" class="form-control" id="subject" placeholder="Oggetto del messaggio" name="subject">
                    </div>
                    <div class="form-group">
                      <label for="message">Testo messaggio</label>
                      <textarea type="text" class="form-control" id="message" placeholder="Testo del messaggio" name="message" rows="8"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
