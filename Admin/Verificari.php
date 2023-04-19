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

        <h3 align="center">Afisarea tuturor interogarilor vamale din Vama Issacea:</br>
        Nu aveti permisiunea sa modificati.</br>
    <button type="button" name="route_11" id="route_11" class="btn5">Afisati toate interogarile</button>
    <div align="left">
        Filtre:
        <br/>
        <button type="button" name="route_1" id="route_1" class="btn">Tranzistanti intrati in tara</button>
        <button type="button" name="route_2" id="route_2" class="btn">Tranzistanti iesiti din tara</button>
        <button type="button" name="route_3" id="route_3" class="btn">Au primit permisiune</button>
        <button type="button" name="route_4" id="route_4" class="btn">Nu au primit permisiune</button>

        <br/>
        <br/>
        Cautati dupa data: (inca nu merge)
        <br/>
        <label for="start"></label>
        <input type="date"  class="selectmain" id="start" name="trip-start" min="2020-01-01" max="2023-12-31">
        <button type="button" name="route_8" id="route_8" class="btn3">Cautati</button>

        <br/>
        <br/>
        Cautati dupa nume: (inca nu merge)
        <br/>
        <label for="start"></label>
        <input type="search"  class="selectmain" id="start" name="trip-start" min="2020-01-01" max="2023-12-31">
        <button type="button" name="route_9" id="route_9" class="btn3">Cautati</button>
    </div>
    </h3><h3 align="left"> Goliti pagina:<button type="button" name="remove" id="remove" class="btn3">Remove</button></h3>

    <div class="academia">
    <table class="wideTable">
    <thead>
    <tr style="flex-basis: 100px ">
      <th>Data</th>
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

      <th>Permisiune</th>
      <th>Intrare/ iesire</th>
      <th></th>
    </tr>
    </thead>

    <tbody id=inserted_item_data>
    </tbody>

    </table>



    </table>
  </div></main></div>
 </body>
</html>

<script>
    $(document).ready(function(){
        $('#route_11').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 11, tip: 1, gui: 1},
        success:function(data){
            console.log(data);
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();
    });

    $('#route_1').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 1, tip: 1, gui: 1},
        success:function(data){
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();       
    });

    $('#route_2').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 2, tip: 1, gui: 1},
        success:function(data){
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();       
    });

    $('#route_3').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 3, tip: 1, gui: 1},
        success:function(data){
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();       
    });

    $('#route_4').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 4, tip: 1, gui: 1},
        success:function(data){
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();       
    });

    $('#route_8').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 8, tip: 1, gui: 1},
        success:function(data){
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();       
    });

    $('#route_9').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 9, tip: 1, gui: 1},
        success:function(data){
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