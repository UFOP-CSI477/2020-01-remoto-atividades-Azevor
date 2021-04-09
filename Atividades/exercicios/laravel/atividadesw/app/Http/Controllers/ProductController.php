<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Product::orderBy($_GET['orderBy'])->get();
        return view('produtos.index', ['produtos'=>$produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->all()['nome'] == null || $request->all()['quantidade'] == null || $request->all()['um'] == null) {
            session()->flash('mensagem', 'Tentativa de cadastrar falhou!');
            return redirect()->route('produtos.create');
        } else {
            Product::create($request->all());
            session()->flash('mensagem', 'Gravado com sucesso!');
            return redirect()->route('produtos.index', 'orderBy=id');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('produtos.detalhes', ['produto'=>Product::FindOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('produtos.editar', ['produto'=>Product::FindOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Product::FindOrFail($id);
        $produto->fill($request->all());
        $produto->save();
        session()->flash('mensagem', 'Dados atualizados com sucesso!');
        return redirect()->route('produtos.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Product::FindOrFail($id);
        $produto->delete();
        session()->flash('mensagem', 'Produto excluído!');
        return redirect()->route('produtos.index', 'orderBy=id');
    }
}