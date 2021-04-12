@extends('principal')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Cadastrar Produto</h2>
        </div>
        <div>
            <form action="{{ route('produtos.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="text" class="form-control" name="quantidade" id="quantidade">
                        </div>
                    </div>
                    <div class="col-auto">
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
