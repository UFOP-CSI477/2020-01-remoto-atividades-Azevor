@extends('principal')
@section('title', 'Relatório - editar compra')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Editar Dados da Compra</h2>
        </div>
        <div>
            <form action="{{ route('compras.update', $compra->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="pessoa_id" class="form-label">Cliente</label>
                            <select class="form-control" name="pessoa_id" id="pessoa_id">
                                <option value="">&lt;Selecione&gt;</option>
                                @foreach ($pessoas as $pessoa)
                                    <option value="{{ $pessoa->id }}" @if ($pessoa->id == $compra->pessoa->id) selected @endif>{{ $pessoa->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="produto_id" class="form-label">Produto</label>
                            <select class="form-control" name="produto_id" id="produto_id">
                                <option value="">&lt;Selecione&gt;</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{ $produto->id }}" @if ($produto->id == $compra->produto->id) selected @endif>{{ $produto->nome }}</option>
                                @endforeach
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
            <div class="row">
                <div class="col g-3">
                    <p>Compra feita em:
                        {{ date_format(date_create_from_format('Y-m-d H:i:s', $compra->data_compra), 'd/m/Y') }} às
                        {{ date_format(date_create_from_format('Y-m-d H:i:s', $compra->data_compra), 'H:i:s') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
