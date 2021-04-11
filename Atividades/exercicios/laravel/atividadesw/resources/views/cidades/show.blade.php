@extends('home')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Dados da Cidade</h2>
        </div>
        <div>
            <p class="lead"><span style="font-weight: bold;">ID:</span> {{ $cidade->id }}</p>
            <p class="lead"><span style="font-weight: bold;">NOME:</span> {{ $cidade->nome }}</p>
            <p class="lead"><span style="font-weight: bold;">ESTADO:</span> {{ $cidade->estado->nome }}</p>
        </div>
        <div>
            <div class="btn btn-group">
                <a href="{{ route('cidades.edit', $cidade->id) }}" class="btn btn-success">✎ Editar</a>
            </div>
            <div class="btn btn-group">
                <a href="{{ route('cidades.index') }}" class="btn btn-secondary">↩️ Voltar</a>
            </div>
            <div class="btn btn-group">
                <form name="frmDelete" action="{{ route('cidades.destroy', $cidade->id) }}" method="post"
                    onsubmit="return confirm('Excluir cidade?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="❎ Excluir">
                </form>
            </div>
        </div>
    </div>
@endsection