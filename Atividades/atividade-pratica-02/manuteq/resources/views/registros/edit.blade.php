@extends('header')
@section('titulo', 'Manutenção - Editar')
@section('main-conteudo')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Opções de visualização">
                    <a href="{{ route('equipamentos.index') }}" class="btn btn-outline-success">Tabela de equipamentos</a>
                    <a href="{{ route('registros.index') }}" class="btn btn-outline-success">Tabela de manutenções</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="justify-content-center">
                    <h1 class="text-center mt-4">Editar Agendamento</h1>
                </div>
                <div class="formulario formulario-equipamento my-3">
                    <form action="{{ route('registros.update', $registro->id) }}" method="post" onsubmit="return validarManutencao();">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="row my-2 justify-content-center">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="tipo" class="form-label">Tipo</label>
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value="1" class="text-primary" @if ($registro->tipo == 1) selected @endif>
                                                    Preventiva</option>
                                                <option value="2" class="text-success" @if ($registro->tipo == 2) selected @endif>
                                                    Corretiva</option>
                                                <option value="3" class="text-danger" @if ($registro->tipo == 3) selected @endif>
                                                    Urgente</option>
                                            </select>
                                            <div id="campo-tipo-invalido" class="text-danger d-none">
                                                * Por favor, informe um tipo válido!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="datalimite" class="form-label">Data Limite</label>
                                            <input type="date" class="form-control" name="datalimite" id="datalimite"
                                                min="{{ date('Y-m-d', time()) }}" value="{{ $registro->datalimite }}">
                                            <div id="campo-datalimite-invalido" class="text-danger d-none">
                                                * Por favor, selecione uma data válida!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2 justify-content-center">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="equipamento_id" class="form-label">Equipamento</label>
                                            <select class="form-control" name="equipamento_id" id="equipamento_id">
                                                @foreach ($equipamentos as $equipamento)
                                                    <option value="{{ $equipamento->id }}" @if ($registro->equipamento_id == $equipamento->id) selected @endif>{{ $equipamento->nome }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div id="campo-equipamento_id-invalido" class="text-danger d-none">
                                                * Por favor, selecione um equipamento!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2 justify-content-center">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="descricao" class="form-label">Descreva o problema do
                                                equipamento</label>
                                            <textarea class="form-control" id="descricao" name="descricao" rows="3"
                                                maxlength="190"
                                                placeholder="(Ex.: Manutenção de rotina)">{{ $registro->descricao }}</textarea>
                                                <div id="campo-descricao-invalido" class="text-danger d-none">
                                                    * Por favor, informe uma descrição para o agendamento!
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-end mt-3">
                                <input type="submit" class="btn btn-primary" value="Gravar">
                            </div>
                            <div class="col mt-3">
                                <a href="{{ route('registros.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
