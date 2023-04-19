<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>

    <head>
		<meta charset="utf-8">
		<link  rel="stylesheet" href="../Resources/Css/style1.css" type="text/css">
        <title>Tranzistanti</title>
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
                Vama Issacea - Desktop #<?php echo $_SESSION['nrdesktop'];?><br/>Bun venit, <?php echo $_SESSION['Grad'],' ',$_SESSION['Nume'], ' ', $_SESSION['Prenume']; ?>
                </div>
                <br/>
            </header>
            <nav>
                <ul>
                    <li class="Mainpage"><a href="Menu.php">Controlori</a></li>
                    <li class="Interogari"><a href="Workbench.php">Workbench</a></li>
                    <li class="Tranzistanti"><a href="Tranzistanti.php">Tranzsitanti</a></li>
                    <!--<li class="Raport"><a href="Raport.php">Raport</a></li>-->
                    <li class="Session"><a href="Sesiune.php">Sesiunea curenta</a></li>
                    <li class="Logout"><a href="../Session/log_out.php">Log Out</a></li>
                </ul>
            </nav>
    <main>

        <h2 align="center">Afisarea tuturor tranzistantilor in acest punct vamal:</h2>
   <h3 align="center">Nu aveti permisiunea sa vedeti alte detalii, sau sa modificati:
    <br/>
    <button type="button" name="save" id="save" class="btn5">Afisati in ordine crescatoare</button>
    <button type="button" name="save1" id="save1" class="btn5">Afisati in ordine descrescatoare</button>
    </h3><h3 align="left"> Goliti pagina:<button type="button" name="remove" id="remove" class="btn3">Remove</button></h3>

    <div class="academia">
    <table>
    <thead>
      <th>Nume</th>
      <th>Prenume</th>
      <th>Sex</th>
      <th>Data Nasterii</th>
      <th>CNP</th>
      <th>Nationalitate</th>
      <th>Tara/Country</th>
      <th>Judet/Regiune</th>
      <th>Localitate/City</th>

      <th>Locul Nasterii - Tara/Country</th>
      <th>Locul Nasterii - Judet/Regiune</th>
      <th>Locul Nasterii - Localitate/City</th>

      <th>Antecedente</th>
      <th>Restrictii vama</th>
      <th>Wanted by INTERPOL</th>

    </thead>
    <tbody id=inserted_item_data>
    </tbody>



    </table>
  </div></main></div>
 </body>
</html>

<script>
    $(document).ready(function(){
        $('#save').click(function(){
        function fetch_item_data()
        {
        $.ajax({
        url:"Display/display_date.php",
        method:"POST",
        success:function(data)
        {
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();
    });
    $('#save1').click(function(){
        function fetch_item_data()
        {
        $.ajax({
        url:"Display/display_date_reverse.php",
        method:"POST",
        success:function(data)
        {
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();       
    });

    $('#remove').click(function(){
        $('#inserted_item_data').remove();
        location.reload(true);
    });

});

</script>