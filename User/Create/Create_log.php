<?php
    //val sesiunea curenta
    date_default_timezone_set('Europe/Bucharest');
    $dataincepere = date("Y-m-d H:i:s", time());

    $ofiterindex = $_SESSION['Ofiter_ID'];
    $turaindex = $_SESSION['Tura_Index'];
    $NR_DESKTOP = $_SESSION['nrdesktop'];

    $_SESSION['Ora_Incepere'] = Date_format($rand['Data_incepere'], "H:i:s");
    $_SESSION['Ora_Terminare'] = Date_format($rand['Data_terminare'], "H:i:s");
    $_SESSION['Ora_Logare'] = $dataincepere;

    //add in Logari detaliile despre logarea curenta
    $cerere_SQL = "INSERT INTO Logari ([Tura_Index], [Ofiter_Index], Data_incepere, Nume_Desktop, In_Use)
                    VALUES ('$turaindex', '$ofiterindex', '$dataincepere','$NR_DESKTOP', 1)";
    $rezultat = sqlsrv_query($conn, $cerere_SQL);

    //ULTIMA logare DIN TABELUL DE logari
    $rezultat = sqlsrv_query($conn, "SELECT TOP 1 * FROM Logari ORDER BY Log_Index DESC");
    $rand = sqlsrv_fetch_array($rezultat, SQLSRV_FETCH_ASSOC);

    //salvez indexul logarii curente:
    $_SESSION['Log_Index'] = $rand['Log_Index'];

    if ($rezultat === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Am adaugat logarea curenta';
    }
?>