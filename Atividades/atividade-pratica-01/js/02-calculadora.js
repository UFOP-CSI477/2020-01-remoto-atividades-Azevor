function backSpace() {
    let oldValue = document.calc_visor.visor.value;

    if(oldValue.length == 1) {
        document.calc_visor.visor.value = "0";
    } else {
        document.calc_visor.visor.value = oldValue.substr(0, oldValue.length-1);
    }
}

function apagaVisor() {
    document.calc_visor.visor.value = "0";
}

function inverteSinal() {
    let valor = parseFloat(document.calc_visor.visor.value);
    document.calc_visor.visor.value = valor*(-1);
}

function inserirValor(valor) {
    let oldValue = document.calc_visor.visor.value;

    if(oldValue == "0") {
        document.calc_visor.visor.value = valor;
    } else {
        document.calc_visor.visor.value = oldValue + valor;
    }
}

function calculaRaiz() {
    let valor = parseFloat(document.calc_visor.visor.value);
    document.calc_visor.visor.value = Math.sqrt(valor);
}

function calculaPotencia() {
    let valor = parseFloat(document.calc_visor.visor.value);
    document.calc_visor.visor.value = Math.pow(valor, 2);
}

function calculaResultado() {
    let resultado = eval(document.calc_visor.visor.value);
    document.calc_visor.visor.value = resultado;
}