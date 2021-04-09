@extends('home')
@section('conteudo')
    <div>
        <h2 class="display-6 text-center">Novo Produto</h2>
    </div>
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="form-group">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade">
        </div>
        <div class="form-group">
            <label for="um" class="form-label">Unidade de Medida</label>
            <select class="form-select" id="um" name="um" aria-label="Unidade de medida do produto">
                <option value="" selected>&lt;Selecione&gt;</option>
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
                <input type="reset" class="btn btn-danger" value="Limpar">
            </div>
        </div>
    </form>
@endsection
