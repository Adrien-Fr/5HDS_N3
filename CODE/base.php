<?php
    //COMMUN A TOUTE LES API
    header("Content-Type:application/json");

    //FONCTION TOKEN
    function randomToken($car)
    {

        $string = "";

        $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstwxyz0123456789";

        srand((double) microtime() * 1000000);

        for($i = 0; $i < $car; $i++)
        {

            $string .= $chaine[rand() % strlen($chaine)];

        }

        return $string;

    }

    //FONCTION ERREUR PAGE 404
    function deadPage()
    {

        http_response_code(404);
        die();
        
    }

    //FONCTION ERREUR PAS LE CONTENU
    function errorContent()
    {

        http_response_code(400);
        die();

    }

    //FONCTION RESSOURCE CREE
    function createRessource()
    {

        http_response_code(201);

    }

    //FONCTION RESSOURCE MODIFIEE
    function modifyRessource()
    {

        http_response_code(200);
        echo("Ressource modifiée !");

    }

    //FONCTION RESSOURCE SUPPRIME
    function deleteRessource()
    {

        http_response_code(200);
        echo("Ressource supprimée !");

    }

    //FONCTION POUR ERRUR INTERNE
    function internalError()
    {

        http_response_code(500);
        echo("Erreur interne");

    }

?>