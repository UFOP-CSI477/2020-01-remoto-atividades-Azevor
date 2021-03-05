/* Preenchimento automático dos campos para teste (body onload()) */
/* Comentar esta função antes de enviar */
function preencherCamposTeste() {

    let competidor = document.getElementsByName("nome");
    let tempo = document.getElementsByName("tempo");

    for (let i = 0; i < competidor.length; i++) {
        competidor[i].value = `Competidor(a) ${i + 1}`;
    }

    for (let i = 0; i < tempo.length; i++) {
        tempo[i].value = (Math.random() * (46 - 51) + 46).toFixed(2);
    }
}

/**
* Clssificar competidores em ordem ascendente de tempo.
* 
*/
function classificarCompetidores() {
    const listaCompetidores = lerDados();

    // Testando saída da lista
    // for (index in listaCompetidores) {
    //     console.log(`Nome: ${listaCompetidores[index][1]} - Tempo = ${listaCompetidores[index][2]} segundos`);
    // }
    // Fim teste

    // TODO classificar em ordem de tempo (gerar lista)
    // TODO preencher tabela de saída com os competidores classificados
}

/**
* Ler dados do formulário de entrada.
* @return competidores{lista}
*/
function lerDados() {
    let competidores = [];
    let largada = document.getElementsByName("largada");
    let competidor = document.getElementsByName("nome");
    let tempo = document.getElementsByName("tempo");

    for (let i = 0; i < largada.length; i++) {
        if (!(competidor[i].value == "" || tempo[i].value == "")) {
            competidores.push([largada[i].value, competidor[i].value, tempo[i].value]);
        }
    }
    return competidores;
}