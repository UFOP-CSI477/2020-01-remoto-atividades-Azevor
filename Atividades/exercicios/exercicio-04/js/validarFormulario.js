// Validar formulário do exercício 04-validacao-form.html

function validar() {

	var formulario = document.formularioDados;

	if(!isDocumentoValido(formulario.documento)) {
		return;
	}
	if(campoVazio(formulario.nome,
		document.getElementById('labelNome').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.dataNasc,
		document.getElementById('labelDataNasc').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.telefone,
		document.getElementById('labelTelefone').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.cep,
		document.getElementById('labelCep').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.logradouro,
		document.getElementById('labelLogradouro').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.bairro,
		document.getElementById('labelBairro').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.estado,
		document.getElementById('labelEstado').innerText
		)) {
		return;
	}
	if(campoVazio(formulario.cidade,
		document.getElementById('labelCidade').innerText
		)) {
		return;
	}
	return carregarDados();
}

function campoVazio(campo, tipo) {
	if(campo.value == "") {
		setTextoAlerta('Preencher campo ' + tipo);
		incluirTagAlerta();
		campo.focus();
		return true;
	}
	return false;
}

function isDocumentoValido(campo) {
	if(campoVazio(campo,
		document.getElementById('labelDocumento').innerText
		)) {
		return false;
	}
	if(!isNumeric(campo.value)) {
		setTextoAlerta('Informar somente numeros no campo ' + 
			document.getElementById('tipoDocumento')[document.getElementById('tipoDocumento').selectedIndex].value);
		incluirTagAlerta();
		campo.focus();
		return false;
	}
	return true;
}

function incluirTagAlerta() {
	document.getElementById('tag-alerta').classList.remove('d-none');
}

function removerTagAlerta() {
	if(!document.getElementById('tag-alerta').classList.contains('d-none')) {
		document.getElementById('tag-alerta').classList.add('d-none');
	}
}

function setTextoAlerta(texto) {
	document.getElementById('campo-alerta').innerHTML = texto;
}

function isNumeric(entrada) {
	return /^[0-9]+$/.test(entrada); // /* aceitar números quebrados: */ /^\d+(?:\.\d+)?$/.test(entrada);
}