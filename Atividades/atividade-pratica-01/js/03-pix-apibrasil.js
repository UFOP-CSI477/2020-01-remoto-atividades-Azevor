
function carregarBanco() {
    var codBanco = document.getElementById("cod-banco");
    var banco = document.getElementById("banco");

    if (codBanco.value == '') {
        banco.value = 'Banco não encontrado!';
    } else {
        banco.value = 'Banco encontrado';
    }
}