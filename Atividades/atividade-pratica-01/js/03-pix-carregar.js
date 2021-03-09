/**
* Carregar dados do formulário
* 
*/
function carregarFormulario() {
	const tipoOp = ['', 'Envio', 'Recebimento'];
	const formulario = document.getElementById("form-input");
	// const op = tipoOp.get(formulario.operacao[formulario.operacao.selectedIndex].value);
	const op = tipoOp[formulario.operacao.selectedIndex];

	if (op == 'Envio') {
		console.log('Envio success');
	} else if (op == 'Recebimento') {
		console.log('Recebimento success');
	}
	// const valor = formulario.valor.value;
	
	// const data = new Date();
	// const dia = ('00' + data.getUTCDate()).slice(-2);
	// const mes = ('00' + (data.getUTCMonth()+1)).slice(-2);
	// const ano = data.getUTCFullYear();

	// inserirLinha([op, valor, `${dia}/${mes}/${ano}`]);
}

/**
* Inserir linha no topo da tabela
*
* @param [col-1, col-2 .. col-n]
*/
function inserirLinha(conteudo) {
	var tbody = document.getElementById("output-content");
	var linha = document.createElement('tr');

	for (var i = 0; i<conteudo.length; i++) {
		var coluna = document.createElement('td');
		var texto = document.createTextNode(conteudo[i]);
		coluna.appendChild(texto);
		linha.appendChild(coluna);
	}
	tbody.insertBefore(linha, tbody.childNodes[0]);
}

/**
* Atualiza saldo de valor recebido e saldo total.
* 
*/
function fazRecebimento(valorOperacao) {
	var totalRecebido = document.getElementById("total-recebido");
	var saldoTotal = document.getElementById("saldo-total");

	totalRecebido.innerHTML = parseFloat(totalRecebido.value) + parseFloat(valorOperacao);
	saldoTotal.innerHTML = parseFloat(saldoTotal.value) + parseFloat(valorOperacao);
}

/**
* Verifica se existe saldo suficiente para operação de pagamento.
* Caso haja saldo, a operação é realizada e o saldo atualizado.
* Caso contrário, retorna falso e não faz nada.
* 
* @return boolean
*/
function fazPagamento(valorOperacao) {
	var saldoTotal = document.getElementById("saldo-total");
	const diferencaSaldo = parseFloat(saldoTotal.value) - parseFloat(valorOperacao);

	if (diferencaSaldo > 0.00) {
		var totalPago = document.getElementById("total-pago");
		totalPago.innerHTML = parseFloat(totalPago.value) + parseFloat(valorOperacao);
		saldoTotal.innerHTML = diferencaSaldo;
		return true;
	} else {
		return false;
	}
}