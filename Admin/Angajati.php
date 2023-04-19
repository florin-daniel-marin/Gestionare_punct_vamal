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

        <h3 align="center">Afisarea tuturor angajatiilor din Vama Issacea:</br>
        
    <button type="button" name="route_6" id="route_6" class="btn5">Afisati toate interogarile</button><br>
    functii de adaugat: Edit, Delete si Add ofiter!
    </h3><h3 align="left"> Goliti pagina:<button type="button" name="remove" id="remove" class="btn3">Remove</button></h3>

    <div class="academia" >
    <table>
    <thead>
    <tr style="flex-basis: 100px ">
      <th>ID</th>
      <th>Grad</th>
      <th>Nume</th>
      <th>Prenume</th>
      <th>Sex</th>
      <th>CNP</th>
      <th>Data Nasterii</th>
      <th>Judet/Sector</th>
      <th>Localitate/City</th>

      <th>Sectie</th>
      <th>Data_Angajarii</th>
      <th>Parola</th>
      <th></th>
    </tr>
    </thead>

    <tbody id=inserted_item_data>
    </tbody>

    </table>
  </div></main></div>
 </body>
</html>

<script>
    $(document).ready(function(){
        $('#route_6').click(function(){
        function fetch_item_data(){
        $.ajax({
        url:"Routes/sql_cereri.php",
        method:"GET",
        data: {category: 6, tip: 5, gui: 1},
        success:function(data){
            console.log(data);
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