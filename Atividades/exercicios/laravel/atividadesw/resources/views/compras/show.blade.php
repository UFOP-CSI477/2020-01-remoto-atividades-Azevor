@extends('principal')
@section('title', 'Relatório - detalhes')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Dados da Compra</h2>
        </div>
        <div>
            <p class="lead"><span style="font-weight: bold;">ID:</span> {{ $compra->id }}</p>
            <p class="lead"><span style="font-weight: bold;">CLIENTE:</span> {{ $compra->pessoa->nome }}</p>
            <p class="lead"><span style="font-weight: bold;">PRODUTO:</span> {{ $compra->produto->nome }}</p>
            <p class="lead"><span style="font-weight: bold;">DATA DA COMPRA:</span>
                {{ date_format(date_create_from_format('Y-m-d H:i:s', $compra->data_compra), 'd/m/Y') }} às
                {{ date_format(date_create_from_format('Y-m-d H:i:s', $compra->data_compra), 'H:i:s') }}</p>
        </div>
        <div>
            <div class="btn btn-group">
                <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-success">✎ Editar</a>
            </div>
            <div class="btn btn-group">
                <a href="{{ route('compras.index', 'orderBy=data_compra') }}" class="btn btn-secondary">↩️ Voltar</a>
            </div>
            <div class="btn btn-group">
                <form name="frmDelete" action="{{ route('compras.destroy', $compra->id) }}" method="post"
                    onsubmit="return confirm('Excluir compra?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="❎ Excluir">
                </form>
            </div>
        </div>
    </div>
@endsection
