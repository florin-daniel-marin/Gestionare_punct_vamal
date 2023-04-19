<!DOCTYPE html>

<html>
    <?php
    session_start();
    require_once('../Session/session_connect.php');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "SELECT Log_INDEX FROM Logari WHERE In_use = 1";
    $rezultat = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array ($rezultat, SQLSRV_FETCH_ASSOC);
    $_SESSION['Log_Index'] = $row['Log_INDEX'];
    ?>

    <head>
		<meta charset="utf-8">
		<link  rel="stylesheet" href="../Resources/Css/style1.css" type="text/css">
        <title>Sesiunea Curenta</title>
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
                Informatii sesiune curenta, Desktop<?php echo $_SESSION['nrdesktop'];?>, <?php echo $_SESSION['Grad'],' ',$_SESSION['Nume'], ' ', $_SESSION['Prenume']; ?>
                </div>
                <br/>
            </header>
            <nav>
                <ul>
                    <li class="Mainpage"><a href="Main.php">Controlori</a></li>
                    <li class="Interogari"><a href="Workbench.php">Workbench</a></li>
                    <li class="Tranzistanti"><a href="Tranzistanti.php">Tranzsitanti</a></li>
                    <!--<li class="Raport"><a href="Raport.php">Raport</a></li>-->
                    <li class="Session"><a href="Sesiune.php">Sesiunea curenta</a></li>
                    <li class="Logout"><a href="../Session/log_out.php">Log Out</a></li>
                </ul>
            </nav>
            <main>
                <br/><br/><br/>
                Sesiunea curenta apartine turei <?php echo $_SESSION['Tura_Index'];?>, <br/>
                ora inceperii turei: <?php echo $_SESSION['Ora_Incepere'];?>, ora terminarii: <?php echo $_SESSION['Ora_Terminare'];?>.<br/>
                Sesiunea curenta (logarea), de pe desktop-ul acesta: <?php echo $_SESSION['Log_Index'];?>, a inceput la: <?php echo $_SESSION['Ora_Logare'];?><br/>
                <h3>Informatiile contului: </h3>Grad: <?php echo ' '.$_SESSION['Grad'];?><br/>
                Nume: <?php echo $_SESSION['Nume'];?><br/>
                Prenume:  <?php echo $_SESSION['Prenume'];?><br/> 
                Data angajarii:     <?php $ofid = $_SESSION['Ofiter_ID'];
                                $sql = "SELECT [Data_angajarii] FROM Ofiteri WHERE [Ofiter_ID] = '$ofid'";
                                $rezultat = sqlsrv_query($conn, $sql);
                                $row = sqlsrv_fetch_array ($rezultat, SQLSRV_FETCH_ASSOC);
                                $_SESSION['Data_ang'] = Date_format($row['Data_angajarii'], "Y-m-d H:i:s");
                                echo $_SESSION['Data_ang'];?> <br/> <br/> 

                <button type="button" name="mod" id="mod" class="btn5">Modificati parola</button><br/>
                <form id="mparola" action="Update/Update_parola.php" method="post">
            </main>
        </div>
    </body>
</html>

<script>
$(document).ready(function(){
        $('#mod').one('click',function(){
            var html_code = "<input type='text' name='parolaveche' placeholder='Parola veche' required><br>";
             html_code += "<input type='text' name='parolanoua' placeholder='Parola noua' required><br>";
             html_code += "<input type='text' name='parolanoua2' placeholder='Reintroduceti parola noua' required><br>";
             html_code += "<input type='submit' value='Schimba parola'><br></form>";
            $('#mparola').append(html_code);
        });

});
</script>
