<?php

class ConnexionToBdd {
    
    private $conn;

    private function initConnection(){
          
        $con = mysqli_connect("tp-epua:3308", "nicolath", "ntdspqgz"); 
        if (mysqli_connect_errno()) {
            $msg = "erreur ". mysqli_connect_error();
        } else {  
            $msg = "connecté au serveur " . mysqli_get_host_info($con);

            mysqli_select_db($con, "nicolath"); 

            mysqli_query($con, "SET NAMES UTF8");
        }
        $this->conn = $con;
    }

    protected function getDatabaseConnection(){

        if(!isset($this->conn)){
            $this->initConnection();
        }

        return $this->conn;
    }
}

?>