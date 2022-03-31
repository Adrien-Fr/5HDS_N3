<?php

    $server = "localhost";
    $username = "admin";
    $password = "";

    try
    {

        $conn = new PDO("mysql:host=$server;dbname=api_5HDS_gestion_stock", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {

        echo("Erreur de connexion " . $e->getMessage());

    }

?>