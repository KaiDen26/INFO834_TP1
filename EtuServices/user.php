<?php

require_once("ConnexionToBdd.php");

class user extends ConnexionToBdd {

    function verifyUser($email, $password){

            $db=$this->getDatabaseConnection();
            //vérifie si le mdp et le login en entrée sont présent dans la base 
            $db = $this->getDatabaseConnection();
            $sql= "SELECT email, mot_de_passe FROM utilisateur WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($db, $sql);
                
            $row = $result->fetch_array();
            //Liste des variables nécessaires pour l'affichage

            if(isset($row['mot_de_passe'])){
                    
                if ($row['mot_de_passe'] == $password) {
                        $this->createRedisSession($email);
                }
            }
    }

    function createRedisSession($email){

        $value = 'python3 client_redis.py'.' '.$email;
        $path = escapeshellcmd($value);
        $output = shell_exec($path);
        echo "$output";

    }
}

?>