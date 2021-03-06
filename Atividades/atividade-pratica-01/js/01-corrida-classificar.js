// Número de linhas da tabela de saída (resultado)
var numeroDeLinhas = 0;

/**
* Clssificar competidores em ordem ascendente de tempo.
* 
*/
function classificarCompetidores() {
    limparTabelaSaida();
    var listaCompetidores = lerDados();
    const listaOrdenada = ordenarPorTempo(listaCompetidores);
    for (index in listaOrdenada) {
        novaLinhaTabelaSaida(listaOrdenada[index][0], listaOrdenada[index][1], listaOrdenada[index][2], listaOrdenada[index][3], listaOrdenada[index][4]);
    }
}

/**
* Ler dados do formulário de entrada.
* @return lista[[tempo, nome, largada]]
*/
function lerDados() {
    let competidores = [];
    let largada = document.getElementsByName("largada");
    let competidor = document.getElementsByName("nome");
    let tempo = document.getElementsByName("tempo");

    for (let i = 0; i < largada.length; i++) {
        if (!(competidor[i].value == "" || tempo[i].value == "")) {
            competidores.push([tempo[i].value, competidor[i].value, largada[i].innerText]);
        }
    }
    return competidores;
}

/**
* Classificar sublistas (competidores em ordem de tempo (s)).
* @return lista[[posicao, largada, nome, tempo, resultado]]
*/
function ordenarPorTempo(lista) {
    lista.sort();
    let listaOrdenada = [];
    let vencedor;
    const menorTempo = lista[0][0];

    for (index in lista) {
        if (lista[index][0] == menorTempo) {
            resultado = 'Vencedor(a)!';
        } else {
            resultado = '-';
        }

        listaOrdenada.push([(parseInt(index)+parseInt(1)), lista[index][2], lista[index][1], lista[index][0], resultado]);
    }
    return listaOrdenada;
}

/**
* Insere uma linha na tabela de saída de resultado.
*
*/
function novaLinhaTabelaSaida(posicao, largada, competidor, tempo, resultado) {
    let linha = `<tr><td>${posicao}</td><td>${largada}</td><td>${competidor}</td><td>${tempo}</td><td>${resultado}</td></tr>`;
    let tableRef = document.getElementById("tabela-resultado").getElementsByTagName("tbody")[0];
    let novaLinha = tableRef.insertRow(tableRef.rows.length);
    novaLinha.innerHTML = linha;
    numeroDeLinhas++;
}

function limparTabelaSaida() {
    document.getElementById("tabela-resultado").getElementsByTagName("tbody")[0].innerHTML = "";
}

///////////////////////////////////////////////////////////////////////////////
/** Preenchimento automático dos campos para teste (body onload())
* Comentar esta função antes de enviar
* 
*/
// function preencherCamposTeste() {

//     let competidor = document.getElementsByName("nome");
//     let tempo = document.getElementsByName("tempo");

//     for (let i = 0; i < competidor.length; i++) {
//         competidor[i].value = `Competidor(a) ${i + 1}`;
//     }

//     for (let i = 0; i < tempo.length; i++) {
//         tempo[i].value = (Math.random() * (46 - 51) + 46).toFixed(2);
//     }
// }