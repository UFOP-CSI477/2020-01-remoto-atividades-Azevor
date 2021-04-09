@extends('home')
@section('conteudo')
    <div>
        <h2 class="display-6 text-center">Atualizar Dados do Produto</h2>
    </div>
    <div class="text-center">
        {{-- Mensagem de retorno --}}
        @if (session('mensagem'))
            <div class="alert alert-danger text-center">
                {{ session('mensagem') }}
            </div>
        @endif
    </div>
    <form action="{{ route('produtos.update', $produto->id) }}" method="post">
        <form action="#" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}">
        </div>
        <div class="form-group">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade" value="{{ $produto->quantidade }}">
        </div>
        <div class="form-group">
            <label for="um" class="form-label">Unidade de Medida</label>
            <select class="form-select" id="um" name="um" aria-label="Unidade de medida do produto">
                <option value="{{ $produto->um }}" selected>Und atual: {{ $produto->um }}</option>
                <option value="Kg">Kg - Quilograma</option>
                <option value="Oz">Oz - Onça</option>
                <option value="M">M - Metro</option>
                <option value="Cm">Cm - Centímetro</option>
                <option value="L">L - Litro</option>
                <option value="Pc">Pç - Peça (und)</option>
            </select>
        </div>
        <div class="text-center">
            <div class="btn btn-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
            <div class="btn btn-group">
                <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </form>
@endsection
