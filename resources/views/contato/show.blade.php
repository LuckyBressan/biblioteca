@extends('layout.app')
@section('title','Contato - {{$contato->nome}}')
@section('content')
    <h1>Contato - {{$contato->nome}}</h1>
    <ul>
        <li>id: {{$contato->id}}</li>
        <li>nome: {{$contato->nome}}</li>
        <li>E-mail: <a href="mailto:{{$contato->email}}">{{$contato->email}}</a></li>
        <li>Telefone: {{$contato->telefone}}</li>
        <li>Cidade: {{$contato->cidade}}</li>
        <li>Estado: {{$contato->estado}}</li>
    </ul>
    <a href="{{url('contatos/')}}" class="btn btn-primary">Voltar</a>
@endsection