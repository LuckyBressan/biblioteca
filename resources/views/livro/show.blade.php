@extends('layout.app')
@section('title','Livro - {{$livro->titulo}}')
@section('content')
    <h1>Livro - {{$livro->titulo}}</h1>
    <div class="card-body">
        <h3 class="card-title">ID: {{$livro->id}}</h3>
        <p class="text">
            Título: {{$livro->titulo}}<br>
            Descrição: {{$livro->descricao}} <br>
            Autor: {{$livro->autor}} <br>
            Editora: {{$livro->editora}} <br>
            Ano: {{$livro->ano}} <br>
        </p>
    </div>
    <div class="card-footer">
        {{Form::open(['route'=>['livros.destroy',$livro->id],'method'=>'DELETE'])}}
        <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-success">Alterar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-danger', 'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
        <a href="{{url('livros/')}}" class="btn btn-primary">Voltar</a>
        {{Form::close()}}
    </div>
@endsection