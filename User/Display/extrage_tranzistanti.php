
<?php
session_start();

require_once('tabel_create.php');
$index=  $_SESSION['Tura_Index'];
$desktop = $_SESSION['nrdesktop'];
$output = '';

$cerere_SQL = "SELECT * FROM Tranzistanti
FULL OUTER JOIN Verificari
ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID 
where Verificari.Tura_Index ='$index'";

$rezultat = sqlsrv_query($conn, $cerere_SQL);
if( $rezultat === false) {
    die(print_r(sqlsrv_errors(), true));
}
$tranID = '';
while ($row = sqlsrv_fetch_array($rezultat)) {
    if ($row['TranzistantID'] !== $tranID) {
        $tranID = $row['TranzistantID'];
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
}
$output .= '</table>';
echo $output;

?>