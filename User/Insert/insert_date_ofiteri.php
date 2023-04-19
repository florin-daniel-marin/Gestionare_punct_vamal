<?php
require_once('tabel_create.php');
//------------------------------------------------
$tara = 'EUE/ROU';

$grad = array(
    'Inspector Vamal Superior',
    'Inspector Vamal Principal',
    'Inspector Vamal Asistent',
    'Inspector Vamal Debutant',
    'Controlor Vamal Principal',
    'Controlor Vamal Asistent',
    'Controlor Vamal Deputant'
);
$result = sqlsrv_query($conn, "SELECT count(*) from Ofiteri;");
$row = sqlsrv_fetch_array($result);

$i = 0;
$result = sqlsrv_query($conn, "SELECT Ofiter_ID from Ofiteri;");
while ($rodw = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
   $keys[$i] = $rodw['Ofiter_ID'].' ';$i++;
}


for ($i = 0; $i < $row[0]; $i++) {

    //JUDET SI LOCALITATE
    $linii = file("date_pentru_tabel\Judet_Localitate.txt");
    $buffer = $linii[mt_rand(0, 314)];
    $judet = strtok($buffer, ',');
    $localitate = strtok('');

    //cnp
    $timestamp = rand(strtotime("01 Jan 1965"), strtotime("01 Jan 1980"));
    $nastere = date("Y-m-d", $timestamp);
    $a = date('dmy', $timestamp);
    $b = 1;
    $CNP = $b . $a . mt_rand(100000, 999999);

    $Parola = rand(1000, 9999);

    $cerere_SQL = "UPDATE Ofiteri SET Judet = '$judet', 
    [Localitate/Sector] = '$localitate', CNP = '$CNP',
    DataNasterii = '$nastere',Parola ='$Parola'
    WHERE Ofiter_ID = '$keys[$i]'";
    $rezultat = sqlsrv_query($conn, $cerere_SQL);
    if ($rezultat === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Am modificat valorile';
    }
}
?>