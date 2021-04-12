@extends('principal')
@section('title', 'Produtos - editar produto')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Editar Dados do Produto</h2>
        </div>
        <div>
            <form action="{{ route('produtos.update', $produto->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="text" class="form-control" name="quantidade" id="quantidade"
                                value="{{ $produto->quantidade }}">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="um" class="form-label">Unidade de Medida</label>
                            <select class="form-select" id="um" name="um" aria-label="Unidade de medida do produto">
                                <option value="">&lt;Selecione&gt;</option>
                                <option value="Kg" @if ($produto->um == 'Kg') selected @endif>Kg - Quilograma</option>
                                <option value="Oz" @if ($produto->um == 'Oz') selected @endif>Oz - Onça</option>
                                <option value="M" @if ($produto->um == 'M') selected @endif>M - Metro</option>
                                <option value="Cm" @if ($produto->um == 'Cm') selected @endif>Cm - Centímetro</option>
                                <option value="L" @if ($produto->um == 'L') selected @endif>L - Litro</option>
                                <option value="Pc" @if ($produto->um == 'Pc') selected @endif>Pç - Peça (und)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="btn btn-group col-auto">
                        <input type="submit" class="btn btn-primary" value="Gravar">
                    </div>
                    <div class="btn btn-group col-auto">
                        <input type="reset" class="btn btn-danger" value="Limpar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
