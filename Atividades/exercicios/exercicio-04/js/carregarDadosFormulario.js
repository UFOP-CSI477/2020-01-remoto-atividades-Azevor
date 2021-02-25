function pessoaFisica() {
    var doc;
    var nome;
    var datanasc;
    var telefone;
    var cep;
    var logradouro;
    var numero;
    var complemento;
    var bairro;
    var estado;
    var cidade;
}

function pessoaJuridica() {
    var cnpj;
    var nomeFantasia;
    var dataInicioAtividade;
    var telefone;
    var cep;
    var logradouro;
    var numero;
    var complemento;
    var bairro;
    var estado;
    var cidade;
}

function pessoaSelected() {
    var radios = document.getElementsByName("tipoPessoa");

    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return radios[i].value;
        }
    }
}

function preencherCampos(pessoa, tipoPessoa) {
    document.getElementById("outputTipoPessoa").innerHTML = "<h2>Verificar dados:</h2>";
    document.getElementById("outputTelefone").innerHTML = `<strong>Tel.:</strong> ${pessoa.telefone}`;
    document.getElementById("outputEndereco").innerHTML = `<strong>Endereço completo:</strong><b>
    Rua ${pessoa.logradouro}, ${pessoa.numero} Bairro ${pessoa.bairro}<br>
    ${pessoa.cidade} / ${pessoa.estado} - CEP: ${pessoa.cep}`;

    if(tipoPessoa == 'PF') {
        document.getElementById("outputDocumento").innerHTML = `<strong>Documento:</strong> ${pessoa.doc}`;
        document.getElementById("outputNome").innerHTML = `<strong>Nome:</strong> ${pessoa.nome}`;
        document.getElementById("outputData").innerHTML = `<strong>Data de nascimento:</strong> ${pessoa.datanasc}`;
    } else if(tipoPessoa == 'PJ') {
        document.getElementById("outputDocumento").innerHTML = `<strong>CNPJ:</strong> ${pessoa.cnpj}`;
        document.getElementById("outputNome").innerHTML = `<strong>Nome da empresa:</strong> ${pessoa.nomeFantasia}`;
        document.getElementById("outputData").innerHTML = `<strong>Início das atividades:</strong> ${pessoa.dataInicioAtividade}`;
    }
}

function carregarDados() {
    var pessoa;
    var tipoPessoa = pessoaSelected();

    if(tipoPessoa == 'PF') {
        pessoa = new pessoaFisica();
        pessoa.doc = document.getElementById("documento").value;
        pessoa.nome = document.getElementById("nome").value;
        pessoa.datanasc = document.getElementById("dataNasc").value;
    } else if(tipoPessoa == 'PJ') {
        var pessoa = new pessoaJuridica();
        pessoa.cnpj = document.getElementById("documento").value;
        pessoa.nomeFantasia = document.getElementById("nome").value;
        pessoa.dataInicioAtividade = document.getElementById("dataNasc").value;
        // pessoa.telefone = document.getElementById("telefone").value;
    }
    pessoa.telefone = document.getElementById("telefone").value;
    pessoa.logradouro = document.getElementById("logradouro").value;
    pessoa.cep = document.getElementById("cep").value;
    pessoa.logradouro = document.getElementById("logradouro").value;
    pessoa.numero = document.getElementById("numero-da-casa").value;
    pessoa.complemento = document.getElementById("complemento").value;
    pessoa.bairro = document.getElementById("bairro").value;
    pessoa.estado = document.getElementById("estado").value;
    pessoa.cidade = document.getElementById("cidade").value;

    preencherCampos(pessoa, tipoPessoa);
}