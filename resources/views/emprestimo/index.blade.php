@extends('layout.app')
@extends('layout.menu')
@section('title','Listagem de Empréstimos')
@section('content')
    @section('create')
        <a class="nav-link" href="{{url('emprestimos/create')}}">Criar</a>
    @endsection

    @section('page')
        <h3>Listagem de Empréstimos</h3>
    @endsection
    <br><br>

    {{Form::open(['url'=>'emprestimos/buscar', 'method'=>'GET'])}}
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


<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>CONTATO</th>
            <th>LIVRO</th>
            <th>DATA EMPRÉSTIMO</th>
            <th>DATA DEVOLUÇÃO</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($emprestimos as $emprestimo)
        <tr onclick="location.href='{{url('emprestimos/'.$emprestimo->id)}}'">
            <th>{{$emprestimo->id}}</th>
            <td>{{$emprestimo->id_contato}} - {{$emprestimo->contato->nome}}</td>

            <td>{{$emprestimo->id_livro}} - {{$emprestimo->livro->titulo}}</td>
            
            <td>{{\Carbon\Carbon::create($emprestimo->DataHora)->format('d/m/Y H:i:s')}}</td>

            <td>{!!$emprestimo->devolvido!!}</td>
            
        </tr>
    @endforeach
    </tbody>
    {{$emprestimos->links()}}
</table>
@endsection