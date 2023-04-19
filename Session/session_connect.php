<?php
    //conectare la baza de date
    $serverName = "DESKTOP-TOR6HBK\SQLEXPRESS";
    $connectionOptions = [
        "Database"=>"Gestionare_VAMA",
        "UID"=>"",
        "PWD"=>""
        ];
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
        die( print_r(sqlsrv_errors(), true));
?>