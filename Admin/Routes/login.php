
<?php
session_start();
require_once('../../Session/session_connect.php');

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//val sesiune:
date_default_timezone_set('Europe/Bucharest');
$dataincepere = date("Y-m-d H:i:s", time());
$dataterminare = date("Y-m-d H:i:s", strtotime('+8 hours'));

//---------------------------------------------------------------------------------------------------------------
//intr-o tura pot fi mai multe logari----------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------

//ULTIMA TURA DIN TABELUL DE TURE
    $rezultat = sqlsrv_query($conn, "SELECT TOP 1 * FROM Ture ORDER BY Tura_Index DESC");
    $rand = sqlsrv_fetch_array($rezultat, SQLSRV_FETCH_ASSOC);

    //tura nu exista >>> create_tura
    if ($dataincepere > Date_format($rand['Data_terminare'], 'Y-m-d H:i:s')) {
        require_once('../Create/Create_tura.php');
    }

//tura exista >>> create_log
    //ULTIMA TURA DIN TABELUL DE TURE
    $rezultat = sqlsrv_query($conn, "SELECT TOP 1 * FROM Ture ORDER BY Tura_Index DESC");
    $rand = sqlsrv_fetch_array($rezultat, SQLSRV_FETCH_ASSOC);

    //indexul turii curente:
    $turaindex = $rand['Tura_Index'];
    $_SESSION['Tura_Index'] = $turaindex;

    //create_log
    require_once('../Create/Create_log.php');

    header("Location: ../Main.php"); 
    exit();
?>