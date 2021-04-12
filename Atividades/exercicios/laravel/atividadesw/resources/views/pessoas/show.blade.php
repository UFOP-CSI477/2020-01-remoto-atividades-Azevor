@extends('principal')
@section('title', 'Pessoas - detalhes')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Dados Pessoais</h2>
        </div>
        <div>
            <p class="lead"><span style="font-weight: bold;">ID:</span> {{ $pessoa->id }}</p>
            <p class="lead"><span style="font-weight: bold;">NOME:</span> {{ $pessoa->nome }}</p>
            <p class="lead"><span style="font-weight: bold;">CIDADE:</span> {{ $pessoa->cidade->nome }}</p>
        </div>
        <div>
            <div class="btn btn-group">
                <a href="{{ route('pessoas.edit', $pessoa->id) }}" class="btn btn-success">✎ Editar</a>
            </div>
            <div class="btn btn-group">
                <a href="{{ route('pessoas.index') }}" class="btn btn-secondary">↩️ Voltar</a>
            </div>
            <div class="btn btn-group">
                <form name="frmDelete" action="{{ route('pessoas.destroy', $pessoa->id) }}" method="post"
                    onsubmit="return confirm('Excluir cadastro?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="❎ Excluir">
                </form>
            </div>
        </div>
    </div>
@endsection