<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::orderBy('datalimite')->get();
        return view('registros.index', ['registros'=>$registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $equipamentos = Equipamento::orderBy('nome')->get();
            return view('registros.create', ['equipamentos'=>$equipamentos]);
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
            // 
            if ($request->descricao == "" || $request->datalimite == "" || $request->tipo == "" || $request->equipamento_id == "") {
                session()->flash('msg-danger', 'Preenchimento inválido. Não foi possível agendar manutenção!');
                return redirect()->route('registros.create');
            }
            // 
            $registro = new Registro;
            $registro->descricao = $request->descricao;
            $registro->datalimite = date_create_from_format('Y-m-d', $request->datalimite)->format('Y-m-d');
            $registro->tipo = intval($request->tipo);
            $registro->user_id = Auth::id();
            $registro->equipamento_id = intval($request->equipamento_id);
            $registro->save();
            session()->flash('msg-success', 'Agendamento realizado com sucesso!');
            return redirect()->route('registros.index');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        if (Auth::check()) {
            $agendamentos = Registro::where('equipamento_id', $registro->equipamento_id)->orderBy('datalimite')->get();
            $nomeEquipamento = $registro->equipamento->nome;
            return view('registros.show', ['nomeEquipamento'=>$nomeEquipamento, 'agendamentos'=>$agendamentos]);
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        if (Auth::check()) {
            $equipamentos = Equipamento::orderBy('nome')->get();
            return view('registros.edit', ['registro'=>$registro, 'equipamentos'=>$equipamentos]);
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        if (Auth::check()) {
            // 
            if ($request->descricao == "" || $request->datalimite == "" || $request->tipo == "" || $request->equipamento_id == "") {
                session()->flash('msg-danger', 'Preenchimento inválido. Não foi possível atualizar agendamento!');
                return redirect()->route('registros.edit', $registro->id);
            }
            // 
            $registro->descricao = $request->descricao;
            $registro->datalimite = date_create_from_format('Y-m-d', $request->datalimite)->format('Y-m-d');
            $registro->tipo = intval($request->tipo);
            $registro->user_id = Auth::id();
            $registro->equipamento_id = intval($request->equipamento_id);
            $registro->save();
            session()->flash('msg-success', 'Dados alterados com sucesso!');
            return redirect()->route('registros.index');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        if (Auth::check()) {
            $registro->delete();
            session()->flash('msg-success', 'Agendamento excluído com sucesso!');
            return redirect()->route('registros.index');
        } else {
            session()->flash('msg-danger', 'Usuário não autenticado!');
            return redirect()->route('login');
        }
    }
}
