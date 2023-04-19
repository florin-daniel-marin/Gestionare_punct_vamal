<?php
session_start();
require_once('../Session/session_connect.php');

$cerere_SQL = "SELECT * 
FROM Ofiteri 
WHERE Ofiter_ID IN (SELECT Ofiter_Index
FROM Logari
WHERE In_use = '1') ";

$rezultat = sqlsrv_query($conn, $cerere_SQL);

if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}
$i = 0;

echo "<br>";
echo "<table border='1'>";
while ($rand = sqlsrv_fetch_array($rezultat, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>";
    foreach ($rand as $value) {
        if (($value instanceof DateTime) === false){
            echo "<td>" . $value . "</td>";
        } else {
            echo "<td>" . Date_format($value, 'd-m-Y') . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
?>