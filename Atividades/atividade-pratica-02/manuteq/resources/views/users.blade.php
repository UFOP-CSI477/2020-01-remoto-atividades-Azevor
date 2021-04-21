@extends('header')
@section('titulo', 'Usuários')
@section('main-conteudo')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="justify-content-center">
                    <h1 class="text-center mt-4">Tabela de Usuários</h1>
                </div>
                <div class="table-responsive my-3">
                    <table id="tabela-equipamentos"
                        class="table table-light table table-striped table-hover centralizar">
                        <thead>
                            <tr class="table-secondary text-center">
                                <th scope="col">Usuário</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
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
