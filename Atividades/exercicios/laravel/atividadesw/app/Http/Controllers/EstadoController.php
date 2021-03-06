<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::orderBy('nome')->get();
        return view('estados.index', ['estados'=>$estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('estados.create');
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
            Estado::create($request->all());
            session()->flash('msg-success', 'Gravado com sucesso!');
            return redirect()->route('estados.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        return view('estados.show', ['estado'=>$estado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        if (Auth::check()) {
            return view('estados.edit', ['estado'=>$estado]);
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        if (Auth::check()) {
            $estado->fill($request->all());
            $estado->save();
            session()->flash('msg-success', 'Dados atualizados com sucesso!');
            return redirect()->route('estados.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        if (Auth::check()) {
            if ($estado->cidades->count() > 0) {
                session()->flash('msg-danger', 'Exclusão não permitida! Existem cidades cadastradas.');
            } else {
                $estado->delete();
                session()->flash('msg-success', 'Estado excluído!');
            }
            return redirect()->route('estados.index');
        } else {
            session()->flash('msg-danger', 'Requer autenticação!');
            return redirect()->route('login');
        }
    }
}
