<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy($_GET['orderBy'])->get();
        return view('produtos.index', ['produtos'=>$produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('produtos.create');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
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
        if (Auth::check()) {
            Produto::create($request->all());
            session()->flash('msg-success', 'Gravado com sucesso!');
            return redirect()->route('produtos.index', 'orderBy=nome');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        if (Auth::check()) {
            return view('produtos.edit', ['produto'=>$produto]);
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        if (Auth::check()) {
            $produto->fill($request->all());
            $produto->save();
            session()->flash('msg-success', 'Dados atualizados com sucesso!');
            return redirect()->route('produtos.index', 'orderBy=nome');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        if (Auth::check()) {
            if ($produto->compras->count() > 0) {
                session()->flash('msg-danger', 'Exclusão não permitida! Existem compras cadastradas.');
            } else {
                $produto->delete();
                session()->flash('msg-success', 'Produto excluído!');
            }
            return redirect()->route('produtos.index', 'orderBy=nome');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }
}
