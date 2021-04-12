@extends('principal')
@section('title', 'Cidades - editar cidade')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Editar Dados</h2>
        </div>
        <div>
            <form action="{{ route('cidades.update', $cidade->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="{{ $cidade->nome }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="estado_id" class="form-label">Estado</label>
                            <select class="form-control" name="estado_id" id="estado_id">
                                <option value="">&lt;Selecione&gt;</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}" 
                                    @if ($cidade->estado->id == $estado->id) 
                                        selected 
                                    @endif>
                                    {{ $estado->nome }}</option>
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
        </div>
    </div>
@endsection