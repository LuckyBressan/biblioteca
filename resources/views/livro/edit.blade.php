@extends('layout.app')
@section('title','Editar informações do livro')
@section('content')
    @section('page')
        <h3>Editar Informações do livro</h3>
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
    @if(Session::has('mensagem'))
        <div class="alert alert-success">{{Session::get('mensagem')}}</div>
    @endif

    {{Form::open(['route'=>['livros.update',$livro->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('titulo','Titulo')}}
        {{Form::text('titulo',$livro->titulo,['class'=>'form-control','required', 'placeholder'=>'Titulo do Livro'])}}
        <br>
        {{Form::label('descricao','Descricao')}}
        {{Form::textarea('descricao',$livro->descricao,['class'=>'form-control','required', 'placeholder'=>'Descrição...'])}}
        <br>
        {{Form::label('autor','Autor')}}
        {{Form::text('autor',$livro->autor,['class'=>'form-control','required', 'placeholder'=>'Nome do Autor' ])}}
        <br>
        {{Form::label('editora','Editora')}}
        {{Form::text('editora',$livro->editora,['class'=>'form-control','required', 'placeholder'=>'Nome da Editora'])}}
        <br>
        {{Form::label('ano','Ano')}}
        {{Form::number('ano',$livro->ano,['class'=>'form-control','required', 'placeholder'=>'Ano de lançamento'])}}
        <br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'Foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-secondary'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-dark'])!!}
    {{Form::close()}}
@endsection