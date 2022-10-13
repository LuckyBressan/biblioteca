@extends('layout.app')
@section('title','Listagem de Livros')
@section('content')
    @section('create')
        <a class="nav-link" href="{{url('livros/create')}}">Criar</a>
    @endsection

    @section('page')
        <h3>Listagem de Livros</h3>
    @endsection
    <br><br>

    {{Form::open(['url'=>'livros/buscar', 'method'=>'GET'])}}
        <div class="input-group ml-5">
            @if($busca!==null)
            &nbsp;<a href="{{url('livros/')}}" class="btn btn-info">Todos</a>&nbsp;
            @endif
            {{Form::text('busca',$busca,['class'=>'form-control', 'required', 'placeholder'=>'buscar'])}} &nbsp;
            <span class="input-group-btn">
                {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
            </span>
            
        </div>
    {{Form::close()}}

<br><br>
<table class="table table-striped">
    @foreach($livros as $livro)
    <tr>
        <td><a href="{{url('livros/'.$livro->id)}}">{{$livro->titulo}}</a></td>
    </tr>
    @endforeach
</table>


@endsection