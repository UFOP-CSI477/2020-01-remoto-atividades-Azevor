/*
* Cadastro feito em openweathermap.org
* email: (hotmail)
* senha: 8dig+
* documentação: https://openweathermap.org/current - By city name
*/

function previsao(cidade) {

    url = `https://api.openweathermap.org/data/2.5/weather?q=${cidade}&appid=8f3aa3394f359f262fd493054f4fc634`;

    fetch(url)
        .then(response => response.json())
        .then(data => coletaPrevisao(data))
        .catch(error => {
            console.log(`Não foi possível acessar, verifique a sua conexão: `);
            console.error(error.message)
        })
}

function coletaPrevisao(data) {
    const temperatura = parseFloat(data.main.temp);

    let tempInCelsius = (kelvinToCelsius(temperatura)).toFixed(1);
    document.getElementById("infoTemperatura").innerHTML = tempInCelsius;
}

function kelvinToCelsius(kelvin) {
    return kelvin - 273;
}