/**
 * Calcular dados estatísticos conforme proposta do exercício.
 */
function tratarDadosTabela() {
    var tbody = document.getElementById("content-input");
    var trs = tbody.getElementsByTagName('tr');
    var totalAbastecido = 0.0;
    var totalRodado = 0.0;
    var qteVeiculos = tbody.childElementCount;

    for (let i = 0; i < trs.length; i++) {
        var td = trs[i].getElementsByTagName('td');

        totalAbastecido += parseFloat(td[1].innerHTML.replace(',', '.'));
        totalRodado += parseFloat(td[2].innerHTML.replace(',', '.'));
    }

    var relatorio = [];

    relatorio.push(`Quantidade total de combustível utilizada: ${totalAbastecido.toFixed(2).toString().replace('.', ',')}`);
    relatorio.push(`Quantidade total de quilômetros rodados: ${totalRodado.toFixed(2).toString().replace('.', ',')}`);
    relatorio.push(`Média de consumo de combustível: ${(totalAbastecido / qteVeiculos).toFixed(2).toString().replace('.', ',')}`);
    relatorio.push(`Média de quilômetros rodados: ${(totalRodado / qteVeiculos).toFixed(2).toString().replace('.', ',')}`);
    relatorio.push(`Média de desempenho em quilômetros por litro (km/l): ${(totalRodado / totalAbastecido).toFixed(2).toString().replace('.', ',')}`);

    incluirEstatisticasConsumo(relatorio);
}