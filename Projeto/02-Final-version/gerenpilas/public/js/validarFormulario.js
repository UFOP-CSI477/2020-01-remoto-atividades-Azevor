/**
 * Enviar requisição GET para a página de transações.
 */
function setarLocal() {
    var mes = document.getElementById('mes').value;
    var ano = document.getElementById('ano').value;
    location.replace('?mes=' + mes + '&ano=' + ano);
}

/**
 * Verificar se campo está vazio.
 * @returns boolean
 */
function campoVazio() {
    var campo = document.getElementById('nome');

    if (campo.value == "") {
        removeClass('campo-invalido', 'd-none');
        addClass('nome', 'border-danger');
        campo.focus();
        return true;
    }
    return false;
}

function validarTransacao() {
    var descricao = document.getElementById('descricao');

    if (descricao.value == "") {
        removeClass('campo-descricao-invalido', 'd-none');
        addClass('descricao', 'border');
        addClass('descricao', 'border-danger');
        descricao.focus();
        return false;
    }

    var data = document.getElementById('data');

    if (data.value == "") {
        removeClass('campo-data-invalido', 'd-none');
        addClass('data', 'border');
        addClass('data', 'border-danger');
        data.focus();
        return false;
    }

    var valor = document.getElementById('valor');

    if (valor.value == "") {
        removeClass('campo-valor-invalido', 'd-none');
        addClass('valor', 'border');
        addClass('valor', 'border-danger');
        valor.focus();
        return false;
    }

    
    var categoria = document.getElementById('category_id');
    
    if (categoria.value == "") {
        removeClass('campo-categoria-invalido', 'd-none');
        addClass('category_id', 'border');
        addClass('category_id', 'border-danger');
        categoria.focus();
        return false;
    }
    
    var tipoSelecionado = "";
    var tipo = document.getElementsByName('tipo');
    if (tipo[0].checked) {
        tipoSelecionado = tipo[0].value;
    }
    if (tipo[1].checked) {
        tipoSelecionado = tipo[1].value;
    }

    if (tipoSelecionado == "") {
        removeClass('campo-tipo-transacao-invalido', 'd-none');
        addClass('contorno-tipo-transacao', 'border-danger');
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