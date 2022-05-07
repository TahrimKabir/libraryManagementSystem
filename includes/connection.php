<?php
    function connect(){
        $dbHost= "localhost";
        $user= "root";
        $pass= "";
        $dbname="iit_automation";

        $conn= new mysqli($dbHost, $user, $pass, $dbname);
        //echo "connected";

        return $conn;
    }


?>
