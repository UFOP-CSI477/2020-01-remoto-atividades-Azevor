@extends('molde')
@section('title', 'Categorias - cadastrar')
@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                {{-- CONTEÚDO DA PÁGINA --}}
                <div class="card-principal">
                    <div class="conteudo-principal">
                        <div class="text-center mt-3">
                            <h2>Adicionar categoria</h2>
                        </div>
                        <div class="mx-5">
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="row mx-5">
                                    <div class="col mx-5">
                                        <div class="form-group mx-5">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" name="nome" id="nome">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-end mt-3">
                                        <input type="submit" class="btn btn-primary" value="Gravar">
                                    </div>
                                    <div class="col mt-3">
                                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voltar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
