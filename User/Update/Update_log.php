<?php
//valorii pt sesiune
    $logindex = $_SESSION['Log_Index'];
    $c1_id = $_SESSION['C1_ID'];
    $c2_id = $_SESSION['C2_ID'];

    $cerere_SQL = "UPDATE Logari SET [Controlor#1_Index]=$c1_id, [Controlor#2_Index]=$c2_id
                    WHERE Log_Index = $logindex";

    $rezultat = sqlsrv_query($conn, $cerere_SQL);    
    if ($rezultat === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Am UPDATAT logarea curenta';
    }
?>