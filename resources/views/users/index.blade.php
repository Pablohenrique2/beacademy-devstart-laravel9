@extends('template.users')
@section('title','Listagem de Usuários')
@section('content')

<div class="container">
  <h1>Listagem de Usuários</h1>
  <a href="{{route('users.create')}}" class="btn btn-dark">Criar novo usuario</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">foto</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">data de cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        @if($user->image)
        <th><img src="{{asset('storage/'.$user->image)}}" alt="" width="50px" height="50px" class="rounded-circle"></th>
        @else
        <th><img src="{{asset('storage/profile/avatar.jpg')}}" alt="" width="50px" height="50px" class="rounded-circle"></th>
        @endif
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{date('d/m/y H:i', strtotime($user->created_at))}}</td>
        <td><a href="{{route('users.show',$user->id)}}" class="btn btn-info">Visualizar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="justify-content-center pagination">
    {{$users->links('pagination::bootstrap-4')}}
  </div>
</div>

@endsection