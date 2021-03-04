


/* Preenchimento automático dos campos para teste (body onload()) */
/* Comentar esta função antes de enviar */
function preencherCamposTeste() {
	let campos = document.getElementById("frmCompetidores");
	let competidor = 1;

	for(let i = 1; i<campos.length-2; i+=3) {
		campos[i].value = `Competidor(a) ${competidor}`;
		competidor++;
	}

	for(let i = 2; i<campos.length-2; i+=3) {
		campos[i].value = (Math.random()*(46-51)+46).toFixed(2);
	}
}

/**
* Clssificar competidores em ordem ascendente de tempo.
* 
*/
function classificarCompetidores() {
	// TODO ler dados do formulário
	// TODO classificar em ordem de tempo (gerar lista)
	// TODO preencher tabela de saída com os competidores classificados
}

/**
* Ler dados do formulário de entrada.
* @return lista de competidores
*/
function lerDados(campos) {
	for(let i = 1; i<campos.length-2; i+=3) {
		campos[i].value = `Competidor(a) ${competidor}`;
		competidor++;
	}

	for(let i = 2; i<campos.length-2; i+=3) {
		campos[i].value = (Math.random()*(46-51)+46).toFixed(2);
	}
}