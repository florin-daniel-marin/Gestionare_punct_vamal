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
echo "<th>Nume</th>";
echo "<th>Prenume</th>";
echo "<th>Sex</th>";
echo "<th>Data_Nasterii</th>";
echo "<th>CNP</th>";
echo "<th>Nationalitate</th>";
echo "<th>Tara/Country</th>";
echo "<th>Judet/Regiune</th>";
echo "<th>Localitate/City</th>";
echo "<th>Locul Nasterii: Tara</th>";
echo "<th>Locul Nasterii: Judet</th>";
echo "<th>Locul Nasterii: Localitate</th>";
echo "<th>Antecedente</th>";
echo "<th>Restrictii Intrare</th>";
echo "<th>Cautat de Interpol</th>";
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