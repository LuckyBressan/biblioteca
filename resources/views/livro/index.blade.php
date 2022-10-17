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


<div class="row">
    @foreach($livros as $livro)
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
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            {{Html::image(asset($nomeimagem),'Foto de '.$livro->titulo,['class'=>'img-fluid rounded-start'])}}
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$livro->titulo}}</h5>
                    <p class="card-text"><b>Autor:</b> {{$livro->autor}} <br> <b>Lançamento:</b> {{$livro->ano}}</p>
                    <p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
                    <a href="{{url('livros/'.$livro->id)}}" class="btn btn-dark">Mais Informações</a>
                </div>
            </div>
        </div>
    </div> &nbsp; 
    @endforeach
    {{$livros->links()}}
</div>
@endsection