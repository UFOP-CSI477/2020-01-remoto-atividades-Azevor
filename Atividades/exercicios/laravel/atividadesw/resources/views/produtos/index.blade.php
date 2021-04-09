@extends('home')
@section('conteudo')
    <div>
        <div class="btn">
            <a href="{{ route('produtos.create') }}" class="btn btn-success">Inserir Produto</a>
        </div>
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

            <tbody class="table-light">
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="text-center">{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td class="text-center">{{ $produto->quantidade }}</td>
                        <td class="text-center">{{ $produto->um }}</td>
                        <td class="text-center"><a href="{{ route('produtos.show', $produto->id) }}">Exibir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
