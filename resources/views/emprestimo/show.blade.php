@extends('layouts.app')
@section('title','Empréstimo - {{$emprestimo->id}}')
@section('content')
<div class="corpo-info-contato-emprestimo border shadow p-3 mb-5 bg-body rounded">
        <div class="img-contato-emprestimo">
        @php
                $nomeimagem = "";
                if(file_exists("./img/contato/".md5($emprestimo->contato->id).".jpg")){
                    $nomeimagem = "./img/contato/".md5($emprestimo->contato->id).".jpg";
                } elseif (file_exists("./img/contato/".md5($emprestimo->contato->id).".png")) {
                    $nomeimagem = "./img/contato/".md5($emprestimo->contato->id).".png";
                } elseif (file_exists("./img/contato/".md5($emprestimo->contato->id).".gif")) {
                    $nomeimagem = "./img/contato/".md5($emprestimo->contato->id).".gif";
                } elseif (file_exists("./img/contato/".md5($emprestimo->contato->id).".webp")) {
                    $nomeimagem = "./img/contato/".md5($emprestimo->contato->id).".webp";
                } elseif (file_exists("./img/contato/".md5($emprestimo->contato->id).".jpeg")) {
                    $nomeimagem = "./img/contato/".md5($emprestimo->contato->id).".jpeg";
                } else {
                    $nomeimagem = "./img/contato/usuario.png";
                }
            @endphp
            {{Html::image(asset($nomeimagem),'Foto de '.$emprestimo->contato->nome,['class'=>'img-user'])}}
        </div>
        <div>
        @php
                $nomeimagem = "";
                if(file_exists("./img/livro/".md5($emprestimo->livro->id).".jpg")){
                    $nomeimagem = "./img/livro/".md5($emprestimo->livro->id).".jpg";
                } elseif (file_exists("./img/livro/".md5($emprestimo->livro->id).".png")) {
                    $nomeimagem = "./img/livro/".md5($emprestimo->livro->id).".png";
                } elseif (file_exists("./img/livro/".md5($emprestimo->livro->id).".gif")) {
                    $nomeimagem = "./img/livro/".md5($emprestimo->livro->id).".gif";
                } elseif (file_exists("./img/livro/".md5($emprestimo->livro->id).".webp")) {
                    $nomeimagem = "./img/livro/".md5($emprestimo->livro->id).".webp";
                } elseif (file_exists("./img/livro/".md5($emprestimo->livro->id).".jpeg")) {
                    $nomeimagem = "./img/livro/".md5($emprestimo->livro->id).".jpeg";
                } else {
                    $nomeimagem = "./img/livro/semfoto.png";
                }
            @endphp
            {{Html::image(asset($nomeimagem),'Foto de '.$emprestimo->livro->nome,['class'=>'border rounded img-livro-emprestimo'])}}
        </div>
        <div class="info-emprestimo">
            <h1 class="text-center" style="text-transform:uppercase;">ID: {{$emprestimo->id}}</h1><br>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato:</label>
                <input type="text" class="form-control" name="contato" id='contato' value="{{$emprestimo->contato->nome}}" readonly>
            </div>
            <div class="mb-3">
                <label for="livro" class="form-label">Livro:</label>
                <input type="text" class="form-control" name="livro" id='livro' value="{{$emprestimo->livro->titulo}}" readonly>
            </div>
            <div class="mb-3">
                <label for="dataRetirada" class="form-label">Data da Retirada:</label>
                <input type="text" class="form-control" name="dataRetirada" id='dataRetirada' value="{{\Carbon\Carbon::create($emprestimo->DataHora)->format('d/m/Y H:i:s')}}" readonly>
            </div>
            <div class="mb-3">
                <label for="dataDevolucao" class="form-label">Data da Devolução:</label>
                <input type="text" class="form-control" name="dataDevolucao" id='dataDevolucao' value="{!!$emprestimo->devolvido!!}" readonly>
            </div>
            <div class="mb-3">
                <label for="obs" class="form-label">Observação:</label>
                <input type="text" class="form-control" name="obs" id='obs' value="{{$emprestimo->obs}}" readonly>
            </div>
            @auth
                @if($emprestimo->DataDevolucao == null)
                    <div class="botao-devolucao">
                        {{Form::open(['route'=>['emprestimos.devolver',$emprestimo->id],'method'=>'PUT'])}}
                        {{form::submit('Devolver',['class'=>'btn', 'style'=>'background-color: #b5838d; color: white; border: 1px solid #b5838d;','onclick'=>'return confim("Confirma devolução?")'])}}
                        {{Form::close()}}
                    </div>
                @endif
            
                {{Form::open(['route'=>['emprestimos.destroy',$emprestimo->id],'method'=>'DELETE'])}}
                {{Form::submit('Excluir',['class'=>'btn', 'style'=>'background-color: #b5838d; color: white; border: 1px solid #b5838d;', 'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
            @endauth
                <a href="{{url('emprestimos/')}}" class="btn" style="background-color: #FCD5CE; color: white; border: 1px solid #FCD5CE;">Voltar</a>
            @auth
                {{Form::close()}}
            @endauth
        </div>
    </div>
@endsection