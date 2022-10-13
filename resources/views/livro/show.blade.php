@extends('layout.app')
@section('title','Livro - {{$livro->titulo}}')
@section('content')
    <div class="corpo-produto">
        <div class="img-produto">
            <p><h3 class="text-center" style="position:absolute; top:180px; left:100px">Imagem <br>
                 a <br>
                  Definir</h3></p>
        </div><br>
        <div class="titulo-produto border shadow-sm p-3 mb-5 bg-body rounded">
            <h3><td>{{$livro->titulo}}</td></h3>
        </div>
        <div class="informacoes-produto border shadow p-3 mb-5 bg-body rounded">
            <p>{{$livro->descricao}}</p>
        </div><br>
        <div class="">
            <div class="position-relative corpo-informacoes-complementares">
                <div class="position-absolute top-0 start-0 shadow p-3 mb-5 bg-body rounded text-center informacoes-complementares"><h3>{{$livro->autor}}</h3></div>
                <div class="position-absolute top-0 start-50 shadow p-3 mb-5 bg-body rounded text-center informacoes-complementares" ><h3>{{$livro->editora}}</h3></div>
                <div class="position-absolute top-0 start-100 shadow p-3 mb-5 bg-body rounded text-center informacoes-complementares" ><h4>{{$livro->ano}}</h4></div>
            </div>
        </div>
        
    </div>
    <div class="botoes-show">
        {{Form::open(['route'=>['livros.destroy',$livro->id],'method'=>'DELETE'])}}
        <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-secondary botao"><br>Alterar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-dark botao', 'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
        <a href="{{url('livros/')}}" class="btn btn-light botao"><br>Voltar</a>
        {{Form::close()}}
    </div>
@endsection