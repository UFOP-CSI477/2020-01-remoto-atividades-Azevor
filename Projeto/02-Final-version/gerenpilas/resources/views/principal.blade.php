@extends('molde')
@section('title', 'Gerenpilas')
@section('conteudo')

    <?php $meses = [1 => 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', ' julho', 'agosto',
    'setembro', 'outubro', 'novembro', 'dezembro']; ?>

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
                            <a href="{{ route('transactions.create') }}" class="btn btn-success">Transação</a>
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
                                    <p class="saldo-titulo text-center texto-saldo">Saldo Mensal</p>
                                    <p class="texto-saldo texto-receita">Receita: <span class="valor-saldo texto-receita">R$
                                            0,00</span></p>
                                    <p class="texto-saldo texto-despesa">Despesa: <span class="valor-saldo texto-despesa">R$
                                            0,00</span></p>
                                    <p class="texto-saldo texto-total">Total: <span class="valor-saldo texto-total">R$
                                            0,00</span></p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="saldo">
                                    <p class="saldo-titulo text-center texto-saldo">Saldo Geral</p>
                                    <p class="texto-saldo texto-receita">Receita: <span class="valor-saldo texto-receita">R$
                                            0,00</span></p>
                                    <p class="texto-saldo texto-despesa">Despesa: <span class="valor-saldo texto-despesa">R$
                                            0,00</span></p>
                                    <p class="texto-saldo texto-total">Total: <span class="valor-saldo texto-total">R$
                                            0,00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col table-responsive">
                                {{-- TABELA DE TRANSAÇÕES --}}
                                <table class="table table-sm table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Data</th>
                                            <th scope="col">Transação Efetuada</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $t)
                                            <tr>
                                                <td>{{ date_format(date_create_from_format('Y-m-d', $t->data), 'd/m/Y') }}
                                                </td>
                                                <td><a href="{{ route('transactions.edit', $t->id) }}"
                                                        class="nav-link text-primary">{{ $t->descricao }}</a></td>
                                                <td><a href="{{ route('categories.edit', $t->category->id) }}"
                                                        class="nav-link text-primary">{{ $t->category->nome }}</a></td>
                                                <td>{{ $t->valor }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">Total do mês</td>
                                            <td>R$ 0,00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
