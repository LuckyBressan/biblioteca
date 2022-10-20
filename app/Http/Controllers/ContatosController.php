<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Session;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::paginate(5);
        return view('contato.index',array('contatos'=>$contatos, 'busca'=>null));

    }

    public function buscar(Request $request) {
        $contato = Contato::where('nome','LIKE', '%'.
        $request->input('busca'). '%')->orwhere('email', 'LIKE', '%'.
        $request->input('busca'). '%')->paginate(5);
        return view('contato.index', array('contatos'=>$contato, 'busca'=>$request->input('busca')));
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required',
            'email'=>'required|email',
            'telefone'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
        ]);

        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if($contato->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($contato->id).'.'.$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\contato'),$nomearquivo);
            }
            return redirect('contatos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = Contato::find($id);
        return view('contato.show',array('contato'=>$contato));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('contato.edit',array('contato'=>$contato));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required',
            'email'=>'required|email',
            'telefone'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
        ]);

        $contato = Contato::find($id); 
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($contato->id).'.'.$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\contato'),$nomearquivo);
        }
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if($contato->save()) {
            Session::flash('mensagem','Contato Alterado com Sucesso');
            return redirect(url('contatos/'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contato = Contato::find($id);
        if(isset($request->foto)){
            unlink($request->foto);
        }
        $contato->delete();
        Session::flash('mensagem','Contato Excluído com Sucesso');
        return redirect(url('contatos/'));
    }
}
