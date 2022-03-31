<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $headers = getallheaders();

        //SI LES HEADERS SONT BIEN DEFINIS
        if(isset($headers["Utilisateur"]))
        {

            try
            {
                
                $content = json_decode($headers["Utilisateur"]);
    
                $sql = "INSERT INTO Utilisateur VALUES (NULL, ?, ?, ?, ?, NOW(), NOW());";
                $prepared = $conn->prepare($sql)->execute([$content->nom, $content->prenom, randomToken(10), $content->role]);
    
                createRessource();
                echo json_encode(Array("idUser" => $conn->lastInsertId()));

            }
            catch(Exception $ex)
            {

                internalError();

            }

            $conn = null;

        }
        else
        {

            errorContent();

        }

    }
    else
    {
    
        deadPage();

    }

?>