/**
* Carregar dados do formulário
* 
*/
function carregarFormulario() {
	var valorInput = parseFloat(document.getElementById("valor").value.replace(',', '.')).toFixed(2);
	
	if (valorInput > 0.00) {
		const formulario = document.getElementById("form-input");
		const tipoOp = ['', 'Envio', 'Recebimento'];
		const op = tipoOp[formulario.operacao.selectedIndex];

		if (op == 'Envio') {
			if (fazPagamento(valorInput)) {
				inserirLinha([op, `R$ ${valorInput.replace('.', ',')}`, dataAtual()]);
				resetarCampos();
				removeClass('dv-mdal', 'd-none');
			} else {
				exibirAlerta('Saldo insuficiente');
			}
		} else if (op == 'Recebimento') {
			fazRecebimento(valorInput);
			resetarCampos();
			inserirLinha([op, `R$ ${valorInput.replace('.', ',')}`, dataAtual()]);
		}
	}
}

/**
* Inserir linha no topo da tabela
*
* @param [col-1, col-2 .. col-n]
*/
function inserirLinha(conteudo) {
	var tbody = document.getElementById("output-content");
	var linha = document.createElement('tr');

	for (var i = 0; i < conteudo.length; i++) {
		var coluna = document.createElement('td');
		var texto = document.createTextNode(conteudo[i]);
		coluna.appendChild(texto);
		linha.appendChild(coluna);
	}
	tbody.insertBefore(linha, tbody.childNodes[0]);
}

/**
 * Recuperar data atual formato utc dd/mm/aaaa.
 * 
 * @returns String
 */
function dataAtual() {
	const data = new Date();
	const dia = ('00' + data.getUTCDate()).slice(-2);
	const mes = ('00' + (data.getUTCMonth() + 1)).slice(-2);
	const ano = data.getUTCFullYear();
	return `${dia}/${mes}/${ano}`;
}

/**
* Atualiza saldo de valor recebido e saldo total.
* 
* @param float
*/
function fazRecebimento(valorOperacao) {
	var totalRecebido = document.getElementById("total-recebido");
	var saldoTotal = document.getElementById("saldo-total");
	var somaRecebido = parseFloat(totalRecebido.innerHTML.replace(',', '.')) * 1.0 + valorOperacao * 1.0;
	var somaTotal = parseFloat(saldoTotal.innerHTML.replace(',', '.')) * 1.0 + valorOperacao * 1.0;

	totalRecebido.innerHTML = somaRecebido.toFixed(2).toString().replace('.', ',');
	saldoTotal.innerHTML = somaTotal.toFixed(2).toString().replace('.', ',');
}

/**
* Verifica se existe saldo suficiente para operação de pagamento.
* Caso haja saldo, a operação é realizada e o saldo atualizado.
* Caso contrário, retorna falso e não faz nada.
* 
* @param Float
* @return boolean
*/
function fazPagamento(valorOperacao) {
	var saldoTotal = document.getElementById("saldo-total");
	var diferencaSaldo = (parseFloat(saldoTotal.innerHTML.replace(',', '.')) * 1.0 - valorOperacao * 1.0).toFixed(2);

	if (diferencaSaldo < 0.00) {
		return false;
	} else {
		var totalPago = document.getElementById("total-pago");
		var somaPagos = (parseFloat(totalPago.innerHTML.replace(',', '.')) * 1.0 + valorOperacao * 1.0).toFixed(2);
		totalPago.innerHTML = somaPagos.toString().replace('.', ',');
		saldoTotal.innerHTML = diferencaSaldo.toString().replace('.', ',');
		return true;
	}
}

/**
 * Limpar todos os campos do formulário.
 */
function resetarCampos() {
	document.getElementById("tipo-operacao").selectedIndex = 0;
	document.getElementById("cod-banco").value = '';
	document.getElementById("banco").value = '';
    document.getElementById("valor").value = '';
    document.getElementById("tipo-chave").selectedIndex = 0;
	document.getElementById("chave").value = '';
}