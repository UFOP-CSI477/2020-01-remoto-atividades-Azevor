@extends('principal')
@section('conteudo')
    <div>
        <a href="{{ route('cidades.create') }}" class="btn btn-outline-dark btn-sm d-grid gap-2">Cadastrar Cidade</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">UF</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cidades as $cidade)
                    <tr>
                        <td class="text-center">{{ $cidade->id }}</td>
                        <td>{{ $cidade->nome }}</td>
                        <td class="text-center">{{ $cidade->estado->sigla }}</td>
                        <td class="text-center"><a href="{{ route('cidades.show', $cidade->id) }}"
                                style="text-decoration: none;" class="btn btn-link">🔍 Exibir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection