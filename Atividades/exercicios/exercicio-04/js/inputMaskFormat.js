function tiraHifen(inputItem) {
    const textoAtual = inputItem.value;
    const textoAjustado = limparCaracteres(textoAtual);

    inputItem.value = textoAjustado;
}

function limparCaracteres(texto) {
    return texto.replace(/[^\d]+/g, '');
}

function mascaraDeDocumento(documento) {
	let textoAjustado = limparCaracteres(documento.value);
	const documentoSelecionado = document.getElementById('tipoDocumento')[
        document.getElementById('tipoDocumento').selectedIndex
    ].value;

	if(documentoSelecionado == "cpf") {
		const parte0 = textoAjustado.slice(0, 3);
		const parte1 = textoAjustado.slice(3, 6);
        const parte2 = textoAjustado.slice(6, 9);
        const parte3 = textoAjustado.slice(9, 11);
        textoAjustado = `${parte0}.${parte1}.${parte2}-${parte3}`;
    }
    if(documentoSelecionado == "cnpj") {
		const parte0 = textoAjustado.slice(0, 2);
		const parte1 = textoAjustado.slice(2, 5);
        const parte2 = textoAjustado.slice(5, 8);
        const parte3 = textoAjustado.slice(8, 12);
        const parte4 = textoAjustado.slice(12, 14);
        textoAjustado = `${parte0}.${parte1}.${parte2}/${parte3}-${parte4}`;
    }

    documento.value = textoAjustado;
}

function mascaraDeTelefone(telefone) {
    let textoAjustado = limparCaracteres(telefone.value);
    const isCelular = textoAjustado.length === 11;

        if(isCelular) {
        	const parte0 = textoAjustado.slice(0, 2);
        	const parte1 = textoAjustado.slice(2, 7);
        	const parte2 = textoAjustado.slice(7, 11);
        	textoAjustado = `(${parte0})${parte1}-${parte2}`;
        } else {
        	const parte0 = textoAjustado.slice(0, 2);
        	const parte1 = textoAjustado.slice(2, 6);
        	const parte2 = textoAjustado.slice(6, 10);
        	textoAjustado = `(${parte0})${parte1}-${parte2}`;
        }

    telefone.value = textoAjustado;
}

function mascaraDeCep(cep) {
    let textoAjustado = limparCaracteres(cep.value);

    const parte0 = textoAjustado.slice(0, 2);
    const parte1 = textoAjustado.slice(2, 5);
    const parte2 = textoAjustado.slice(5, 8);
    textoAjustado = `${parte0}.${parte1}-${parte2}`;

    cep.value = textoAjustado;
}