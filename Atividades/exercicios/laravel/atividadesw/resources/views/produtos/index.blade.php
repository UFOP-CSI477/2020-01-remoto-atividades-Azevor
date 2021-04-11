@extends('home')
@section('conteudo')
    <div>
        <a href="{{ route('produtos.create') }}" class="btn btn-outline-dark btn-sm d-grid gap-2">Cadastrar Produto</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Código <span><a href="{{ route('produtos.index', 'orderBy=id') }}"
                                style="text-decoration: none;">🔽</a></span></th>
                    <th scope="col">Produto <span><a href="{{ route('produtos.index', 'orderBy=nome') }}"
                                style="text-decoration: none;">🔽</a></span></th>
                    <th scope="col">Quantidade <span><a href="{{ route('produtos.index', 'orderBy=quantidade') }}"
                                style="text-decoration: none;">🔽</a></span></th>
                    <th scope="col">und</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="text-center">{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td class="text-center">{{ $produto->quantidade }}</td>
                        <td class="text-center">{{ $produto->um }}</td>
                        <td class="text-center"><a href="{{ route('produtos.show', $produto->id) }}"
                                style="text-decoration: none;" class="btn btn-link">🔍 Exibir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection