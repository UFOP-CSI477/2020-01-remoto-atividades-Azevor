@extends('principal')
@section('title', 'Relatório')
@section('conteudo')
    <div>
        <a href="{{ route('compras.create') }}" class="btn btn-outline-dark btn-sm d-grid gap-2">Cadastrar Compra</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Data / Hora da Compra <span><a
                                href="{{ route('compras.index', 'orderBy=data_compra') }}"
                                style="text-decoration: none;">🔽</a></span></th>
                    <th scope="col">Produto <span><a href="{{ route('compras.index', 'orderBy=produto_id') }}"
                                style="text-decoration: none;">🔽</a></span></th>
                    <th scope="col">Cliente <span><a href="{{ route('compras.index', 'orderBy=pessoa_id') }}"
                                style="text-decoration: none;">🔽</a></span></th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($compras as $compra)
                    <tr>
                        <td class="text-center">{{ $compra->id }}</td>
                        <td class="text-center">
                            {{ date_format(date_create_from_format('Y-m-d H:i:s', $compra->data_compra), 'd/m/Y') }} -
                            {{-- {{ date_format($compra->data_compra, 'd/m/Y') }} - --}}
                            {{ date_format(date_create_from_format('Y-m-d H:i:s', $compra->data_compra), 'H:i:s') }}</td>
                            {{-- {{ date_format($compra->data_compra, 'H:i:s') }} --}}
                        <td>{{ $compra->produto->nome }}</td>
                        <td>{{ $compra->pessoa->nome }}</td>
                        <td class="text-center"><a href="{{ route('compras.show', $compra->id) }}"
                                style="text-decoration: none;" class="btn btn-link">🔍 Exibir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
