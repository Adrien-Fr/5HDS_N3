<?php

    require_once("../base.php");
    require_once("../BDD.php");

    //SI REQUETE EST BIEN EN POST
    if($_SERVER['REQUEST_METHOD'] == "GET")
    {

        try
        {

            $prepared = $conn->query("SELECT * FROM Utilisateur");

            $result = array();
    
            while($row = $prepared->fetch())
            {
    
                $result[] = array(
                    "nom" =>$row["nom"],
                    "prenom" => $row["prenom"],
                    "token" => $row["token"],
                    "role" => $row["roleUser"],
                    "created_at" => $row["created_at"],
                    "update_at" => $row["update_at"]);
    
            }
    
            echo json_encode($result);

        }
        catch(Exception $ex)
        {

            internalError();

        }

        $conn = null;

    }
    else
    {
    
        deadPage();

    }

?>