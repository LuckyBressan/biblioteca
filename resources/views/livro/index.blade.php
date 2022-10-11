@extends('layout.app')
@section('title','Listagem de Livros')
@section('content')
    @section('create')
        <a class="nav-link" href="{{url('livros/create')}}">Criar</a>
    @endsection

<h1>Listagem de Livros</h1>

<br><br>
<table class="table table-striped">
    @foreach($livros as $livro)
    <tr>
        <td><a href="{{url('livros/'.$livro->id)}}">{{$livro->titulo}}</a></td>
    </tr>
    @endforeach
</table>


@endsection