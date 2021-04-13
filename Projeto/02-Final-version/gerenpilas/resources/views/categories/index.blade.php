@extends('molde')
@section('title', 'Categorias')
@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                {{-- CONTEÚDO DA PÁGINA --}}
                <div class="card-principal">
                    <div class="conteudo-principal">
                        <div class="text-center mt-3">
                            <h2>Categorias Cadastradas</h2>
                        </div>
                        <div class="table-responsive mt-5" id="tabela-categorias">
                            <div class="text-end">
                                <a href="{{ route('categories.create') }}" class="btn btn-secondary">Adicionar
                                    Categoria</a>
                                <a href="{{ route('index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                            <table class="table table-bordered table-hover table-striped table-sm mt-1">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col" width="70%">Categoria</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td class="text-center">{{ $categoria->nome }}</td>
                                            <td class="text-center">
                                                {{-- <a href="{{ route('categories.edit', $categoria->id) }}"
                                                    style="text-decoration: none;" class="btn btn-link">
                                                    <span style="color: #007BFF">✎</span></a> --}}


                                                <form name="frmDelete"
                                                    action="{{ route('categories.destroy', $categoria->id) }}"
                                                    method="post" onsubmit="return confirm('Deseja excluir categoria?')">
                                                    
                                                    <a href="{{ route('categories.edit', $categoria->id) }}"
                                                        style="text-decoration: none;" class="btn btn-link">
                                                        <span style="color: #007BFF">✎</span></a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-link" value="❌"
                                                        style="text-decoration: none; color: #ff0000;">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
