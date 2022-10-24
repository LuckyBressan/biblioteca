@extends('layouts.app')
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
            &nbsp;<a href="{{url('livros/')}}" class="btn"  style="background-color: #e5989b; color: white; border: 1px solid #e5989b;">Todos</a>&nbsp;
            @endif
            {{Form::text('busca',$busca,['class'=>'form-control', 'required', 'placeholder'=>'buscar'])}} &nbsp;
            <span class="input-group-btn">
                {{Form::submit('Buscar',['class'=>'btn', 'style'=>'background-color: #b5838d; color: white; border: 1px solid #b5838d;'])}}
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
    <div class="card mb-3" style="max-width: 640px; border: 1px solid #b5838d">
        <div class="row g-0">
            <div class="col-md-4">
            {{Html::image(asset($nomeimagem),'Foto de '.$livro->titulo,['class'=>'img-fluid rounded-start'])}}
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="color:#b5838d;">{{$livro->titulo}}</h5>
                    <p class="card-text" style="color:#e5989b;"><b>Autor:</b> {{$livro->autor}} <br> <b>Lançamento:</b> {{$livro->ano}}</p>
                    <p class="card-text" ><small style="color:#e5989b;">Última atualização 3 minutos atrás</small></p>
                    <a href="{{url('livros/'.$livro->id)}}" class="btn" style="background-color: #b5838d; color: white; border: 1px solid #b5838d;">Mais Informações</a>
                </div>
            </div>
        </div>
    </div> &nbsp; &nbsp;
    @endforeach
    {{$livros->links()}}
</div>
@endsection