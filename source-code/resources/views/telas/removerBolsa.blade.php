@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <h2>Remover Avaliador:  {{$data['project']->name}}</h2>

  <p> Você realmente deseja remover este Avaliador?</p>

  <a href="/bolsa/delete/<?= $data['project']->id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Remover</button></a>
  <br>
  <a href="/bolsa/list"><button type="submit" class="btn btn-primary btn-block">Cancelar</button></a>

  
@endif

@stop
