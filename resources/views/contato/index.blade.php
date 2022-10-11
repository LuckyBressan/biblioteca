@extends('layout.app')
@section('title','Listagem de Contatos')
@section('content')
    <h1>Listagem de Contatos</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">{{Session::get('mensagem')}}</div>
    @endif
    
    @section('create')
        <a class="nav-link" href="{{url('contatos/create')}}">Criar</a>
    @endsection

    {{Form::open(['url'=>'contatos/buscar', 'method'=>'GET'])}}
        <div class="input-group ml-5">
            @if($busca!==null)
            &nbsp;<a href="{{url('contatos/')}}" class="btn btn-info">Todos</a>&nbsp;
            @endif
            {{Form::text('busca',$busca,['class'=>'form-control', 'required', 'placeholder'=>'buscar'])}} &nbsp;
            <span class="input-group-btn">
                {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
            </span>
            
        </div>
    {{Form::close()}}

    <br><br>
    <table class="table table-striped">
    @foreach($contatos as $contato)
    <tr>
        <td><a href="{{url('contatos/'.$contato->id)}}">{{$contato->nome}}</a></td>
    </tr>
    @endforeach
    </table>
   
@endsection