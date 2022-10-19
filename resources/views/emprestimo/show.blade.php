@extends('layout.app')
@extends('layout.menu')
@section('title','Empréstimo - {{$emprestimo->id}}')
@section('content')
<div class="corpo-info-contato border shadow p-3 mb-5 bg-body rounded">
        <div class="img-contato">
             
        </div><br><br>
        <div class="info-contato">
            <h1 class="text-center" style="text-transform:uppercase;">{{$emprestimo->id}}</h1><br><br>
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
                <input type="text" class="form-control" name="dataRetirada" id='dataRetirada' value="{{\Carbon\Carbon::$emprestimo->id_contato->format('d/m/Y H:i:s')}}" readonly>
            </div>
            <div class="mb-3">
                <label for="obs" class="form-label">Observação:</label>
                <input type="text" class="form-control" name="obs" id='obs' value="{{$emprestimo->obs}}" readonly>
            </div><br>
            
            {{Form::open(['route'=>['contatos.destroy',$contato->id],'method'=>'DELETE'])}}
            <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-secondary">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-dark', 'onclick'=>' return confirm("Confirmar Exclusão?")'])}}
            <a href="{{url('contatos/')}}" class="btn btn-light">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection