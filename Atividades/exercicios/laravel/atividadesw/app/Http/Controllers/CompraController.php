<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Pessoa;
use App\Models\Produto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderBy($_GET['orderBy'])->get();
        return view('compras.index', ['compras'=>$compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('compras.create', ['pessoas'=>$pessoas, 'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Compra::create($request->all());
        $compra = new Compra;
        $compra->pessoa_id = $request->pessoa_id;
        $compra->produto_id = $request->produto_id;
        $compra->data_compra = date('Y-m-d H:i:s');
        $compra->save();

        session()->flash('msg-success', 'Compra cadastrada com sucesso!');
        return redirect()->route('compras.index', 'orderBy=data_compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('compras.show', ['compra'=>$compra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('compras.edit', ['compra'=>$compra, 'pessoas'=>$pessoas, 'produtos'=>$produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        $compra->pessoa_id = $request->pessoa_id;
        $compra->produto_id = $request->produto_id;
        $compra->save();
        session()->flash('msg-success', 'Dados atualizados com sucesso!');
        return redirect()->route('compras.index', 'orderBy=data_compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        session()->flash('msg-success', 'Dados da compra excluídos com sucesso!');
        return redirect()->route('compras.index', 'orderBy=data_compra');
    }
}