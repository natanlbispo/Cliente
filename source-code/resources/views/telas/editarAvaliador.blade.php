@extends('layouts.principal')

@section('content')
<p>
<h2>Alterar Usuário {{$data['professor']->name}}</h2>

<form action="/admin/user/edited/{{$data['user']->id}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  <div class="form-group">
    <label>Nome </label>
    <input value = "{{$data['professor']->name}}" name="nome" required class="form-control"/>
  </div>

  <div class="form-group">
    <label>Email </label>
    <input name="email" type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required class="form-control" value = "{{$data['professor']->email}}"/>
  </div>

	<button type="submit" class="btn btn-primary listButton">Registrar</button>
</form>
  <br>
<a href="/lusuarios "> <button class="btn btn-primary btn-block">Cancelar</button> </a>

@stop
