@extends('layout.app')
@section('title','Listagem de Contatos')
@section('content')
    <h1>Listagem de Contatos</h1>
    <ul>
    @foreach($contatos as $contato) 
        <li><a href="{{url('contatos/'.$contato->id)}}">{{$contato->nome}}</a></li>
    @endforeach
    </ul>

    <a class="btn btn-success" href="{{url('contatos/create')}}">Criar</a>
@endsection