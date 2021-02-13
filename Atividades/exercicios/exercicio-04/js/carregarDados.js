function pessoaFisica() {
    var cpf;
    var nome;
    var datanasc;
    var telefone;
}

function pessoaJuridica() {
    var cnpj;
    var nomeFantasia;
    var dataInicioAtividade;
    var telefone;
}

function carregarDados() {
    var tipoPessoa = window.prompt('Informe:\n (PF): para Pessoa Física\n (PJ): para Pessoa Jurídica');

    if(tipoPessoa.toUpperCase() == 'PF') {

        var pessoa = new pessoaFisica();

        pessoa.cpf = window.prompt('Informe seu CPF:');
        pessoa.nome = window.prompt('Informe seu nome e sobrenome:');
        pessoa.datanasc = window.prompt('Informe sua data de nascimento (dd/mm/aaaa):');
        pessoa.telefone = window.prompt('Informe seu telefone');

        document.getElementById("tipoPessoa").innerHTML = 'Confira seus dados pessoais:';
        document.getElementById("documento").innerHTML = 'CPF: ' + pessoa.cpf;
        document.getElementById("nome").innerHTML = 'Nome: ' + pessoa.nome;
        document.getElementById("data").innerHTML = 'Data de nascimento: ' + pessoa.datanasc;
        document.getElementById("tel").innerHTML = 'Telefone: ' + pessoa.telefone;

    } else if(tipoPessoa.toUpperCase() == 'PJ') {

        var pessoa = new pessoaJuridica();

        pessoa.cnpj = window.prompt('Informe seu CNPJ:');
        pessoa.nomeFantasia = window.prompt('Informe o nome da empresa:');
        pessoa.dataInicioAtividade = window.prompt('Informe a data de constituição (dd/mm/aaaa):');
        pessoa.telefone = window.prompt('Informe o telefone da empresa');

        document.getElementById("tipoPessoa").innerHTML = 'Confira os dados da empresa:';
        document.getElementById("documento").innerHTML = 'CNPJ: ' + pessoa.cnpj;
        document.getElementById("nome").innerHTML = 'Nome: ' + pessoa.nomeFantasia;
        document.getElementById("data").innerHTML = 'Data de constituição: ' + pessoa.dataInicioAtividade;
        document.getElementById("tel").innerHTML = 'Telefone: ' + pessoa.telefone;

    } else {

        document.getElementById("tipoPessoa").innerHTML = 'Opção inválida!';

    }
}

carregarDados();