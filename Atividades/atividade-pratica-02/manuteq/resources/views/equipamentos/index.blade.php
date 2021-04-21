@extends('header')
@section('titulo', 'Equipamentos')
@section('main-conteudo')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="btn-group" role="group" aria-label="Opções de visualização">
                    <a href="#" class="btn btn-success">Tabela de equipamentos</a>
                    <a href="{{ route('registros.index') }}" class="btn btn-outline-success">Tabela de manutenções</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="justify-content-center">
                    <h1 class="text-center mt-4">Lista de Equipamentos</h1>
                </div>
                <div class="table-responsive my-3">
                    <table id="tabela-equipamentos"
                        class="table table-light table-sm table-striped table-hover centralizar">
                        @auth
                            <caption>
                                <div class="justify-content-end d-flex">
                                    <a href="{{ route('equipamentos.create') }}" class="nav-link border bg-light">
                                        Novo equipamento &gt;&gt;</a>
                                </div>
                            </caption>
                        @endauth
                        <thead>
                            <tr class="table-secondary text-center">
                                <th scope="col">Equipamento</th>
                                @auth
                                    <th scope="col">Opções</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipamentos as $equipamento)
                                <tr>
                                    <td style="padding-left: 20px;">
                                        @auth
                                            <a href="{{ route('equipamentos.show', $equipamento->id) }}" class="nav-link">
                                            @endauth
                                            {{ $equipamento->nome }}
                                            @auth
                                            </a>
                                        <td style="width: 180px">
                                            <div class="d-flex">
                                                <a href="{{ route('equipamentos.edit', $equipamento->id) }}"
                                                    class="nav-link text-success item-hover">Editar</a>
                                                <form name="frmDelete"
                                                    action="{{ route('equipamentos.destroy', $equipamento->id) }}"
                                                    method="post"
                                                    onsubmit="return confirm('Excluir {{ $equipamento->nome }}?')">
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
