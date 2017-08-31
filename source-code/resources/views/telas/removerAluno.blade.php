@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <h2>Remover Aluno:  {{$data['student']->name}}</h2>

  <p> Você realmente deseja Remover este Aluno?</p>

  <a href="/student/delete/<?= $data['student']->id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Remover</button></a>
  <br>
  <a href="/student/list"><button type="submit" class="btn btn-primary btn-block">Cancelar</button></a>

  
@endif

@stop
