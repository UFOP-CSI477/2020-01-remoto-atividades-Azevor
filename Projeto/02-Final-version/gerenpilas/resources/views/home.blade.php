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
                            <div class="data-head">{{ ucfirst($mes_atual = $meses[intval($data['mes'])]) }} -
                                {{ $ano_atual = $data['ano'] }}</div>
                            <hr class="div-head">
                        </div>
                        <div class="justify-content">
                            <a href="{{ route('categories.index') }}" class="btn btn-success">Categoria</a>
                            <a href="{{ route('transactions.create') }}" class="btn btn-success">Transação</a>
                        </div>
                        <div class="row">
                            <div class="col-auto d-flex mt-2">
                                <div class="form-group">
                                    <select name="mes" id="mes" class="form-select" onchange="setarLocal()">
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
                                    <select name="ano" id="ano" class="form-select" onchange="setarLocal()">
                                        @for ($i = 2020; $i <= 2030; $i++)
                                            {{-- ***** deixar selecionado o ano corrente --}}
                                            <option value="{{ $i }}" @if ($i == $ano_atual) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="saldo">
                                    <p class="saldo-titulo text-center texto-saldo">Saldo Mensal</p>
                                    <p class="texto-saldo texto-receita text-primary">Receita: <span class="valor-saldo">R$
                                            {{ number_format($receita_mensal, 2, ',', '.') }}</span></p>
                                    <p class="texto-saldo texto-despesa text-danger">Despesa: <span class="valor-saldo">R$
                                            {{ number_format($despesa_mensal, 2, ',', '.') }}</span></p>
                                    <p class="texto-saldo texto-total
                                    @if ($receita_mensal - $despesa_mensal < 0)
                                        text-danger
                                    @else
                                        text-success
                                    @endif
                                    ">Total: <span class="valor-saldo">R$
                                            {{ number_format($receita_mensal - $despesa_mensal, 2, ',', '.') }}</span></p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="saldo">
                                    <p class="saldo-titulo text-center texto-saldo">Saldo Geral</p>
                                    <p class="texto-saldo texto-receita text-primary">Receita: <span class="valor-saldo">R$
                                        {{ number_format($receita_total, 2, ',', '.') }}</span></p>
                                <p class="texto-saldo texto-despesa text-danger">Despesa: <span class="valor-saldo">R$
                                        {{ number_format($despesa_total, 2, ',', '.') }}</span></p>
                                <p class="texto-saldo texto-total
                                @if ($receita_total - $despesa_total < 0)
                                    text-danger
                                @else
                                    text-success
                                @endif
                                ">Total: <span class="valor-saldo">R$
                                        {{ number_format($receita_total - $despesa_total, 2, ',', '.') }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col table-responsive">
                                <hr class="div-head">
                                {{-- TABELA DE TRANSAÇÕES --}}
                                <table class="table table-sm table-striped table-hover align-middle">
                                    <thead>
                                        <tr style="font-size: 0.6em">
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
                                                <td><span class=
                                                @if ($t->tipo)
                                                    text-success
                                                @else
                                                    text-danger
                                                @endif
                                                >R$ {{ number_format($t->valor, 2, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="font-weight: bold" class=
                                            @if ($receita_mensal - $despesa_mensal < 0)
                                                text-danger
                                            @else
                                                text-primary
                                            @endif
                                        >
                                            <td colspan="3">Total do mês</td>
                                            <td>R$ {{ number_format($receita_mensal - $despesa_mensal, 2, ',', '.') }}</td>
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
