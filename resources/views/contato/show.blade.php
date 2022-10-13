@extends('layout.app')
@section('title','Contato - {{$contato->nome}}')
@section('content')
    <h1>Contato - {{$contato->nome}}</h1>
    <div class="card-body">
        <h3 class="card-title">ID: {{$contato->id}}</h3>
        <p class="text">e-mail: <a href="mailto:{{$contato->email}}">{{$contato->email}}</a><br>
            Nome: {{$contato->nome}} <br>
            Telefone: {{$contato->telefone}} <br>
            Cidade: {{$contato->cidade}} <br>
            Estado: {{$contato->estado}} <br>
        </p>
    </div>
    <div class="card-footer">
        {{Form::open(['route'=>['contatos.destroy',$contato->id],'method'=>'DELETE'])}}
        <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-secondary">Alterar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-dark', 'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
        <a href="{{url('contatos/')}}" class="btn btn-light">Voltar</a>
        {{Form::close()}}
    </div>
@endsection