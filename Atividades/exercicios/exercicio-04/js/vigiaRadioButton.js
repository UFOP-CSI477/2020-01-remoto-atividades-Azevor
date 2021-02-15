document.getElementById("pessoaFisica").onclick = function() {
    var radios = document.getElementsByName("tipoPessoa");
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
        	// Alterar as opções do radio button
			insertOptions('PF');
        	// Alterar o formato do placeholder do campo documento
            document.getElementById("documento").placeholder = "Somente números";
            // Alterar o texto placeholder do campo nome
            document.getElementById("nome").placeholder = "Nome e Sobrenome";
            // Alterar o label data
            document.getElementById("dataNascLabel").innerHTML = "Data de nascimento";
        }
    }
};

document.getElementById("pessoaJuridica").onclick = function() {
    var radios = document.getElementsByName("tipoPessoa");
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
        	// Alterar as opções do radio button
        	insertOptions('PJ');
        	// Alterar o formato do placeholder do campo documento
            document.getElementById("documento").placeholder = "00.000.000/000-00";
            // Alterar o texto placeholder do campo nome
            document.getElementById("nome").placeholder = "Nome Fantasia";
            // Alterar o label data
            document.getElementById("dataNascLabel").innerHTML = "Início da atividade";
        }
    }
};

function insertOptions(tipoPessoa) {
	var opDocumentos = document.getElementById("tipoDocumento");
	opDocumentos.options.length=0;

	if(tipoPessoa == 'PF') {
		var opCpf = document.createElement('option');
		var opRg = document.createElement('option');
		var opCnh = document.createElement('option');
		opCpf.value = "cpf";
		opRg.value = "rg";
		opCnh.value = "cnh";
		opCpf.text = "CPF";
		opRg.text = "RG";
		opCnh.text = "CNH";		
		opDocumentos.appendChild(opCpf);
		opDocumentos.appendChild(opRg);
		opDocumentos.appendChild(opCnh);
		opDocumentos.removeAttribute('disabled');
	} else if(tipoPessoa == 'PJ') {
		var opCnpj = document.createElement('option');
		opCnpj.value = "cnpj";
		opCnpj.text = "CNPJ";
		opCnpj.setAttribute('selected', true);
		opDocumentos.appendChild(opCnpj);
		opDocumentos.setAttribute('disabled', true);
	}
}