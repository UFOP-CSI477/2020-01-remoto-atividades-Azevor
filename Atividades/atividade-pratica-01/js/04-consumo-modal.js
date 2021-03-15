/**
 * Abrir modal com formulário de entrada de dados.
 */
function incluirRegistroConsumo() {
    gerarModalHeader('Cadastrar');
    gerarModalBody();
    gerarModalFooter();

    removeClass('my-modal', 'd-none');
    document.getElementById("veiculo").focus();
}

function incluirEstatisticasConsumo(relatorio) {
    // cabeçalho -----------------------------------------------------
    gerarModalHeader('Relatório');

    // corpo ---------------------------------------------------------
    var campoBody = document.getElementById("mbody");
    campoBody.innerHTML = '';

    //div's
    var divCorpoTexto = document.createElement('div');
    divCorpoTexto.classList.add('text-justify');

    // p's
    var pQteGas = document.createElement('p');
    pQteGas.innerHTML = relatorio[0];
    var pQteKm = document.createElement('p');
    pQteKm.innerHTML = relatorio[1];
    var pMediaGas = document.createElement('p');
    pMediaGas.innerHTML = relatorio[2];
    var pMediaKm = document.createElement('p');
    pMediaKm.innerHTML = relatorio[3];
    var pMediaKmL = document.createElement('p');
    pMediaKmL.innerHTML = relatorio[4];

    divCorpoTexto.appendChild(pQteGas);
    divCorpoTexto.appendChild(pQteKm);
    divCorpoTexto.appendChild(pMediaGas);
    divCorpoTexto.appendChild(pMediaKm);
    divCorpoTexto.appendChild(pMediaKmL);

    campoBody.appendChild(divCorpoTexto);

    // rodapé --------------------------------------------------------
    campoFooter = document.getElementById("mfooter");
    campoFooter.innerHTML = '';

    // div's para rodapé
    var divFooter = document.createElement('div');
    divFooter.classList.add('text-center');

    // button
    var botaoFechar = document.createElement('button');
    botaoFechar.setAttribute('type', 'button');
    botaoFechar.classList.add('fecharRelatorio');
    botaoFechar.classList.add('btn');
    botaoFechar.classList.add('btn-primary');
    botaoFechar.classList.add('btn-sm');
    botaoFechar.setAttribute('onclick', 'fecharModal()');
    botaoFechar.innerHTML = 'Fechar';

    divFooter.appendChild(botaoFechar);
    campoFooter.appendChild(divFooter);
    
    removeClass('my-modal', 'd-none');
}

/**
 * Gerar título para a janela modal.
 * 
 * @param {String} pTitulo 
 */
function gerarModalHeader(pTitulo) {
    campoHeader = document.getElementById("mheader");
    campoHeader.innerHTML = '';

    var titulo = document.createElement('h3');
    var texto = document.createTextNode(pTitulo);

    titulo.appendChild(texto);
    campoHeader.appendChild(titulo);
}

/**
 * Gerar campos do formulário da janela modal.
 */
