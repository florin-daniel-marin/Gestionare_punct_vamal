<?php
session_start();
require_once('../../Session/session_connect.php');

$selected_cerere = $_GET['category'];
$tip = $_GET['tip'];
$gui = $_GET['gui'];
$cerere_SQL = array();

//tranzistanti: all
$cerere_SQL[0] = "SELECT * FROM Tranzistanti";

//tranzistanti si verificare: intrati in tara
$cerere_SQL[1] = "SELECT * FROM Tranzistanti JOIN Verificari ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID and Verificari.[In/out] = 'Intrare'";

//tranzistanti si verificare: iesiti din tara
$cerere_SQL[2] = "SELECT * FROM Tranzistanti JOIN Verificari ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID and Verificari.[In/out] = 'Iesire'";

//tranzistanti si verificare: au primit permisiunea
$cerere_SQL[3] = "SELECT * FROM Tranzistanti JOIN Verificari ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID and Verificari.Permisiune = 'DA' ";

//tranzistanti si verificare: nu au primit permisiunea
$cerere_SQL[4] = "SELECT * FROM Tranzistanti JOIN Verificari ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID and Verificari.Permisiune = 'NU' ";

//tranzistanti si verificare: sunt urmariti de interpol
$cerere_SQL[5] = "SELECT * FROM Tranzistanti WHERE [Wanted by INTERPOL] = 'DA'";

//angajati: all
$cerere_SQL[6] = "SELECT * FROM Ofiteri";

//angajati (ofiteri) activi (online)
$cerere_SQL[7] = "SELECT * FROM Ofiteri JOIN Logari ON Ofiteri.Ofiter_ID = Logari.Ofiter_Index and Logari.In_use = '1'";

//tranzistanti si verificare: by day
//$cerere_SQL[8] = "SELECT * FROM Tranzistanti WHERE TranzistantID IN (SELECT Tranzistant_ID FROM Verificari WHERE Data = '$data') ";

//tranzistanti si verificare: by tura
//$cerere_SQL[9] = "SELECT * FROM Tranzistanti WHERE TranzistantID IN (SELECT Tranzistant_ID FROM Verificari WHERE Tura = '$tura') ";

//tranzistanti: all
$cerere_SQL[11] = "SELECT * FROM Tranzistanti JOIN Verificari ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID";
$_SESSION['cerere'] = $cerere_SQL[$selected_cerere];

//Routes:
if ($gui)
    if ($tip == 1) require_once('../Show/show_entry_verificari.php');
        else require_once('../Show/show_entry_ofiteri.php');
else
    if ($tip == 1) require_once('../Display/display_table_TRANZISTANTI.php');
            else if ($tip == 5) require_once('../Display/display_table_OFITERI.php');
            else require_once('../Display/display_table_LOGARI.php');

?>