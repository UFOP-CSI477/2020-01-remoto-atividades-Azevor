<?php
    // Configuração do SqLite
    $dbPath = './db/database.sqlite';
    $dbUser = '';
    $dbPassword = '';

    $strConnection = 'sqlite:' . $dbPath;
    $dbConnection = new PDO($strConnection, $dbUser, $dbPassword);