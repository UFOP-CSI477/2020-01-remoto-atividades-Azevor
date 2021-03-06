/**
* Habilitar a próxima linha do campo de entrada após o preenchimento do campo atual.
* 
*/
function habilitarProximaLinha(obj) {
	let id = (obj.id).substring((obj.id).indexOf("[")+1, (obj.id).indexOf("]"));
	if(!(document.getElementById(`campo-nome[${id}]`).value == "")) {
		document.getElementById(`campo-nome[${parseInt(id)+1}]`).disabled = 0;
		document.getElementById(`campo-tempo[${parseInt(id)+1}]`).disabled = 0;
	} else {
		let nomes = document.getElementsByName("nome");
		let tempos = document.getElementsByName("tempo");

		for (let i = parseInt(id)+1; i<nomes.length; i++) {
			let campoTemp = document.getElementById(`campo-nome[${i}]`);
			campoTemp.value = "";
			campoTemp.disabled = 1;
			campoTemp = document.getElementById(`campo-tempo[${i}]`);
			campoTemp.value = "";
			campoTemp.disabled = 1;
		}
	}
}

/**
* Validar campos antes de classificar competidores.
* 
*/
function validarCampos() {
	var listaCompetidores = lerDados();
	addClass('alerta','d-none');

	if (!minimoCompetidores(listaCompetidores, 3)) {
		return;
	}

	for (index in listaCompetidores) {
		if(!isNum(listaCompetidores[index][0])) {
			exibirAlerta(listaCompetidores[index][0], 'não é \"tempo\" válido!');
			document.getElementsByName("tempo")[index].focus();
			return;
		}
	}
	classificarCompetidores();
}

/**
* Verificar se campo possui somente números.
* 
*/
function isNum(entrada) {
	return /^\d+(?:\.\d+)?$/.test(entrada);
}

/**
* Usuário deve informar pelo menos 3 competidores.
* 
* @return true se número de competidores for maior ou igual a 3.
*/
function minimoCompetidores(listaCompetidores, qte) {
	addClass('alerta', 'd-none');
	if (listaCompetidores.length < 3) {
		exibirAlerta('', 'Mínimo três competidores');
		return false;
	}
	return true;
}

/**
* Exibe mensagem de alerta para o usuário.
* 
*/
function exibirAlerta(campo, msg) {
	document.getElementById("texto-alerta").innerHTML = `${campo} ${msg}`;
	removeClass('alerta', 'd-none');
}

/**
 * Adicionar classe em uma tag.
 * 
 * @param (id, classe)
 */
function addClass(id, classe) {
	var campo = document.getElementById(id);
	var classes = campo.className.split(' ');
	var indice = classes.indexOf(classe);

	if(indice === -1) {
		classes.push(classe);
		campo.className = classes.join(' ');
	}
}

/**
 * Remover classe de uma tag.
 * 
 * @param (id, classe)
 */
function removeClass(id, classe) {
	var campo = document.getElementById(id);
	var classes = campo.className.split(' ');
	var indice = classes.indexOf(classe);

	if(indice > -1) {
		classes.splice(indice, 1);
	}
	campo.className = classes.join(' ');
}