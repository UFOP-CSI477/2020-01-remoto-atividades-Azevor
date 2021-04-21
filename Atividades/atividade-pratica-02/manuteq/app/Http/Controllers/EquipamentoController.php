<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = Equipamento::orderBy('nome')->get();
        return view('equipamentos.index', ['equipamentos'=>$equipamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('equipamentos.create');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
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
            if ($request->nome == ""){
                session()->flash('msg-danger', 'Preenchimento inválido!');
                return redirect()->route('equipamentos.create');
            }
            Equipamento::create($request->all());
            session()->flash('msg-success', 'Equipamento cadastrado com sucesso!');
            return redirect()->route('equipamentos.index');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamento $equipamento)
    {
        if (Auth::check()) {
            $agendamentos = Registro::where('equipamento_id', $equipamento->id)->orderBy('datalimite')->get();
            $nomeEquipamento = $equipamento->nome;
            return view('registros.show', ['nomeEquipamento'=>$nomeEquipamento, 'agendamentos'=>$agendamentos]);
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipamento $equipamento)
    {
        if (Auth::check()) {
            return view('equipamentos.edit', ['equipamento'=>$equipamento]);
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipamento $equipamento)
    {
        if (Auth::check()) {
            if ($request->nome == ""){
                session()->flash('msg-danger', 'Preenchimento inválido!');
                return redirect()->route('equipamentos.edit', $equipamento->id);
            }
            $equipamento->fill($request->all());
            $equipamento->save();
            session()->flash('msg-success', 'Dados alterados com sucesso!');
            return redirect()->route('equipamentos.index');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamento $equipamento)
    {
        if (Auth::check()) {
            if ($equipamento->registros->count() > 0) {
                session()->flash('msg-danger', 'Não foi possível excluir ' . $equipamento->nome . '! Existe manutenção agendada.');
            } else {
                $equipamento->delete();
                session()->flash('msg-success', 'Equipamento excluído!');
            }
            return redirect()->route('equipamentos.index');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }
}
