@extends('layout.app')
@section('title','Livro - {{$livro->titulo}}')
@section('content')
    <div class="corpo-produto">
        <div>
            @php
                $nomeimagem = "";
                if(file_exists("./img/livro/".md5($livro->id).".jpg")){
                    $nomeimagem = "./img/livro/".md5($livro->id).".jpg";
                } elseif (file_exists("./img/livro/".md5($livro->id).".png")) {
                    $nomeimagem = "./img/livro/".md5($livro->id).".png";
                } elseif (file_exists("./img/livro/".md5($livro->id).".gif")) {
                    $nomeimagem = "./img/livro/".md5($livro->id).".gif";
                } elseif (file_exists("./img/livro/".md5($livro->id).".webp")) {
                    $nomeimagem = "./img/livro/".md5($livro->id).".webp";
                } elseif (file_exists("./img/livro/".md5($livro->id).".jpeg")) {
                    $nomeimagem = "./img/livro/".md5($livro->id).".jpeg";
                } else {
                    $nomeimagem = "./img/livro/livrosemfoto.jpg";
                }
            @endphp
            {{Html::image(asset($nomeimagem),'Foto de '.$livro->titulo,['class'=>'border rounded img-produto'])}}
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
        @if ($nomeimagem !== "./img/livro/livrosemfoto.jpg")
                {{Form::hidden('foto',$nomeimagem)}}
        @endif
        <a href="{{url('livros/'.$livro->id.'/edit')}}" class="btn btn-secondary botao"><br>Alterar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-dark botao', 'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
        <a href="{{url('livros/')}}" class="btn btn-light botao"><br>Voltar</a>
        {{Form::close()}}
    </div>
@endsection