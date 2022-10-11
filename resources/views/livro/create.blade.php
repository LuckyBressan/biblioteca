@extends('layout.app')
@section('title','Registrar novo livro')
@section('content')
    <h1>Registrar novo livro</h1>
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

    {{Form::open(['route'=>'livros.store','method'=>'POST'])}}
        {{Form::label('titulo','Titulo')}}
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
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection