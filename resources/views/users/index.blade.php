@extends('template.users')
@section('title','Listagem de Usuários')
@section('content')

<div class="container">
  <h1>Listagem de Usuários</h1>
  @if(session()->has('create'))
  <div class="alert alert-success" role="alert">
    {{session()->get('create')}}
  </div>
  @endif
  @if(session()->has('edit'))
  <div class="alert alert-success" role="alert">
    {{session()->get('edit')}}
  </div>
  @endif
  @if(session()->has('destroy'))
  <div class="alert alert-danger" role="alert">
    {{session()->get('destroy')}}
  </div>
  @endif
  <div class="container">
    <div class="row">
      <div class="col-sm mt-2 mb-5">
        <a href="{{route('users.create')}}" class="btn btn-dark">Criar novo usuario</a>
      </div>
      <div class="col-sm mt-2 mb-5">
        <form action="{{route('users.index')}}" method="get">
          <div class="input-group">
            <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
          </div>
        </form>
      </div>
    </div>

  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">foto</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">Postagens</th>
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
        <td>

          <a href="{{route('posts.show',$user->id)}}" class="btn btn-outline-dark">Postagens-{{$user->posts->count()}}</a>
        </td>
        <td>{{formatDateTime($user->created_at)}}</td>
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