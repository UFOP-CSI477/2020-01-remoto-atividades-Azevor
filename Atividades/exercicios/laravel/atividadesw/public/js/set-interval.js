let clock = document.getElementById("dataHora");
let datestamp = new Date();
let dias = new Array(
    "domingo", "segunda-feira", "terça-feira", "quarta-feira", "quinta-feira", "sexta-feira", "sábado"
);
let meses = new Array(
    "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"
);
let diaSemana = dias[datestamp.getUTCDay()];
let dia = datestamp.getUTCDate();
let mes = meses[datestamp.getUTCMonth()];
let ano = datestamp.getUTCFullYear();

setInterval(function () {
    clock.innerHTML = (
    	diaSemana + ", " + dia + " de " + mes + " de " + ano + "<br>" + (new Date).toLocaleString().substr(11, 8));
}, 1000);