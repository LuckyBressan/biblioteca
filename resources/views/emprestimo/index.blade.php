@extends('layout.app')
@extends('layout.menu')
@section('title','Listagem de Livros')
@section('content')
    @section('create')
        <a class="nav-link" href="{{url('emprestimos/create')}}">Criar</a>
    @endsection

    @section('page')
        <h3>Listagem de Livros</h3>
    @endsection
    <br><br>

    {{Form::open(['url'=>'emprestimo/buscar', 'method'=>'GET'])}}
        <div class="input-group ml-5">
            @if($busca!==null)
            &nbsp;<a href="{{url('emprestimos/')}}" class="btn"  style="background-color: #e5989b; color: white; border: 1px solid #e5989b;">Todos</a>&nbsp;
            @endif
            {{Form::text('busca',$busca,['class'=>'form-control', 'required', 'placeholder'=>'buscar'])}} &nbsp;
            <span class="input-group-btn">
                {{Form::submit('Buscar',['class'=>'btn', 'style'=>'background-color: #b5838d; color: white; border: 1px solid #b5838d;'])}}
            </span>
            
        </div>
    {{Form::close()}}

<br><br>


<div class="row">
    @foreach($emprestimos as $emprestimo)
    <tr>
        <td><a href="{{url('emprestimos/'.$emprestimo->id)}}" class="link link-dark">{{$emprestimo->id}}</a></td>
        <td>{{$emprestimo->id_contato}}</td>
        <td>{{$emprestimo->id_livro}}</td>
        <td>{{$emprestimo->DataHora}}</td>
    </tr>
    @endforeach
    {{$emprestimos->links()}}
</div>
@endsection