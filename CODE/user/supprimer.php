<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "DELETE")
    {

        $headers = getallheaders();

        //SI LES HEADERS SONT BIEN DEFINIS
        if(isset($headers["idUser"]))
        {
            
            try
            {
                
                $sql = "DELETE FROM Utilisateur WHERE id = ?;";
                $prepared = $conn->prepare($sql)->execute([$headers["idUser"]]);

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