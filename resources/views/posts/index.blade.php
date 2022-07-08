@extends('template.users')
@section('title','Listagem de postagem')
@section('content')

<div class="container">
  <h1>Listagem de postagem

  </h1>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Usuario</th>
        <th scope="col">title</th>
        <th scope="col">post</th>
        <th scope="col">data de cadastro</th>

      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->post}}</td>
        <td>{{date('d/m/y H:i', strtotime($post->created_at))}}</td>

      </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endsection