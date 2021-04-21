/**
 * Verificar se campo está vazio.
 * @param {campo, id_msg, id_border}
 * @returns boolean
 */
 function campoVazio(campo, id_msg, id_border) {
    if (campo.value == "") {
        removeClass(id_msg, 'd-none');
        addClass(id_border, 'border-danger');
        campo.focus();
        return true;
    }
    return false;
}

/**
 * Validar cadastro e edição de equipamento.
 * @returns boolean
 */
function cadastrarEquipamento() {
    var campoNome = document.getElementById('nome');

    if (campoVazio(campoNome, 'campo-nome-invalido', 'nome')) {
        return false;
    }
    return true;
}

/**
 * Validar cadastro e edição de agendamento de manutenção.
 * @returns boolean
 */
 function validarManutencao() {
    var campoTipo = document.getElementById('tipo');
    var campoDataLimite = document.getElementById('datalimite');
    var campoEquipamento = document.getElementById('equipamento_id');
    var campoDescricao = document.getElementById('descricao');

    if (campoVazio(campoTipo, 'campo-tipo-invalido', 'tipo')) {
        return false;
    }
    if (campoVazio(campoDataLimite, 'campo-datalimite-invalido', 'datalimite')) {
        return false;
    }
    if (campoVazio(campoEquipamento, 'campo-equipamento_id-invalido', 'equipamento_id')) {
        return false;
    }
    if (campoVazio(campoDescricao, 'campo-descricao-invalido', 'descricao')) {
        return false;
    }
    return true;
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