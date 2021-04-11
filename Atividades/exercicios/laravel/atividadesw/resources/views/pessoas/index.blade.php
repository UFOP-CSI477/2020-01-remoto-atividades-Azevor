@extends('home')
@section('conteudo')
    <div>
        <a href="{{ route('pessoas.create') }}" class="btn btn-outline-dark btn-sm d-grid gap-2">Cadastrar Pessoa</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pessoas as $pessoa)
                    <tr>
                        <td class="text-center">{{ $pessoa->id }}</td>
                        <td>{{ $pessoa->nome }}</td>
                        <td class="text-center">{{ $pessoa->cidade->nome }}</td>
                        <td class="text-center"><a href="{{ route('pessoas.show', $pessoa->id) }}"
                                style="text-decoration: none;" class="btn btn-link">🔍 Exibir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection