@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Início</h1>
@stop

@section('content')
    <p>Seja Bem Vindo ao Mais Adv, {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
