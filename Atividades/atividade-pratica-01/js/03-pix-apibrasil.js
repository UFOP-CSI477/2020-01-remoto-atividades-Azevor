
function carregarBanco() {
    var codBanco = document.getElementById("cod-banco");

    if (codBanco.value == '') {
        banco.value = '-';
    } else {
        getNomeBanco(codBanco.value);
    }
}

function getNomeBanco(codBanco) {
    url = `https://brasilapi.com.br/api/banks/v1/${codBanco}`;

    fetch(url)
        .then(response => responseJson(response))
        .then(data => insereNomeBanco(data))
        .catch(error => tratarErro(error));
}

function insereNomeBanco(data) {
    document.getElementById("banco").value = data.name;
}

function responseJson(response) {
    if (!response.ok) throw new Error(`Falha na conexão: ${response.status}`);
    return response.json();
}

function tratarErro(error) {
    document.getElementById("banco").value = 'Erro!'
    console.error(`Status: ${error.message}`);
}