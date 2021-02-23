// Validar formulário do exercício 04-validacao-form.html

function validar() {
	var formulario = document.formularioDados;

	if(!verificaCampo(formulario.documento,
		document.getElementById('labelDocumento').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.nome,
		document.getElementById('labelNome').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.dataNasc,
		document.getElementById('labelDataNasc').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.telefone,
		document.getElementById('labelTelefone').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.cep,
		document.getElementById('labelCep').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.logradouro,
		document.getElementById('labelLogradouro').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.bairro,
		document.getElementById('labelBairro').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.estado,
		document.getElementById('labelEstado').innerText
		)) {
		return;
	}
	if(!verificaCampo(formulario.cidade,
		document.getElementById('labelCidade').innerText
		)) {
		return;
	}
}

function verificaCampo(campo, titulo) {
	if(campo.value == "") {
		document.getElementById('campo-alerta').innerHTML = titulo;
		document.getElementById('tag-alerta').classList.remove('d-none');
		campo.focus();
		return false;
	}
	return true;
}

function removerTagAlerta() {
	let isAlert = document.getElementById('tag-alerta').classList.contains('d-none');
	if(!isAlert) {
		document.getElementById('tag-alerta').classList.add('d-none');
	}
}