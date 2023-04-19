<?php
$cerere_SQL = $_SESSION['cerere'];
$rezultat = sqlsrv_query($conn, $cerere_SQL);
if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}
echo "<br>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Grad</th>";
echo "<th>Nume</th>";
echo "<th>Prenume</th>";
echo "<th>Sex</th>";
echo "<th>CNP</th>";
echo "<th>Data_Nasterii</th>";
echo "<th>Judet</th>";
echo "<th>Localitate/Sector</th>";
echo "<th>Sectie</th>";
echo "<th>Data_Angajarii</th>";
echo "<th>Parola</th>";
echo "</tr>";

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