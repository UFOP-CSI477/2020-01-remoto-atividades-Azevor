@extends('header')
@section('titulo', 'Manutenção - Detalhes')
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
                    <h1 class="text-center mt-4">{{ $nomeEquipamento }}</h1>
                </div>
                <div class="table-responsive my-3">
                    <table id="tabela-manutencoes"
                        class="table table-light table-sm table-striped table-hover table-bordered">
                        @auth
                            <caption>
                                <div class="justify-content d-flex">
                                    <span style="color: #000000; font-size: 1.1em;">Este equipamento
                                        @if ($agendamentos->count() == 0)
                                            <strong>não</strong> possui agendamento cadastrado.
                                        @endif
                                        @if ($agendamentos->count() == 1)
                                            possui somente <strong>um</strong> agendamento cadastrado.
                                        @endif
                                        @if ($agendamentos->count() > 1)
                                            possui <strong>{{ $agendamentos->count() }}</strong> agendamentos cadastrados.
                                        @endif
                                            {{-- <strong>Total de manutenções agendadas:</strong>
                                        {{ $agendamentos->count() }}</span> --}}
                                </div>
                            </caption>
                        @endauth
                        <thead>
                            <tr class="table-secondary text-center">
                                <th scope="col">Data Limite</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Tipo (manut.)</th>
                                <th scope="col">Descrição/Problema</th>
                                @auth
                                    <th>Opções</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendamentos as $agendamento)
                                <tr>
                                    <td class="text-center">
                                        {{ date_format(date_create_from_format('Y-m-d', $agendamento->datalimite), 'd/m/Y') }}
                                    </td>
                                    <td style="width: 130px">{{ $agendamento->user->name }}</td>
                                    <td class="text-center">
                                        @switch($agendamento->tipo)
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
                                    <td>{{ $agendamento->descricao }}</td>
                                    @auth
                                        <td class="text-center" style="width: 180px">
                                            <div class="d-flex">
                                                <a href="{{ route('registros.edit', $agendamento->id) }}"
                                                    class="nav-link text-success item-hover">Editar</a>
                                                <form name="frmDelete"
                                                    action="{{ route('registros.destroy', $agendamento->id) }}" method="post"
                                                    onsubmit="return confirm('Excluir manutenção de {{ $agendamento->equipamento->nome }}?')">
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
