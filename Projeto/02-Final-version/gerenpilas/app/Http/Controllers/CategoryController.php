<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $categorias = Category::where('user_id', Auth::user()->id)->orderBy('nome')->get();
            return view('categories.index', ['categorias'=>$categorias]);
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
            return view('categories.create');
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
            $category = new Category;
            $category->user_id = Auth::user()->id;
            $category->nome = $request->nome;
            $category->save();
            session()->flash('msg-success', 'Categoria gravada com sucesso!');
            return redirect()->route('categories.index');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if (Auth::check()) {
            return view('categories.show', ['categoria'=>$category]);
        } else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (Auth::check()) {
            return view('categories.edit', ['categoria'=>$category]);
        } else {
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (Auth::check()) {
            $category->nome = $request->nome;
            $category->save();
            session()->flash('msg-success', 'Categoria atualizada!');
            return redirect()->route('categories.index');
        } else {
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Auth::check()) {
            $transaction_in = Transaction::where('category_id', $category->id)->orderBy('id')->get();
        
            if ($transaction_in->count() > 0) {
                session()->flash('msg-danger', 'Exclusão não permitida! Categoria pertence a uma ou mais transações.');
            } else {
                $category->delete();
                session()->flash('msg-success', 'Categoria excluída!');
            }
            return redirect()->route('categories.index');
        } else {
            return view('auth.login');
        }
    }
}
