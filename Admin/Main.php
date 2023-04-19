<?php
    session_start();
    require_once('../Session/session_connect.php');
?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<link  rel="stylesheet" href="../Resources/Css/style1.css" type="text/css">
        <title>Menu_admin</title>
        <script type="text/javascript" src="jquery-3.6.3.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
	</head>

	<body>
        <div class="home">
            <header>
                <div class="steag"><img src="../Resources/Media/header-right_blue.jpg" height="100"></div>
                <div class="h-box1">
                </div><div class="stema1"><img src="../Resources/Media/sigla_guv_coroana_albastru.png" width=100% height="100"></div>
                <div class="h-box">
                <br/>Vama Issacea - Admin Desktop
                </div>
                <br/>
            </header>
            <nav>
                <ul>
                    <li class="Mainpage"><a href="Main.php">Main page</a></li>
                    <li class="Verificari"><a href="Verificari.php">Verificari</a></li>
                    <li class="Angajati"><a href="Angajati.php">Angajati</a></li>

                    <li class="Logout"><a href="../Session/log_out.php">Log Out</a></li>
                </ul>
            </nav>
    <main>
        <h4>
    Tabele vizualizare situatie Vama:<br>
        </h4>
        <p align="left">
        -Vizualizeaza toate datele din vama despre <b>Tranzistanti</b><br>
        &nbsp&nbsp&nbsp&nbsp Toti tranzistantii <a href="Routes/sql_cereri.php?category=0&tip=1&gui=0" target="_blank">aici</a><br>
        &nbsp&nbsp&nbsp&nbsp Care au intrat in tara <a href="Routes/sql_cereri.php?category=1&tip=1&gui=0" target="_blank">aici</a><br>
        &nbsp&nbsp&nbsp&nbsp Care au iesit din tara <a href="Routes/sql_cereri.php?category=2&tip=1&gui=0" target="_blank">aici</a><br>
        &nbsp&nbsp&nbsp&nbsp Care au primit permisiune <a href="Routes/sql_cereri.php?category=3&tip=1&gui=0" target="_blank">aici</a><br>
        &nbsp&nbsp&nbsp&nbsp Care NU au primit permisiune <a href="Routes/sql_cereri.php?category=4&tip=1&gui=0" target="_blank">aici</a><br>
        &nbsp&nbsp&nbsp&nbsp Sunt urmariti de INTERPOL <a href="Routes/sql_cereri.php?category=5&tip=1&gui=0" target="_blank">aici</a><br><br>
        -Toti ofiterii din acest punct vamal: <b>Angajati</b> <a href="Routes/sql_cereri.php?category=6&tip=5&gui=0" target="_blank">aici</a><br><br>
        -Toate sesiunile active: <b>Online</b> <a href="Routes/sql_cereri.php?category=7&tip=7&gui=0" target="_blank">aici</a><br>
        <br>
        </p>
    </main>      
</div>
</body>
</html>
