@extends('principal')
@section('conteudo')
    <div>
        <div class="text-center">
            <h2 class="display-6">Cadastrar Estado</h2>
        </div>
        <div>
            <form action="{{ route('estados.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="sigla" class="form-label">Sigla</label>
                            <input type="text" class="form-control" name="sigla" id="sigla">
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