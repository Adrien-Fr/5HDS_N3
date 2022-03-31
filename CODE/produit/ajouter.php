<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {

        $headers = getallheaders();

        //SI LES HEADERS SONT BIEN DEFINIS
        if(isset($headers["Produit"]))
        {

            $content = json_decode($headers["Produit"]);

            try
            {

                $sql = "INSERT INTO Produit VALUES (NULL, ?, ?, ?, ?, ?, ?, NOW(), NOW());";
                $prepared = $conn->prepare($sql)->execute([$content->nom, $content->description, randomToken(10), $content->prix, $content->stock, $content->reference]);
                
                createRessource();
                echo json_encode(Array("idProduit" => $conn->lastInsertId()));

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