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
    document.getElementById("outputEndereco").innerHTML = `<strong>Endereço completo:</strong><br>
    ${pessoa.logradouro}, ${pessoa.numero} Bairro ${pessoa.bairro}<br>
    ${pessoa.cidade} / ${pessoa.estado} - CEP: ${pessoa.cep}<br>`;
    document.getElementById("outputPrevisaoTempo").innerHTML = `Temperatura em ${pessoa.cidade}: <span id="infoTemperatura"></span> °C`;
    previsao(pessoa.cidade);

    if(tipoPessoa == 'PF') {
        document.getElementById("outputDocumento").innerHTML = `<strong>Documento:</strong> ${pessoa.doc}`;
        document.getElementById("outputNome").innerHTML = `<strong>Nome:</strong> ${pessoa.nome}`;
        document.getElementById("outputData").innerHTML = `<strong>Data de nascimento:</strong> ${dataFormat(pessoa.datanasc)}`;
    } else if(tipoPessoa == 'PJ') {
        document.getElementById("outputDocumento").innerHTML = `<strong>CNPJ:</strong> ${pessoa.cnpj}`;
        document.getElementById("outputNome").innerHTML = `<strong>Nome da empresa:</strong> ${pessoa.nomeFantasia}`;
        document.getElementById("outputData").innerHTML = `<strong>Início das atividades:</strong> ${dataFormat(pessoa.dataInicioAtividade)}`;
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
    }
    pessoa.telefone = document.getElementById("telefone").value;
    pessoa.logradouro = document.getElementById("logradouro").value;
    pessoa.cep = document.getElementById("cep").value;
    pessoa.logradouro = document.getElementById("logradouro").value;
    pessoa.numero = document.getElementById("numero-da-casa").value;
    pessoa.complemento = document.getElementById("complemento").value;
    pessoa.bairro = document.getElementById("bairro").value;
    estadoSelected = document.getElementById("estado");
    pessoa.estado = estadoSelected[estadoSelected.selectedIndex].text.slice(0, 2);
    cidadeSelected = document.getElementById("cidade");
    pessoa.cidade = cidadeSelected[cidadeSelected.selectedIndex].text;

    preencherCampos(pessoa, tipoPessoa);
}

function dataFormat(data) {
    ano = data.slice(0, 4);
    mes = data.slice(5, 7);
    dia = data.slice(8, 10);
    return `${dia}/${mes}/${ano}`;
}