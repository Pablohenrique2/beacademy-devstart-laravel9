@extends('template.users')
@section('title', 'login')
@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class='form-outline mb-4'>
    <label for="email" class="form-label">Email</label>
    <input type="email" id='email' name="email" class='form-control'>
  </div>

  <div class='form-outline mb-4'>
    <label for="password" class="form-label">Senha</label>
    <input type="password" id='password' name="password" class='form-control'>
  </div>

  <div class='col mb-5'>
    <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
  </div>

  <button type='submit'>Entrar</button>
</form>




@endsection