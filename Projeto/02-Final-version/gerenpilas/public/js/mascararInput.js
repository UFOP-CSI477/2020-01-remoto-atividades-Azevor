/**
 * Limitar a entrada de caracteres no campo.
 * Aceita números e vírgula como separação decimal.
 * @param {input} entrada 
 */
function mascaraInput(entrada) {
    var valorString = entrada.value;
    var evento = window.event; // captura evento digitado no teclado (estrutura tipo json)
    var Caractere = evento.CaractereCode || evento.which; // captura o código do caractere digitado
    Caractere = String.fromCharCode(Caractere); // converte o código na letra referente ao caractere
    var temVirgula = valorString.indexOf(",") > -1; // Verificar se o campo já possui vírgula
    var verifica = false;

    if (temVirgula) {
        verifica = /^[0-9]+$/; // regex referente a limitação do caractere a somente número
        let decimal = (valorString.substring(valorString.indexOf(",")+1, valorString.length)).length;
        if (decimal >= 2) {
            evento.returnValue = false;
        }
    } else {
        verifica = /^[0-9,]+$/; // regex referente a limitação do caractere a somente número e vírgula
    }

    if (!verifica.test(Caractere)) {
        evento.returnValue = false;

        if (evento.preventDefault) {
            evento.preventDefault();
        }
    }
}