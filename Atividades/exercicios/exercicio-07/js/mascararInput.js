/**
 * Formatar ou restringir a entrada de caracteres.
 * 
 * @param {Campo HTML} entrada 
 */
function formatar(entrada) {
    var evento = window.event; // captura evento digitado no teclado (estrutura tipo json)
    var Caractere = evento.CaractereCode || evento.which; // captura o código do caractere digitado
    Caractere = String.fromCharCode(Caractere); // converte o código na letra referente ao caractere
    var verifica = false;

    verifica = /^[0-9]+$/; // regex referente a limitação do caractere a somente número

    if (!verifica.test(Caractere)) {
        evento.returnValue = false;

        if (evento.preventDefault) {
            evento.preventDefault();
        }
    }
}