
function validarDados() {
    addClass("campo-alerta", "d-none");

    const tipoOp = document.getElementById("tipo-operacao");
    const valorOp = document.getElementById("valor");
    const tipoChave = document.getElementById("tipo-chave");
    const chave = document.getElementById("chave");
    const codBanco = document.getElementById("cod-banco");

    if (validarOpcao(tipoOp)) {
        exibirAlerta('Tipo Operação inválida!');
        return;
    }

    if (codBanco.value == '') {
        exibirAlerta('Informar Cód. Banco!');
        codBanco.focus();
        return;
    }

    if (!isNum(valorOp)) {
        exibirAlerta('Valor inválido!');
        return;
    }

    if (validarOpcao(tipoChave)) {
        exibirAlerta('Tipo Chave inválido!');
        return;
    }

    if (chave.value == '') {
        exibirAlerta('Campo Chave vazio!');
        chave.focus();
        return;
    }

    carregarFormulario();
}

/**
 * Verifica se o tipo de operação foi selecionado.
 * 
 * @param {Element HTML} campo 
 * @returns boolean
 */
function validarOpcao(campo) {
    if (campo.selectedIndex == 0) {
        removeClass("campo-alerta", "d-none");
        campo.focus();
        return true;
    } else {
        return false;
    }
}

/**
 * Verifica se campo possui valor da operação válida.
 * 
 * @param {Element HTML} campo
 * @returns 
 */
function isNum(campo) {
    var entrada = campo.value.replace(',', '.');
    if (/^\d+(?:\.\d+)?$/.test(entrada)) {
        return true;
    } else {
        removeClass("campo-alerta", "d-none");
        campo.focus();
        return false;
    }
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

    if (indice === -1) {
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

    if (indice > -1) {
        classes.splice(indice, 1);
    }
    campo.className = classes.join(' ');
}