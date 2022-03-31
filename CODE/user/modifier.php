<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "PUT")
    {

        $headers = getallheaders();

        //SI LES HEADERS SONT BIEN DEFINIS
        if(isset($headers["Utilisateur"]))
        {
            
            try
            {

                $content = json_decode($headers["Utilisateur"]);
    
                $sql = "UPDATE Utilisateur SET nom = ?, prenom = ?, roleUser = ?, update_at = NOW() WHERE id = ?;";
                $prepared = $conn->prepare($sql)->execute([$content->nom, $content->prenom, $content->role, $content->id]);
                
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