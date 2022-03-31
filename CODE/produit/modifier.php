<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "PUT")
    {

        $headers = getallheaders();

        //SI LES HEADERS SONT BIEN DEFINIS
        if(isset($headers["Produit"]))
        {
            try
            {

                $content = json_decode($headers["Produit"]);
    
                $sql = "UPDATE Produit SET nom = ?, description = ?, prix = ?, stock = ?, reference = ?, update_at = NOW() WHERE id = ?;";
                $prepared = $conn->prepare($sql)->execute([$content->nom, $content->description, $content->prix, $content->stock, $content->reference, $content->id]);

                modifyRessource();

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