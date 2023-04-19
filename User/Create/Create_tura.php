<?php

$_SESSION['Ora_Incepere'] = date("H:i:s", time());
$_SESSION['Ora_Terminare'] = date("H:i:s", strtotime('+8 hours'));
echo 'YES';

$cerere_SQL = "INSERT INTO Ture (Data_incepere, Data_terminare)
                VALUES ('$dataincepere', '$dataterminare')";

$rezultat = sqlsrv_query($conn, $cerere_SQL);
if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}
    else {
    echo 'Am creeat o noua tura';
}
?>