document.getElementById("nome").focus();

/**
 * Validar campos antes da submissão de dados.
 * 
 * @returns {boolean}
 */
function validar() {
    var nomeProduto = document.getElementById("nome");
    var quantidadeProduto = document.getElementById("quantidade");
    var unidadeMedida = document.getElementById("um");

    removeClass(nomeProduto.id, 'alerta-entrada');
    removeClass(quantidadeProduto.id, 'alerta-entrada');
    removeClass(unidadeMedida.id, 'alerta-entrada');

    if(campoVazio(nomeProduto) || campoVazio(quantidadeProduto) || !isNum(quantidadeProduto) || !itemSelecionado(unidadeMedida)) {
        return false;
    }

    return true;
}

function campoVazio(campo) {
    if(campo.value == "") {
        const campoLabel = document.getElementById(`${campo.id}Label`);
        exibirAlerta(`Informar \"${campoLabel.innerHTML}\"!`); // Alerta
        addClass(campo.id, 'alerta-entrada');
        campo.focus();
        return true;
    }
    return false;
}

function itemSelecionado(campoSelect) {
    if(campoSelect.selectedIndex == 0) {
        const campoLabel = document.getElementById(`${campoSelect.id}Label`);
        exibirAlerta(`Selecione uma \"${campoLabel.innerHTML}\"!`); // Alerta
        addClass(campoSelect.id, 'alerta-entrada');
        campoSelect.focus();
        return false;
    }
    return true;
}

/**
* Verificar se campo possui somente números.
*
* @param {input}
* @return {boolean}
*/
function isNum(entrada) {
	var bool = /^\d+(?:\d+)?$/.test(entrada.value);
    if(bool) {
        return true;
    }
    const campoLabel = document.getElementById(`${entrada.id}Label`);
    exibirAlerta(`Informar \"${campoLabel.innerHTML}\" (somente números)!`); // Alerta
    addClass(entrada.id, 'alerta-entrada');
    entrada.focus();
}

/**
* Exibe mensagem de alerta para o usuário.
* 
* @param {String}
*/
function exibirAlerta(msg) {
    document.getElementById("texto-alerta").innerHTML = `${msg}`;
    removeClass('campo-alerta', 'd-none');
}

/**
 * Adicionar classe em uma tag.
 * 
 * @param {id, classe}
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
 * @param {id, classe}
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