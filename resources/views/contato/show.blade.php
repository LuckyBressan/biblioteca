@extends('layout.app')
@extends('layout.menu')
@section('title','Contato - {{$contato->nome}}')
@section('content')
    <div class="corpo-info-contato border shadow p-3 mb-5 bg-body rounded">
        <div class="img-contato">
             @php
                $nomeimagem = "";
                if(file_exists("./img/contato/".md5($contato->id).".jpg")){
                    $nomeimagem = "./img/contato/".md5($contato->id).".jpg";
                } elseif (file_exists("./img/contato/".md5($contato->id).".png")) {
                    $nomeimagem = "./img/contato/".md5($contato->id).".png";
                } elseif (file_exists("./img/contato/".md5($contato->id).".gif")) {
                    $nomeimagem = "./img/contato/".md5($contato->id).".gif";
                } elseif (file_exists("./img/contato/".md5($contato->id).".webp")) {
                    $nomeimagem = "./img/contato/".md5($contato->id).".webp";
                } elseif (file_exists("./img/contato/".md5($contato->id).".jpeg")) {
                    $nomeimagem = "./img/contato/".md5($contato->id).".jpeg";
                } else {
                    $nomeimagem = "./img/contato/usuario.png";
                }
            @endphp
            {{Html::image(asset($nomeimagem),'Foto de '.$contato->titulo,['class'=>'img-user'])}}
        </div><br><br>
        <div class="info-contato">
            <h1 class="text-center" style="text-transform:uppercase; color: #b5838d;">{{$contato->nome}}</h1><br><br>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="text" class="form-control" name="email" id='email' value="{{$contato->email}}" readonly>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="number" class="form-control" name="telefone" id='telefone' value="{{$contato->telefone}}" readonly>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" class="form-control" name="cidade" id='cidade' value="{{$contato->cidade}}" readonly>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" name="estado" id='estado' value="{{$contato->estado}}" readonly>
            </div><br>
            
            {{Form::open(['route'=>['contatos.destroy',$contato->id],'method'=>'DELETE'])}}
            <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn" style="background-color: #e5989b; color: white; border: 1px solid #e5989b;">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-dark', 'style'=>'background-color: #b5838d; color: white; border: 1px solid #b5838d;',  'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
            <a href="{{url('contatos/')}}" class="btn" style="background-color: #FCD5CE; color: white; border: 1px solid #FCD5CE;">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection 