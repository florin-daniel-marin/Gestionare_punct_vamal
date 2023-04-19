<?php
session_start();
require_once('../Session/session_connect.php');


$cerere_SQL = "SELECT * FROM Tranzistanti
JOIN Verificari
ON Verificari.Tranzistant_ID = Tranzistanti.TranzistantID ";
$_SESSION['cerere'] = $cerere_SQL;
require_once('show_entry_verificari.php');
?>