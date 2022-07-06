@extends('template.users')
@section('title',' Usuário '.$user->name)
@section('content')

<div class="container">
  <h1> Usuário {{$user->name}}</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Foto</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">data de cadastro</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>

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
        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-info">editar</a>
          <form action="{{route('users.destroy',$user->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">deletar</button>
          </form>
        </td>

      </tr>

    </tbody>
  </table>
</div>

@endsection