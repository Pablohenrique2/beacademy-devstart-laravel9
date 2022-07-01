@extends('template.users')
@section('title','usuario'. $user->name)
@section('content')
<div class="container">
  <h1>editando Usuario: {{$user->name}}</h1>
  @if($errors->any())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)

    {{$error}} <br>

    @endforeach
  </div>
  @endif
  <a href="{{route('users.index')}}" class="btn btn-dark">lista de usuarios</a>
  <form action="{{route('users.update',$user->id)}}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name">

    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">senha</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>

    <button type="submit" class="btn btn-primary">enviar</button>
  </form>
</div>

@endsection