function gerarModalBody() {
    var campoBody = document.getElementById("mbody");
    campoBody.innerHTML = '';

    // Campo alerta
    var divCampoAlerta = document.createElement('div');
    divCampoAlerta.setAttribute('id', 'campo-alerta');
    divCampoAlerta.classList.add('alert');
    divCampoAlerta.classList.add('alert-danger');
    divCampoAlerta.classList.add('d-none');
    divCampoAlerta.classList.add('text-center');
    var spamTextoAlerta = document.createElement('spam');
    spamTextoAlerta.setAttribute('id', 'texto-alerta');
    divCampoAlerta.appendChild(spamTextoAlerta);

    // div's
    var divFormGroupVeiculo = document.createElement('div');
    divFormGroupVeiculo.classList.add('form-group');

    var divFormGroupAbastecimento = document.createElement('div');
    divFormGroupAbastecimento.classList.add('form-group');

    var divFormGroupRodado = document.createElement('div');
    divFormGroupRodado.classList.add('form-group');

    // label's
    var campoLabelVeiculo = document.createElement('label');
    campoLabelVeiculo.classList.add('form-label');
    campoLabelVeiculo.setAttribute('for', 'veiculo');
    campoLabelVeiculo.innerHTML = 'Veículo (placa)';

    var campoLabelAbastecimento = document.createElement('label');
    campoLabelAbastecimento.classList.add('form-label');
    campoLabelAbastecimento.setAttribute('for', 'abastecimento');
    campoLabelAbastecimento.innerHTML = 'Quantidade abastecida (Litros)';

    var campoLabelRodado = document.createElement('label');
    campoLabelRodado.classList.add('form-label');
    campoLabelRodado.setAttribute('for', 'rodado');
    campoLabelRodado.innerHTML = 'Total rodado (Km)';

    // input's
    var campoInputVeiculo = document.createElement('input');
    campoInputVeiculo.setAttribute('type', 'text');
    campoInputVeiculo.setAttribute('name', 'veiculo');
    campoInputVeiculo.setAttribute('id', 'veiculo');
    campoInputVeiculo.setAttribute('maxlength', '8');
    campoInputVeiculo.setAttribute('onblur', 'mascaraInput(this)');
    campoInputVeiculo.classList.add('form-control');
    campoInputVeiculo.setAttribute('placeholder', 'XXX-0000');

    var campoInputAbastecimento = document.createElement('input');
    campoInputAbastecimento.setAttribute('type', 'text');
    campoInputAbastecimento.setAttribute('name', 'abastecimento');
    campoInputAbastecimento.setAttribute('id', 'abastecimento');
    campoInputAbastecimento.setAttribute('onkeypress', 'mascaraInput(this)');
    campoInputAbastecimento.classList.add('form-control');
    campoInputAbastecimento.setAttribute('placeholder', '0,0');

    var campoInputRodado = document.createElement('input');
    campoInputRodado.setAttribute('type', 'text');
    campoInputRodado.setAttribute('name', 'rodado');
    campoInputRodado.setAttribute('id', 'rodado');
    campoInputRodado.setAttribute('onkeypress', 'mascaraInput(this)');
    campoInputRodado.classList.add('form-control');
    campoInputRodado.setAttribute('placeholder', '0,0');

    divFormGroupVeiculo.appendChild(campoLabelVeiculo);
    divFormGroupVeiculo.appendChild(campoInputVeiculo);
    divFormGroupAbastecimento.appendChild(campoLabelAbastecimento);
    divFormGroupAbastecimento.appendChild(campoInputAbastecimento);
    divFormGroupRodado.appendChild(campoLabelRodado);
    divFormGroupRodado.appendChild(campoInputRodado);

    var formulario = document.createElement('form');
    formulario.appendChild(divFormGroupVeiculo);
    formulario.appendChild(divFormGroupAbastecimento);
    formulario.appendChild(divFormGroupRodado);

    campoBody.appendChild(divCampoAlerta);
    campoBody.appendChild(formulario);
}

/**
 * Gerar botões para o rodapé da modal.
 */
function gerarModalFooter() {
    campoFooter = document.getElementById("mfooter");
    campoFooter.innerHTML = '';

    // div's
    var divFooter = document.createElement('div');
    divFooter.classList.add('text-center');

    var divButtonConfirm = document.createElement('div');
    divButtonConfirm.classList.add('btn');
    divButtonConfirm.classList.add('btn-group');

    var divButtonLimpar = document.createElement('div');
    divButtonLimpar.classList.add('btn');
    divButtonLimpar.classList.add('btn-group');

    // buttons
    var botaoConfirma = document.createElement('button');
    botaoConfirma.setAttribute('type', 'button');
    botaoConfirma.classList.add('btn');
    botaoConfirma.classList.add('btn-primary');
    botaoConfirma.setAttribute('onclick', 'validarRegistro()');
    botaoConfirma.innerHTML = 'Confirma';

    var botaoResetar = document.createElement('button');
    botaoResetar.setAttribute('type', 'button');
    botaoResetar.classList.add('btn');
    botaoResetar.classList.add('btn-danger');
    botaoResetar.setAttribute('onclick', 'limparDados()');
    botaoResetar.innerHTML = 'Limpar';

    divButtonConfirm.appendChild(botaoConfirma);
    divButtonLimpar.appendChild(botaoResetar);

    divFooter.appendChild(divButtonConfirm);
    divFooter.appendChild(divButtonLimpar);

    campoFooter.appendChild(divFooter);
}

/**
 * Limpar todos os campos do formulário.
 */
function limparDados() {
    document.getElementById("veiculo").value = '';
    document.getElementById("abastecimento").value = '';
    document.getElementById("rodado").value = '';
    addClass('campo-alerta', 'd-none');
}

/**
 * Ao fechar modal, limpa o hipertexto da página principal.
 */
function fecharModal() {
    addClass('my-modal', 'd-none');
    document.getElementById("mheader").innerHTML = '';
    document.getElementById("mbody").innerHTML = '';
    document.getElementById("mfooter").innerHTML = '';
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