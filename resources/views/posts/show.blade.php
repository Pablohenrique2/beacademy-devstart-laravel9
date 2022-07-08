@extends('template.users')
@section('title','Listagem de postagem do {$user->name}')
@section('content')
<div class="container">
  <h1>Postagem do {{$user->name}}</h1>
  @foreach($posts as $post)
  <div class="container">
    <div class="mb-3 ">
      <label class="form-laabel" for="">Identificação N: <b>{{$post->id}}</b></label>
      <br>
      <label class="form-laabel" for="">Status:<b>{{$post->active?'ativo':'inativo'}}</b></label>
      <br>
      <label class="form-laabel" for="">Titulo:<b> {{$post->title}}</b></label>
      <br>
      <label class="form-laabel" for="">Postagem:</label>
      <b><textarea class="form-control" rows="3" for=""> {{$post->post}} </textarea></b>
      <br>
    </div>
  </div>
</div>
@endforeach

@endsection