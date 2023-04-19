<?php
//gasire cadeti si punere in current session-----------------------------------------------------------------------------
if ($cadet1 != 'NULL' && $cadet2 != 'NULL') {
    //CADETII 1 SI 2 AU FOST INTRODUSI
    $numeprenume1 = validate($_POST['numeprenume1']);
    $numeprenume2 = validate($_POST['numeprenume2']);
    $_SESSION['numeprenume1'] = $numeprenume1;
    $_SESSION['numeprenume2'] = $numeprenume2;

    $parts1 = explode(" ", $numeprenume1);
    $prenume1 = array_pop($parts1);
    $nume1 = implode(" ", $parts1);

    $parts2 = explode(" ", $numeprenume2);
    $prenume2 = array_pop($parts2);
    $nume2 = implode(" ", $parts2);
    //cauta cadet 1
    $Ofiter_ID = sqlsrv_query($conn, "SELECT count(*) as count FROM Ofiteri WHERE Grad='$cadet1' and Nume='$nume1' and Prenume ='$prenume1'");
    $row = sqlsrv_fetch_array($Ofiter_ID, SQLSRV_FETCH_ASSOC);

    if ($row['count'] == 0) {
        $_SESSION['C1_ID'] = 'NULL';
        echo 'nu exista ofiter1'; //nu exista cadet
    } else {
        $r = sqlsrv_query($conn, "SELECT Ofiter_ID FROM Ofiteri WHERE Grad='$cadet1' and Nume='$nume1' and Prenume ='$prenume1'");
        $Ofiter_ID = sqlsrv_fetch_array($r);
        echo 'Am obtinuit id ofiter1' . $Ofiter_ID['Ofiter_ID'];
        $_SESSION['C1_ID'] = $Ofiter_ID['Ofiter_ID']; //exista!
    }

    //cauta cadet 2
    $Ofiter_ID = sqlsrv_query($conn, "SELECT count(*) as count  FROM Ofiteri WHERE Grad='$cadet2'and Nume='$nume2' and Prenume ='$prenume2'");
    $row = sqlsrv_fetch_array($Ofiter_ID, SQLSRV_FETCH_ASSOC);

    if ($row['count'] == 0) {
        $_SESSION['C2_ID'] = 'NULL';
        echo 'nu exista ofiter2'; //nu exista cadet
    } else {
        $r = sqlsrv_query($conn, "SELECT Ofiter_ID FROM OfiterI WHERE Grad='$cadet2' and Nume='$nume2' and Prenume ='$prenume2'");
        $Ofiter_ID = sqlsrv_fetch_array($r);
        echo 'Am obtinuit id ofiter2' . $Ofiter_ID['Ofiter_ID'];
        $_SESSION['C2_ID'] = $Ofiter_ID['Ofiter_ID']; //exista!
    }

} elseif ($cadet2 == 'NULL' && $cadet1 != 'NULL') {
    //DOAR CADETUL 1:
    $numeprenume1 = validate($_POST['numeprenume1']);
    $_SESSION['numeprenume1'] = $numeprenume1;
    $_SESSION['C2_ID'] = 'NULL';

    $parts1 = explode(" ", $numeprenume1);
    $prenume1 = array_pop($parts1);
    $nume1 = implode(" ", $parts1);

    $Ofiter_ID = sqlsrv_query($conn, "SELECT count(*) as count FROM Ofiteri WHERE Grad='$cadet1' and Nume='$nume1' and Prenume ='$prenume1'");
    $row = sqlsrv_fetch_array($Ofiter_ID, SQLSRV_FETCH_ASSOC);
    if ($row['count'] == 0) {
        $_SESSION['C1_ID'] = 'NULL';
        echo 'nu exista ofiter1';
    } else {
        $r = sqlsrv_query($conn, "SELECT Ofiter_ID FROM Ofiteri WHERE Grad='$cadet1' and Nume='$nume1' and Prenume ='$prenume1'");
        $Ofiter_ID = sqlsrv_fetch_array($r);
        echo 'Am obtinuit id ofiter1' . $Ofiter_ID['Ofiter_ID'];
        $_SESSION['C1_ID'] = $Ofiter_ID['Ofiter_ID'];
    }


} elseif ($cadet1 == 'NULL' && $cadet2 != 'NULL') {
    //DOAR CADETUL 2:
    $numeprenume2 = validate($_POST['numeprenume2']);
    $_SESSION['numeprenume2'] = $numeprenume2;
    $_SESSION['C1_ID'] = 'NULL';

    $parts2 = explode(" ", $numeprenume2);
    $prenume2 = array_pop($parts2);
    $nume2 = implode(" ", $parts2);

    $Ofiter_ID = sqlsrv_query($conn, "SELECT count(*) as count  FROM Ofiteri WHERE Grad='$cadet2'and Nume='$nume2' and Prenume ='$prenume2'");
    $row = sqlsrv_fetch_array($Ofiter_ID, SQLSRV_FETCH_ASSOC);
    if ($row['count'] == 0) {
        $_SESSION['C2_ID'] = 'NULL';
        echo 'nu exista ofiter2';
    } else {
        $r = sqlsrv_query($conn, "SELECT Ofiter_ID FROM Ofiteri WHERE Grad='$cadet2' and Nume='$nume2' and Prenume ='$prenume2'");
        $Ofiter_ID = sqlsrv_fetch_array($r);
        echo 'Am obtinuit id ofiter2' . $Ofiter_ID['Ofiter_ID'];
        $_SESSION['C2_ID'] = $Ofiter_ID['Ofiter_ID'];
    }
} elseif ($cadet1 == 'NULL' && $cadet2 == 'NULL'){
    //niciun cadet:
    $_SESSION['C1_ID'] = 'NULL';
    $_SESSION['C2_ID'] = 'NULL';
}
?>