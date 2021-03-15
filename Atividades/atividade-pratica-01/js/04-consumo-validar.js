/**
 * Formatar ou restringir a entrada de caracteres.
 * 
 * @param {Campo HTML} entrada 
 */
function mascaraInput(entrada) {
    if (entrada.name == 'veiculo') {
        var placa = document.getElementById("veiculo");
        if (placa.value != '') {
            var charAt = placa.value.indexOf("-");
            if (charAt == -1) {
                if (placa.value.length == 7) {
                    var letras = placa.value.slice(0, 3);
                    var numeros = placa.value.slice(3, 7);
                    placa.value = `${letras}-${numeros}`;
                }
            }
        }
    } else {
        var evento = window.event; // captura evento digitado no teclado (estrutura tipo json)
        var Caractere = evento.CaractereCode || evento.which; // captura o código do caractere digitado
        Caractere = String.fromCharCode(Caractere); // converte o código na letra referente ao caractere
        var temVirgula = entrada.value.indexOf(",") > -1; // Verificar se o campo já possui vírgula
        var verifica = false;

        if (temVirgula) {
            verifica = /^[0-9]+$/; // regex referente a limitação do caractere a somente número
        } else {
            verifica = /^[0-9,]+$/; // regex referente a limitação do caractere a somente número e vírgula
        }

        if (!verifica.test(Caractere)) {
            evento.returnValue = false;

            if (evento.preventDefault) {
                evento.preventDefault();
            }
        }
    }
}

/**
 * Executa função para validação de dados do formulário.
 */
 function validarRegistro() {
    var veiculo = document.getElementById("veiculo");
    var abastecimento = document.getElementById("abastecimento");
    var rodado = document.getElementById("rodado");

    if (veiculo.value == '' || abastecimento.value == '' || rodado.value == '') {
        exibirAlerta('Preencher todos os campos!');
        return;
    } else if (veiculo.value.indexOf("-") == -1 && veiculo.value.length != 7) {
        exibirAlerta('Formato de placa inválido!');
        veiculo.focus();
    } else {
        abastecimentoFormat = formatarValor(abastecimento.value);
        rodadoFormat = formatarValor(rodado.value);
        var consumo = calcularConsumo(abastecimentoFormat, rodadoFormat);
        inserirLinha([veiculo.value.toUpperCase(), abastecimentoFormat, rodadoFormat, consumo]);
        fecharModal();
    }
}

/**
* Inserir linha no topo da tabela
*
* @param [col-1, col-2 .. col-n]
*/
function inserirLinha(conteudo) {
    var tbody = document.getElementById("content-input");
    var linha = document.createElement('tr');

    for (var i = 0; i < conteudo.length; i++) {
        var coluna = document.createElement('td');
        var texto = document.createTextNode(conteudo[i]);
        coluna.appendChild(texto);
        linha.appendChild(coluna);
    }
    tbody.insertBefore(linha, tbody.childNodes[0]);
}

function formatarValor(entrada) {
    var entrada = entrada.replace(',', '.');
    var entradaFloat = parseFloat(entrada);
    var entradaFloat = entradaFloat.toFixed(2);
    entrada = entradaFloat.toString().replace('.', ',');
    return entrada;
}

/**
 * 
 * @param {String} Combustivel
 * @param {String} Quilometros
 * @returns {String} Desempenho
 */
function calcularConsumo(pGas, pKm) {
    var gas = parseFloat(pGas.replace(',', '.'));
    var km = parseFloat(pKm.replace(',', '.'));
    return (km/gas).toFixed(2).toString().replace('.', ',');
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