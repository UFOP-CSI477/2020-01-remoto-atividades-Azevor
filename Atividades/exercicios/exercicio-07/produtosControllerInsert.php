<?php
    mb_internal_encoding('UTF-8');

    $nome = $_GET["nome"];
    $quantidade = $_GET["quantidade"];
    $undMedida = $_GET["um"];

    if(empty($nome) || empty($quantidade) || !is_int(intval($quantidade)) || $undMedida == "") {
        echo "<div><a href=\"produtosViewInsert.php\">Início</a>";
        die('<p>Campos em branco ou inválidos!</p>');
    } else {
        try {
            require "config.php";

            $connection->beginTransaction();
            $stmt = $connection->prepare("INSERT INTO produtos (nome, quantidade, um) VALUES (:nome, :quantidade, :undMedida)");

            $stmt->bindParam(':nome', mb_strtoupper($nome));
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam('undMedida', ucfirst($undMedida));

            $stmt->execute();

            $connection->commit();

            header('Location: index.php');
            exit();
        } catch(Exception $e) {
            $connection->rollback();
            die("<p>Erro ao gravar dados: </p>" . $e->getMessage());
        }
    }