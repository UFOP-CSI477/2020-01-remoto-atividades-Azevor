@extends('home')
@section('conteudo')
    <div>
        <a href="{{ route('estados.create') }}" class="btn btn-outline-dark btn-sm d-grid gap-2">Cadastrar Estado</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($estados as $estado)
                    <tr>
                        <td class="text-center">{{ $estado->id }}</td>
                        <td>{{ $estado->nome }}</td>
                        <td class="text-center">{{ $estado->sigla }}</td>
                        <td class="text-center"><a href="{{ route('estados.show', $estado->id) }}"
                                style="text-decoration: none;" class="btn btn-link">🔍 Exibir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
