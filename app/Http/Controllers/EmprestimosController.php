<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Contato;
use App\Models\Livro;
use App\Models\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Session;

class EmprestimosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimo = Emprestimo::simplepaginate(5);
        return view('emprestimo.index',array('emprestimos'=>$emprestimo, 'busca'=>null));
    }

    public function buscar(Request $request) {
        $emprestimo = Emprestimo::join('contatos','contatos.id','=','emprestimos.id_contato')
                    ->join('livros','livros.id','=','emprestimos.id_livro')
                    ->select('emprestimos.*','contatos.nome','livros.titulo')
                    ->where('id_contato','=',$request->input('busca'))
                    ->orwhere('id_livro','=',$request->input('busca'))
                    ->orwhere('obs','LIKE','%'.$request->input('busca').'%')->orwhere('contatos.nome','LIKE','%'.$request->input('busca').'%')
                    ->orwhere('livros.titulo','LIKE','%'.$request->input('busca').'%')
                    ->simplepaginate(5);
        return view('emprestimo.index',array('emprestimos' => $emprestimo,'busca'=>$request->input('busca')));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) { 
            $contatos = Contato::all();
            $livros = Livro::all();
            return view('emprestimo.create', array('contatos'=>$contatos, 'livros'=>$livros));
        } else {
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $this->validate($request,[
                'id_contato'=>'required',
                'id_livro'=>'required',
                'DataHora'=>'required',
            ]);
            $emprestimo = new Emprestimo();
            $emprestimo->id_contato = $request->input('id_contato');
            $emprestimo->id_livro = $request->input('id_livro');
            $emprestimo->DataHora = \Carbon\Carbon::createFromFormat('d/m/Y H:i:s',$request->input('DataHora'));
            $emprestimo->obs = $request->input('obs');
            $emprestimo->DataDevolucao = null;
            
            if($emprestimo->save()) {
                return redirect('emprestimos');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emprestimo = Emprestimo::find($id);
        return view('emprestimo.show',array('emprestimo'=>$emprestimo, 'busca'=>null));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit(Emprestimo $emprestimo)
    {
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
    *  @return \Illuminate\Http\Response
     */
    public function devolver(Request $request, $id)
    {
        if(Auth::check()) {
            $emprestimo = Emprestimo::find($id);
            $emprestimo->DataDevolucao = \Carbon\Carbon::now();
            $emprestimo->save();

            if($emprestimo->save()) {
                Session::flash('mensagem','Empréstimo Devolvido');
                return redirect('emprestimos');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()) {
            $emprestimo = Emprestimo::find($id);
            $emprestimo->delete();
            Session::flash('mensagem', 'Empréstimo Excluido com Sucesso');
            return redirect(url('emprestimos/'));
        } else {
            return redirect('login');
        }
    }
}
