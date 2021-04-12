<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        return view('pessoas.index', ['pessoas'=>$pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('pessoas.create', ['cidades'=>$cidades]);
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
            Pessoa::create($request->all());
            session()->flash('msg-success', 'Gravado com sucesso!');
            return redirect()->route('pessoas.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return view('pessoas.show', ['pessoa'=>$pessoa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('pessoas.edit', ['pessoa'=>$pessoa, 'cidades'=>$cidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        if (Auth::check()) {
            $pessoa->fill($request->all());
            $pessoa->save();
            session()->flash('msg-success', 'Dados atualizados com sucesso!');
            return redirect()->route('pessoas.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        if (Auth::check()) {
            if ($pessoa->compras->count() > 0) {
                session()->flash('msg-danger', 'Exclusão não permitida! Existem compras cadastradas.');
            } else {
                $pessoa->delete();
                session()->flash('msg-success', 'Dados excluídos!');
            }
            return redirect()->route('pessoas.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }
}
