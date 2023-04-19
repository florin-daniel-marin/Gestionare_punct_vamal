<?php
$cerere_SQL = $_SESSION['cerere'];
$rezultat = sqlsrv_query($conn, $cerere_SQL);
if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}

$output = '';
while ($row = sqlsrv_fetch_array($rezultat)) {
        $dn = Date_format($row['DataNasterii'], 'Y-m-d');
        $da = Date_format($row['Data_angajarii'], 'Y-m-d');
        $output .= '
        <tr>
        <td>' . $row["Ofiter_ID"] . '</td>
        <td>' . $row["Grad"] . '</td>
        <td>' . $row["Nume"] . '</td>
        <td>' . $row["Prenume"] . '</td>
        <td>' . $row["Sex"] . '</td>
        <td>' . $row["CNP"] . '</td>
        <td>' . $dn . '</td>
        <td>' . $row["Judet"] . '</td>
        <td>' . $row["Localitate/Sector"] . '</td>
        
        <td>' . $row["Sectie"] . '</td>
        <td>' . $da . '</td>
        <td>' . $row["Parola"] . '</td>
        </tr>
        ';
    }
$output .= '';
echo $output;
?>