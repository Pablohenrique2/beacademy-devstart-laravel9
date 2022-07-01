@extends('template.users')
@section('title','create')
@section('content')
<div class="container">
  <h1>Criar Usuarios</h1>
  <a href="{{route('users.index')}}" class="btn btn-dark">lista de usuarios</a>
  <form action="{{route('users.store')}}" method="post">
    @csrf
    @method('post')
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="Nome">

    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email" name="email" class="form-control" id="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">senha</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>

    <button type="submit" class="btn btn-primary">enviar</button>
  </form>
</div>

@endsection