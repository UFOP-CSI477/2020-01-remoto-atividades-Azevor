<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('cidades.index', ['cidades'=>$cidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $estados = Estado::orderBy('nome')->get();
            return view('cidades.create', ['estados'=>$estados]);
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
            Cidade::create($request->all());
            session()->flash('msg-success', 'Cidade gravada com sucesso!');
            return redirect()->route('cidades.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        return view('cidades.show', ['cidade'=>$cidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        if (Auth::check()) {
            $estados = Estado::orderBy('nome')->get();
            return view('cidades.edit', ['cidade'=>$cidade, 'estados'=>$estados]);
        }  else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        if (Auth::check()) {
            $cidade->fill($request->all());
            $cidade->save();
            session()->flash('msg-success', 'Dados atualizados com sucesso!');
            return redirect()->route('cidades.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        if (Auth::check()) {
            if ($cidade->pessoas->count() > 0) {
                session()->flash('msg-danger', 'Exclusão não permitida! Existem pessoas cadastradas.');
            } else {
                $cidade->delete();
                session()->flash('msg-success', 'Cidade excluída!');
            }
            return redirect()->route('cidades.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }
}