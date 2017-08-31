@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <h2>Remover Avaliador:  {{$data['professor']->name}}</h2>

  <p> Você realmente deseja remover este Avaliador?</p>

  <a href="/admin/user/delete/<?= $data['user']->id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Remover</button></a>
  <br>
  <a href="/admin/user/list"><button type="submit" class="btn btn-primary btn-block">Cancelar</button></a>

  
@endif

@stop
