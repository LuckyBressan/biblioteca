<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

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
        $emprestimo = Emprestimo::where('id_contato','=',
        $request->input('busca'))->orwhere('id_livro', '=',
        $request->input('busca'))->orwhere('DataHora','=',
        $request->input('busca'))->simplepaginate(5);
        return view('emprestimo.index', array('emprestimos'=>$emprestimo, 'busca'=>$request->input('busca')));
    }  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprestimo.create');
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
            'id_contato'=>'required',
            'id_livro'=>'required',
            'DataHora'=>'required',
        ]);
        $emprestimo = new Emprestimo();
        $emprestimo->id_contato = $request->input('id_contato');
        $emprestimo->id_livro = $request->input('id_livro');
        $emprestimo->DataHora = \Carbon\Carbon::createFromFormat('d/m/Y H:i:s'),$request->input('DataHora');
        $emprs

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show(Emprestimo $emprestimo)
    {
        $emprestimo = Emprestimo::find($id);
        return view('emprestimo.show',array('emprestimo'=>$emprestimo));
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
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}