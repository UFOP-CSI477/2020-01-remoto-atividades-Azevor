@extends('principal')
@section('title', 'Relatório - cadastrar compra')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Cadastrar Compra</h2>
        </div>
        <div>
            <form action="{{ route('compras.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="pessoa_id" class="form-label">Cliente</label>
                            <select class="form-control" name="pessoa_id" id="pessoa_id">
                                <option value="">&lt;Selecione&gt;</option>
                                @foreach ($pessoas as $pessoa)
                                    <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
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
                                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
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
            <div class="row text-center">
                <div class="col g-5">
                    <div id="dataHora"></div>
                    {{-- <div id="dataHora" style="text-align: center; font-weight: bold; font-size: 30px;"></div> --}}
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/set-interval.js') }}"></script>
    </div>
@endsection
