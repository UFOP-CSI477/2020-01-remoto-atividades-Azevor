<?php

    $dbPath = "./db/database.sqlite";
    
    $strConnection = "sqlite:" . $dbPath;
    $connection = new PDO($strConnection, "", "");