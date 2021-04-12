@extends('principal')
@section('title', 'Produtos - detalhes do produto')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Dados do Produto</h2>
        </div>
        <div>
            <p class="lead"><span style="font-weight: bold">Id: </span>{{ $produto->id }}</p>
            <p class="lead"><span style="font-weight: bold">Nome: </span>{{ $produto->nome }}</p>
            <p class="lead"><span style="font-weight: bold">Quantidade: </span>{{ $produto->quantidade }}
                {{ $produto->um }}
            </p>
        </div>
        <div>
            <div class="btn btn-group">
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-success">✎ Editar</a>
            </div>
            <div class="btn btn-group">
                <a href="{{ route('produtos.index', 'orderBy=nome') }}" class="btn btn-secondary">↩️ Voltar</a>
            </div>
            <div class="btn btn-group">
                <form name="frmDelete" action="{{ route('produtos.destroy', $produto->id) }}" method="post"
                    onsubmit="return confirm('Excluir produto?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="❎ Excluir">
                </form>
            </div>
        </div>
    </div>
@endsection
