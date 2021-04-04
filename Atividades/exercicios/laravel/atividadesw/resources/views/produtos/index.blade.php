@extends('home')
@section('conteudo')
<table class="table table-bordered table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">und</th>
        </tr>
    </thead>

    <tbody class="table-light">
        @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>{{ $produto->um }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection