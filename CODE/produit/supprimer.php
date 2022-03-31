<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "DELETE")
    {

        $headers = getallheaders();

        //SI LES HEADERS SONT BIEN DEFINIS
        if(isset($headers["idProduit"]))
        {

            try
            {

                $sql = "DELETE FROM Produit WHERE id = ?;";
                $prepared = $conn->prepare($sql)->execute([$headers["idProduit"]]);

                deleteRessource();

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