/*
* Cadastro feito em openweathermap.org
* email: (hotmail)
* senha: 8dig+
* documentação: https://openweathermap.org/current - By city name
*/

function localizaCidade() {
    const cidades = document.getElementById("cidades");
    const cidade_text = cidades.options[cidades.selectedIndex].text;

    url = `https://api.openweathermap.org/data/2.5/weather?q=${cidade_text}&appid=8f3aa3394f359f262fd493054f4fc634`;
    fetchApi(url);
}

function fetchApi(url) {
    fetch(url)
        .then(response => response.json())
        .then(data => coletaPrevisao(data))
        .catch(error => {
            city.innerHTML = `Não foi possível acessar OpenWeather, verifique a sua conexão.`;
            temp.innerHTML = `-`;
            console.error(error.message)
        })
}

function coletaPrevisao(data) {
    let city = document.getElementById("cidade");
    let temp = document.getElementById("temperatura");

    const temperatura = parseFloat(data.main.temp);

    let tempInCelsius = (kelvinToCelsius(temperatura)).toFixed(1);
    city.innerHTML = `Hoje a temperatura em ${data.name} é:`;
    temp.innerHTML = tempInCelsius;
}

function kelvinToCelsius(kelvin) {
    return kelvin - 273;
}