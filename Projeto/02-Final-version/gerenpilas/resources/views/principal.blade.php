@extends('molde')
@section('title', 'Gerenpilas')
@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                {{-- CONTEÚDO DA PÁGINA --}}
                <div class="card-principal">
                    <div class="conteudo-principal">
                        <div class="text-center">
                            {{-- MUDAR PARA DATA E HORA COM BASE NA SELEÇÃO --}}
                            <div class="data-head">{{ ucfirst($mes_atual = $meses[intval(date('m'))]) }} -
                                {{ $year = date('Y') }}</div>
                            <hr class="div-head">
                        </div>
                        <div class="justify-content">
                            {{-- ABRIR MODAL --}}
                            <a href="{{ route('categories.index') }}" class="btn btn-success">Categoria</a>
                            <a href="#" class="btn btn-success">Transação</a>
                        </div>
                        <div class="row">
                            <div class="col-auto d-flex mt-2">
                                <div class="form-group">
                                    <select name="mes" id="mes" class="form-select">
                                        @foreach ($meses as $key => $mes)
                                            {{-- ***** deixar selecionado o mes corrente --}}
                                            <option value="{{ $key }}" @if ($mes == $mes_atual) selected @endif>
                                                {{ ucfirst($mes) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto d-flex mt-2">
                                <div class="form-group">
                                    <select name="ano" id="ano" class="form-select">
                                        @for ($i = 2020; $i <= 2030; $i++)
                                            {{-- ***** deixar selecionado o ano corrente --}}
                                            <option value="{{ $i }}" @if ($i == $year) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="saldo">
                                    <p class="saldo-titulo text-center">Saldo Mensal</p>
                                    <p class="texto-saldo texto-receita">Receita: <span class="valor-saldo texto-receita">R$ 0,00</span></p>
                                    <p class="texto-saldo texto-despesa">Despesa: <span class="valor-saldo texto-despesa">R$ 0,00</span></p>
                                    <p class="texto-saldo texto-total">Total: <span class="valor-saldo texto-total">R$ 0,00</span></p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="saldo">
                                    <p class="saldo-titulo text-center">Saldo Geral</p>
                                    <p class="texto-saldo texto-receita">Receita: <span class="valor-saldo texto-receita">R$ 0,00</span></p>
                                    <p class="texto-saldo texto-despesa">Despesa: <span class="valor-saldo texto-despesa">R$ 0,00</span></p>
                                    <p class="texto-saldo texto-total">Total: <span class="valor-saldo texto-total">R$ 0,00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col table-responsive">
                                {{-- TABELA DE TRANSAÇÕES --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
