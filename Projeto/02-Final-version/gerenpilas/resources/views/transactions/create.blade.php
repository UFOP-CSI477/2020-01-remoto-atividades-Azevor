@extends('molde')
@section('title', 'Nova Transação')
@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                {{-- CONTEÚDO DA PÁGINA --}}
                <div class="card-principal">
                    <div class="conteudo-principal">
                        <div class="text-center mt-3">
                            <h2>Adicionar transação</h2>
                        </div>
                        <div class="mx-5">
                            <form action="{{ route('transactions.store') }}" method="post"
                                onsubmit="return validarTransacao();">
                                @csrf
                                <div class="row mx-5">
                                    <div class="col mx-5">
                                        <div class="form-group mx-5">
                                            <label for="descricao" class="form-label">Descrição</label>
                                            <input type="text" class="form-control" name="descricao" id="descricao">
                                            <div id="campo-descricao-invalido" class="text-danger d-none">* Informar
                                                descrição!</div>
                                        </div>
                                        <div class="form-group mx-5">
                                            <label for="data" class="form-label">Data</label>
                                            <input type="date" class="form-control" name="data" id="data"
                                                value="{{ date('Y-m-d', time()) }}">
                                            <div id="campo-data-invalido" class="text-danger d-none">* Informar data!</div>
                                        </div>
                                        <div class="form-group mx-5">
                                            <label for="valor" class="form-label">Valor</label>
                                            <input type="text" class="form-control" name="valor" id="valor"
                                                onkeypress="mascaraInput(this)">
                                            <div id="campo-valor-invalido" class="text-danger d-none">* Informar valor!
                                            </div>
                                        </div>
                                        <div class="form-group mx-5">
                                            <label for="category_id" class="form-label">Categoria</label>
                                            <select class="form-select" name="category_id" id="category_id">
                                                <option value="">&lt;Selecione&gt;</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                                @endforeach
                                            </select>
                                            <div id="campo-categoria-invalido" class="text-danger d-none">* Informar
                                                categoria!</div>
                                        </div>
                                        <div class="mt-3 mx-5">
                                            <label for="meta-tipo" class="form-label">Tipo de Transação</label>
                                            <div id="contorno-tipo-transacao" class="border">
                                                <div class="form-check mx-5">
                                                    <input class="form-check-input" type="radio" name="tipo-transacao"
                                                        id="tipo-receita" value="1">
                                                    <label class="form-check-label text-success" for="tipo">
                                                        Receita
                                                    </label>
                                                </div>
                                                <div class="form-check mx-5">
                                                    <input class="form-check-input" type="radio" name="tipo-transacao"
                                                        id="tipo-despesa" value="0">
                                                    <label class="form-check-label text-danger" for="tipo">
                                                        Despesa
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="campo-tipo-transacao-invalido" class="text-danger d-none">* Informar
                                                tipo de transação!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-end mt-3">
                                        <input type="submit" class="btn btn-primary" value="Gravar">
                                    </div>
                                    <div class="col mt-3">
                                        <a href="{{ route('index') }}" class="btn btn-secondary">Voltar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
