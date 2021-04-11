@extends('home')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Editar Dados Pessoais</h2>
        </div>
        <div>
            <form action="{{ route('pessoas.update', $pessoa->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="{{ $pessoa->nome }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cidade_id" class="form-label">Cidade</label>
                            <select class="form-control" name="cidade_id" id="cidade_id">
                                <option value="">&lt;Selecione&gt;</option>
                                @foreach ($cidades as $cidade)
                                    <option value="{{ $cidade->id }}" 
                                    @if ($pessoa->cidade->id == $cidade->id) 
                                        selected 
                                    @endif>
                                    {{ $cidade->nome }}</option>
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