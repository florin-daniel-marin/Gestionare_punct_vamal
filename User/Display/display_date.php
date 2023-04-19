<?php
session_start();
require_once('../../Session/session_connect.php');

$cerere_SQL = "SELECT * FROM Tranzistanti";
$rezultat = sqlsrv_query($conn, $cerere_SQL);

if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}

$output = '';
while ($row = sqlsrv_fetch_array($rezultat)) {
        $d = Date_format($row['Data'], 'Y-m-d H:i:s');
        $dn = Date_format($row['DataNasterii'], 'Y-m-d');
        $output .= '
        <tr>
        <td>' . $d . '</td>
        <td>' . $row["Nume"] . '</td>
        <td>' . $row["Prenume"] . '</td>
        <td>' . $row["Sex"] . '</td>
        <td>' . $dn . '</td>
        <td>' . $row["CNP"] . '</td>
        <td>' . $row["Nationalitate"] . '</td>
        <td>' . $row["Tara/Country"] . '</td>
        <td>' . $row["Judet/Region"] . '</td>
        <td>' . $row["Localitate/City"] . '</td>
        
        <td>' . $row["Locul Nasteri_Tara"] . '</td>
        <td>' . $row["Locul Nasteri_Judet"] . '</td>
        <td>' . $row["Locul Nasteri_Localitate"] . '</td>
        
        <td>' . $row["Antecedente"] . '</td>
        <td>' . $row["Restrictii intrare/iesire"] . '</td>
        <td>' . $row["Wanted by INTERPOL"] . '</td>
        <td>' . $row["Permisiune"] . '</td> 
        <td>' . $row["In/out"] . '</td> 
        </tr>
        ';
    }
$output .= '';
echo $output;

?>
