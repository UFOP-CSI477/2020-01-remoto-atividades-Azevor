@extends('principal')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Dados do Estado</h2>
        </div>
        <div>
            <p class="lead"><span style="font-weight: bold;">ID:</span> {{ $estado->id }}</p>
            <p class="lead"><span style="font-weight: bold;">NOME:</span> {{ $estado->nome }}</p>
            <p class="lead"><span style="font-weight: bold;">SIGLA:</span> {{ $estado->sigla }}</p>
        </div>
        <div>
            <div class="btn btn-group">
                <a href="{{ route('estados.edit', $estado->id) }}" class="btn btn-success">✎ Editar</a>
            </div>
            <div class="btn btn-group">
                <a href="{{ route('estados.index') }}" class="btn btn-secondary">↩️ Voltar</a>
            </div>
            <div class="btn btn-group">
                <form name="frmDelete" action="{{ route('estados.destroy', $estado->id) }}" method="post"
                    onsubmit="return confirm('Excluir estado?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="❎ Excluir">
                </form>
            </div>
        </div>
    </div>
@endsection
