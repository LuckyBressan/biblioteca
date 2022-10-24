@extends('layouts.app')
@section('title','Registrar novo Empréstimo')
@section('content')
    @section('page')
        <h3>Registrar novo Empréstimo</h3>
    @endsection
    
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif
    <br><br>
    {{Form::open(['route'=>'emprestimos.store','method'=>'POST', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('id_contato','Contato')}}
        {{Form::text('id_contato','',['class'=>'form-control','required', 'placeholder'=>'Selecione o contato...', 'list'=>'listcontatos'])}}
        <datalist id="listcontatos">
            @foreach($contatos as $contato)
                <option value="{{$contato->id}}">{{$contato->nome}}</option>
            @endforeach
        </datalist>
        <br>
        {{Form::label('id_livro','Livro')}}
        {{Form::text('id_livro','',['class'=>'form-control','required', 'placeholder'=>'Selecione o livro...', 'list'=>'listlivros'])}}
        <datalist id="listlivros">
            @foreach($livros as $livro)
                <option value="{{$livro->id}}">{{$livro->titulo}}</option>
            @endforeach
        </datalist>
        <br>
        {{Form::label('DataHora','Data da Retirada')}}
        {{Form::text('DataHora',\Carbon\Carbon::now()->format('d/m/Y H:i:s'),['class'=>'form-control','required', 'placeholder'=>'Informe a data...', 'rows'=>8])}}
        <br>
        {{Form::label('obs','Observação')}}
        {{Form::textarea('obs','',['class'=>'form-control', 'placeholder'=>'Observação...'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn', 'style'=>'background-color: #e5989b; color: white; border: 1px solid #e5989b;'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn', 'style'=>'background-color: #b5838d; color: white; border: 1px solid #b5838d;'])!!}
    {{Form::close()}}
@endsection