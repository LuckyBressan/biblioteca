@extends('layout.app')
@section('title','Criar novo contato')
@section('content')
    @section('page')
        <h3>Criar novo Contato</h3>
    @endsection
    <br><br>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{Form::open(['route'=>'contatos.store','method'=>'POST', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('nome','Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required', 'placeholder'=>'Nome Completo'])}}
        <br>
        {{Form::label('email','e-mail')}}
        {{Form::email('email','',['class'=>'form-control','required', 'placeholder'=>'E-mail', 'pattern'=>'[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?'])}}
        <br>
        {{Form::label('telefone','Telefone')}}
        {{Form::number('telefone','',['class'=>'form-control','required', 'placeholder'=>'(99) 9999-9999', 'pattern'=>'(\([0-9]{2}\))\s([9]{1})?([0-9]{4,5})-([0-9]{4})',
        'title'=>'Número de Telefone Precisa ser no formato(99) 9999-9999'])}}
        <br>
        {{Form::label('cidade','Cidade')}}
        {{Form::text('cidade','',['class'=>'form-control','required', 'placeholder'=>'Nome da Cidade'])}}
        <br>
        {{Form::label('estado','estado')}}
        {{Form::text('estado','',['class'=>'form-control','required', 'placeholder'=>'Nome do Estado'])}}
        <br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'Foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-secondary'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-dark'])!!}
    {{Form::close()}}
@endsection