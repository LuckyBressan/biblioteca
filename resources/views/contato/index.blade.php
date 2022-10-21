@extends('layout.app')
@extends('layout.menu')
@section('title','Listagem de Contatos')
@section('content')
    @section('page')
        <h3>Listagem de Contatos</h3>
    @endsection
    <br><br>

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
    <tr onclick="location.href='{{url('contatos/'.$contato->id)}}'">
        <td>{{$contato->nome}}</td>
    </tr>
    @endforeach
    </table>
    {{$contatos->links()}}
@endsection