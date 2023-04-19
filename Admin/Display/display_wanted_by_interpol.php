<?php
require_once('tabel_create.php'); //Selectare date din baza de date

$cerere_SQL = "SELECT * 
FROM Tranzistanti JOIN Verificari
ON Verificari.[Wanted by INTERPOL] = 'DA'";

$rezultat = sqlsrv_query($conn, $cerere_SQL);

if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}

require_once('display_table.php');
?>