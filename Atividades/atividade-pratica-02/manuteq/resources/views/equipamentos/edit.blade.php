@extends('header')
@section('titulo', 'Equipamentos - Editar')
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
                    <h1 class="text-center mt-4">Editar Equipamento</h1>
                </div>
                <div class="formulario formulario-equipamento my-3">
                    <form action="{{ route('equipamentos.update', $equipamento->id) }}" method="post"
                        onsubmit="return cadastrarEquipamento();">
                        @csrf
                        @method('PUT')
                        <div class="row mx-5">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nome" class="form-label">Nome do equipamento</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $equipamento->nome }}">
                                    <div id="campo-nome-invalido" class="text-danger d-none">
                                        * Por favor, informe um nome válido!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-end mt-3">
                                <input type="submit" class="btn btn-primary" value="Gravar">
                            </div>
                            <div class="col mt-3">
                                <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
