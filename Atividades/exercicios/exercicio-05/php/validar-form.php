<?php

    $tipoPessoa = $_POST['tipoPessoa'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $documento = $_POST['documento'];
    $nome = $_POST['nome'];
    $data = $_POST['dataNasc'];
    $tel = $_POST['telefone'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero-da-casa'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

    $tipoPessoaFormat = $tipoPessoa == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica';
    $dataMeta = $tipoPessoa == 'PF' ? 'Data de Nascimento' : 'Início das Atividades';
    $dataAno = substr($data, 0, 4);
    $dataMes = substr($data, 5, 2);
    $dataDia = substr($data, 8, 2);

    echo '<!DOCTYPE html>
    <html lang="br" dir="ltr">
    
    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../css/estilo.css">
        
        <title>Dados</title>
    
    </head>
    
    <body>
    
    <div class="container">

        <header>

            <h1>Confira seus Dados:</h1>

        </header>


        <div class="row justify-content-center">

            <div class="col-6">

                <main>

                    <div class="card">

                        <div class="card-body">

                        <h2>' . $tipoPessoaFormat . '</h2>
                        <p><strong>' . strtoupper($tipoDocumento) . ':</strong> ' . $documento . '</p>
                        <p><strong>Nome:</strong> ' . $nome . '</p>
                        <p><strong>' . $dataMeta . ':</strong> ' . $dataDia . '/' . $dataMes . '/' . $dataAno . '</p>
                        <p><strong>Telefone:</strong> ' . $tel . '</p>
                        <p><strong>CEP:</strong> ' . $cep . '</p>
                        <p><strong>Logradouro:</strong> ' . $logradouro . '</p>
                        <p><strong>N°:</strong> ' . $numero . '</p>
                        <p><strong>Comp.:</strong> ' . $complemento . '</p>
                        <p><strong>Bairro:</strong> ' . $bairro . '</p>
                        <p><strong>UF:</strong> ' . $estado . '</p>
                        <p><strong>Município:</strong> ' . $cidade . '</p>

                        </div>

                    </div>

                    <div class="btn btn-group">
                        <a href="../05-formulario.html" class="btn btn-secondary btn-sm">Voltar</a>
                    </div>
                    
                </main>
                
            </div>
            
        </div>
        
    </div>
    
    </body>
    
    </html>';