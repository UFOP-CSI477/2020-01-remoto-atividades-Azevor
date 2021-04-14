<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $usuario_logado = Auth::user()->id;
            $data = array();

            if (empty($_GET)) {
                $data['mes'] = date('m');
                $data['ano'] = date('Y');
            } else {
                try{
                    $data['mes'] = $_GET['mes'];
                    $data['ano'] = $_GET['ano'];
                } catch (\Exception $e) {
                    $data['mes'] = date('m');
                    $data['ano'] = date('Y');
                }
            }

            $transactions = Transaction::where('user_id', $usuario_logado)->whereMonth('data', $data['mes'])->whereYear('data', $data['ano'])->orderBy('data')->get();
            $categories = Category::where('user_id', $usuario_logado)->orderBy('nome')->get();
            $despesa_mensal = Transaction::where('user_id', $usuario_logado)->whereMonth('data', $data['mes'])->whereYear('data', $data['ano'])->whereTipo(0)->sum('valor');
            $receita_mensal = Transaction::where('user_id', $usuario_logado)->whereMonth('data', $data['mes'])->whereYear('data', $data['ano'])->whereTipo(1)->sum('valor');
            $despesa_total = Transaction::where('user_id', $usuario_logado)->whereTipo(0)->sum('valor');
            $receita_total = Transaction::where('user_id', $usuario_logado)->whereTipo(1)->sum('valor');

            return view('home', compact('transactions', 'categories', 'despesa_mensal', 'receita_mensal', 'despesa_total', 'receita_total', 'data'));
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $categorias = Category::where('user_id', Auth::user()->id)->orderBy('nome')->get();
            return view('transactions.create', ['categorias'=>$categorias]);
        } else {
            return view('auth.login');
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
            $transaction = new Transaction;
            $transaction->user_id = Auth::user()->id;
            $transaction->category_id = $request->category_id;
            $transaction->data = $request->data;
            $transaction->descricao = $request->descricao;
            $transaction->valor = number_format(str_replace(',', '.', $request->valor), 2, ".", "");
            $transaction->tipo = intval($request->tipo);
            $transaction->save();
            session()->flash('msg-success', 'Transação gravada com sucesso!');
            return redirect()->route('index');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        if (Auth::check()) {
            $categorias = Category::where('user_id', Auth::user()->id)->orderBy('nome')->get();
            return view('transactions.edit', ['transaction'=>$transaction, 'categorias'=>$categorias]);
        } else {
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        if (Auth::check()) {
            $transaction->data = $request->data;
            // $transaction->category_id = Auth::user()->id;
            $transaction->descricao = $request->descricao;
            $transaction->valor = number_format(str_replace(',', '.', $request->valor), 2, ".", "");
            $transaction->category_id = $request->category_id;
            $transaction->tipo = intval($request->tipo);
            $transaction->save();
            session()->flash('msg-success', 'Suas alterações foram gravadas com sucesso!');
            return redirect()->route('index');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        if (Auth::check()) {
            $transaction->delete();
            session()->flash('msg-success', 'Transação excluída!');
            return redirect()->route('index');
        } else {
            return view('auth.login');
        }
    }
}