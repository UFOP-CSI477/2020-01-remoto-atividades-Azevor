<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Category;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('data')->get();
        return view('principal', ['transactions'=>$transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('nome')->get();
        return view('transactions.create', ['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->user_id = $request->user_id;
        $transaction->category_id = $request->category_id;
        $transaction->data = $request->data;
        $transaction->descricao = $request->descricao;
        $transaction->valor = $request->valor;
        $transaction->tipo = intval($request->tipo);
        $transaction->save();
        session()->flash('msg-success', 'Transação gravada com sucesso!');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $categorias = Category::orderBy('nome')->get();
        return view('transactions.edit', ['transaction'=>$transaction, 'categorias'=>$categorias]);
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
        $transaction->category_id = $request->category_id;
        $transaction->data = $request->data;
        $transaction->descricao = $request->descricao;
        $transaction->valor = $request->valor;
        $transaction->tipo = intval($request->tipo);
        $transaction->save();
        session()->flash('msg-success', 'Suas alterações foram gravadas com sucesso!');
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        session()->flash('msg-success', 'Transação excluída!');
        return redirect()->route('index');
    }
}