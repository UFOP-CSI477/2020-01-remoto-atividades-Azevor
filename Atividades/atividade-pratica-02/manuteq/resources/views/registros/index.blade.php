@extends('header')
@section('titulo', 'Manutenção')
@section('main-conteudo')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Opções de visualização">
                    <a href="{{ route('equipamentos.index') }}" class="btn btn-outline-success">Tabela de equipamentos</a>
                    <a href="#" class="btn btn-success">Tabela de manutenções</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="justify-content-center">
                    <h1 class="text-center mt-4">Manutenções Cadastradas</h1>
                </div>
                <div class="table-responsive my-3">
                    <table id="tabela-manutencoes"
                        class="table table-light table-sm table-striped table-hover table-bordered">
                        @auth
                            <caption>
                                <div class="justify-content-end d-flex">
                                    <a href="{{ route('registros.create') }}" class="nav-link border bg-light">
                                        Agendar manutenção &gt;&gt;</a>
                                </div>
                            </caption>
                        @endauth
                        <thead>
                            <tr class="table-secondary text-center">
                                <th scope="col">Data Limite</th>
                                <th scope="col">Equipamento</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Tipo (manut.)</th>
                                <th scope="col">Descrição/Problema</th>
                                @auth
                                    <th>Opções</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)
                                <tr>
                                    <td class="text-center">
                                        {{ date_format(date_create_from_format('Y-m-d', $registro->datalimite), 'd/m/Y') }}
                                    </td>
                                    <td>
                                        @auth
                                            <a href="{{ route('registros.show', $registro->id) }}" class="nav-link">
                                        @endauth
                                        {{ $registro->equipamento->nome }}
                                        @auth
                                            </a>
                                        @endauth
                                    </td>
                                    <td style="width: 130px">{{ $registro->user->name }}</td>
                                    <td class="text-center">
                                        @switch($registro->tipo)
                                            @case(1)
                                                <span class="text-primary">Preventiva
                                            @break
                                            @case(2)
                                                <span class="text-success">Corretiva
                                            @break
                                            @case(3)
                                                <span class="text-danger">Urgente
                                            @break
                                            @default
                                                erro
                                        @endswitch
                                        </span>
                                    </td>
                                    <td>{{ $registro->descricao }}</td>
                                    @auth
                                        <td class="text-center" style="width: 180px">
                                            <div class="d-flex">
                                                <a href="{{ route('registros.edit', $registro->id) }}"
                                                    class="nav-link text-success item-hover">Editar</a>
                                                <form name="frmDelete"
                                                    action="{{ route('registros.destroy', $registro->id) }}" method="post"
                                                    onsubmit="return confirm('Excluir manutenção de {{ $registro->equipamento->nome }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input id="btn-excluir" type="submit"
                                                        class="nav-link text-danger item-hover" value="Excluir">
                                                </form>
                                            </div>
                                        </td>
                                    @endauth
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
