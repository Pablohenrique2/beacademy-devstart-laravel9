<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>listagem de usuario</title>
</head>

<body>
  <div class="container">
    <h1>Listagem de Usuários</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">data de cadastro</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{date('d/m/y H:i', strtotime($user->created_at))}}</td>
          <td><a href="" class="btn btn-info">editar</a><a href="" class="btn btn-danger">deletar</a></td>

        </tr>

      </tbody>
    </table>
  </div>


</body>

</html>