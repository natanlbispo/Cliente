@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <h2>Revogar Bolsa</h2>

  <p>Você realmente deseja Revogar a Bolsa {{ $data['project']->name }} do Aluno {{ $data['student']->name }}?</p>

  <a href="/student/revoke/<?= $data['student']->id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Remover</button></a>
  <br>
  <a href="/student/list"><button type="submit" class="btn btn-primary btn-block">Cancelar</button></a>

  
@endif

@stop
