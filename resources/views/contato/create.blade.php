@extends('layout.app')
@section('title','Criar novo contato')
@section('content')
    <h1>Criar novo Contato</h1>
    {{Form::open(['route'=>'contatos.store','method'=>'POST'])}}
    {{Form::label('nome','Nome')}}
    {{Form::text('nome','',['class'=>'form-control','required', 'placeholder'=>'Nome Completo'])}}
    <br>
    {{Form::label('email','e-mail')}}
    {{Form::text('email','',['class'=>'form-control','required', 'placeholder'=>'E-mail'])}}
    <br>
    {{Form::label('telefone','Telefone')}}
    {{Form::number('telefone','',['class'=>'form-control','required', 'placeholder'=>'(99) 9999-9999'])}}
    <br>
    {{Form::label('cidade','Cidade')}}
    {{Form::text('cidade','',['class'=>'form-control','required', 'placeholder'=>'Nome da Cidade'])}}
    <br>
    {{Form::label('estado','estado')}}
    {{Form::text('estado','',['class'=>'form-control','required', 'placeholder'=>'Nome do Estado'])}}
    <br>
    {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
    {!!Form::button('Cancelar',['onclick'=>'JavaScript>:history.go(-1)','class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection