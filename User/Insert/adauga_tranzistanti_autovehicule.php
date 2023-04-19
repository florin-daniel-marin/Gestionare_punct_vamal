
<?php
session_start();

require_once('tabel_create.php');
$_SESSION['Tura_Index'] = $_SESSION['Tura_Index'];

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["nume"][0])) {
    $nume = validate($_POST["nume"][0]);
    $permisiune = validate($_POST["Permisiune"][0]);
    $nume = validate($_POST["nume"][0]);
    //echo '.'.$nume.'.';
    $prenume = validate($_POST["prenume"][0]);
    $sex = validate($_POST["sex"][0]);

    $n = validate($_POST["nastere"][0]);
    $time = strtotime($n);
    $nastere = date("Y-m-d", $time);

    $CNP = validate($_POST["cnp"][0]);
    $nat = validate($_POST["nat"][0]);
    if ($CNP == '') {
        $CNP = 'NULL';
    }
    $tara = validate($_POST["tara"][0]);
    if ($tara == 'Romania' || $tara == 'România' || $tara == 'RO') {
        $tara = 'EUE/ROU';
    }

    $judet = validate($_POST["jud"][0]);
    $localitate = validate($_POST["jud"][0]);

    $ln_tara = validate($_POST["lntara"][0]);
    if ($ln_tara == 'Romania' || $ln_tara == 'România' || $ln_tara == 'RO') {
        $ln_tara = 'EUE/ROU';
    }

    $ln_judet = validate($_POST["lnjud"][0]);
    $ln_localitate = validate($_POST["lnloc"][0]);

    $antecedente = validate($_POST["ant"][0]);
    $restrictii = validate($_POST["rest"][0]);
    $interpol = validate($_POST["wanted"][0]);

    $inout = validate($_POST["Inout"][0]);

    echo '.' . $permisiune . '.';
    $cerere_SQL = "INSERT INTO Tranzistanti (Nume, Prenume, Sex, 
        DataNasterii, CNP, Nationalitate, [Tara/Country], [Judet/Region], 
        [Localitate/City], [Locul Nasteri_Tara], [Locul Nasteri_Judet],
        [Locul Nasteri_Localitate], Antecedente, [Restrictii intrare/iesire],
        [Wanted by INTERPOL]) VALUES ('$nume', '$prenume', 
        '$sex', '$nastere', $CNP, '$nat', '$tara', '$judet', 
        '$localitate', '$ln_tara', '$ln_judet', '$ln_localitate',
        '$antecedente', '$restrictii', '$interpol')";

    $rezultat = sqlsrv_query($conn, $cerere_SQL);
    if ($rezultat === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Am adaugat valorile in baza de date';
    }

    $cerere_SQL = "SELECT [TranzistantID] FROM Tranzistanti WHERE Nume='$nume' and Prenume='$prenume' and [Localitate/City] = '$localitate' and (CNP=$CNP or CNP is NULL)";
    $tranzistant_id = sqlsrv_query($conn, $cerere_SQL);
    echo $tranzistant_id;
    if ($tranzistant_id === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $row = sqlsrv_fetch_array($tranzistant_id);
        echo 'Am selectat tranzistant id2';
    }
    echo $row[0];

    $datacurenta = date("Y-m-d H:i:s", time());

    $index = $_SESSION['Tura_Index'];
    echo $row[0];
    echo $index;
    $cerere_SQL = "INSERT INTO Verificari (Tranzistant_ID, Tura_Index,
        [Data], Permisiune, [In/out]) VALUES ('$row[0]', '$index',
        '$datacurenta', '$permisiune', '$inout')";
    $rezultat = sqlsrv_query($conn, $cerere_SQL);
    if ($rezultat === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Am adaugat valorile in baza de date Verificari';
    }

}


?>

 