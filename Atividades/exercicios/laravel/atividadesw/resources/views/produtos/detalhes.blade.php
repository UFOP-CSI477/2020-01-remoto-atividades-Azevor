@extends('home')
@section('conteudo')
    <div>
        <h1 class="display-6">Detalhes do Produto</h1>
        <p class="lead"><span style="font-weight: bold">Id: </span>{{ $produto->id }}</p>
        <p class="lead"><span style="font-weight: bold">Nome: </span>{{ $produto->nome }}</p>
        <p class="lead"><span style="font-weight: bold">Quantidade: </span>{{ $produto->quantidade }} {{ $produto->um }}
        </p>
    </div>
    <div>
        <div class="btn btn-group">
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-success">✎ Editar</a>
        </div>
        <form name="frmDelete" action="{{ route('produtos.destroy', $produto->id) }}" method="post"
            onsubmit="return confirm('Excluir produto?')">
            @csrf
            @method('DELETE')
            <div class="btn btn-group">
                <input type="submit" class="btn btn-danger" value="🗑 Excluir">
            </div>
        </form>
    </div>
@endsection
