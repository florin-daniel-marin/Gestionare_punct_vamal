<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>

    <head>
		<meta charset="utf-8">
		<link  rel="stylesheet" href="../Resources/Css/style1.css" type="text/css">
        <title>Interogari</title>
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
                    <li class="Mainpage"><a href="Main.php">Controlori</a></li>
                    <li class="Interogari"><a href="Workbench.php">Workbench</a></li>
                    <li class="Tranzistanti"><a href="Tranzistanti.php">Tranzsitanti</a></li>
                    <!--<li class="Raport"><a href="Raport.php">Raport</a></li>-->
                    <li class="Session"><a href="Sesiune.php">Sesiunea curenta</a></li>
                    <li class="Logout"><a href="../Session/log_out.php">Log Out</a></li>
                </ul>
            </nav>
   <h2 align="center">Interfata pentru interogarea tranzistantilor:</h2>
   <h3 align="center">Interogari create astazi:<button type="button" name="save" id="save" class="btn2">Adauga</button></h3>
    <div class="academia" >
    <table id="interogari">
    <thead >
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
    <tbody>
    <tr>
        <td contenteditable="true"  class ="date_add"></td>
        <td contenteditable="true"  class ="nume"></td>
        <td contenteditable="true"  class ="prenume"></td>
        <td contenteditable="true"  class ="sex"></td>
        <td contenteditable="true"  class ="nastere"></td>
        <td contenteditable="true"  class ="cnp"></td>
        <td contenteditable="true"  class ="nat"></td>
        <td contenteditable="true"  class ="tara"></td>
        <td contenteditable="true"  class ="jud"></td>
        <td contenteditable="true"  class ="loc"></td>

        <td contenteditable="true"  class ="lntara"></td>
        <td contenteditable="true"  class ="lnjud"></td>
        <td contenteditable="true"  class ="lnloc"></td>

        <td contenteditable="true"  class ="ant"></td>
        <td contenteditable="true"  class ="rest"></td>
        <td contenteditable="true"  class ="wanted"></td>
        <td contenteditable="true"  class ="Permisiune"></td>
        <td contenteditable="true"  class ="Inout"></td>
    </tr>
    <tbody id=inserted_item_data>
    </tbody>

    </tbody>
    </table>
  </div></div>
 </body>
</html>


<script>
    $(document).ready(function(){
        $('#save').click(function(){
            var date_add = [];
            var nume = [];
            var prenume = [];
            var sex = [];
            var nastere = [];
            var cnp = [];
            var nat = [];
            var tara = [];
            var jud = [];
            var loc = [];

            var lntara = [];
            var lnjud = [];
            var lnloc = [];

            var ant = [];
            var rest = [];
            var wanted = [];
            var Permisiune = [];
            var Inout = [];

            $('.date_add').each(function(){date_add.push($(this).text());});
            $('.nume').each(function(){nume.push($(this).text());});
            $('.prenume').each(function(){prenume.push($(this).text());});
            $('.sex').each(function(){sex.push($(this).text());});
            $('.nastere').each(function(){nastere.push($(this).text());});
            $('.cnp').each(function(){cnp.push($(this).text());});
            $('.nat').each(function(){nat.push($(this).text());});
            $('.tara').each(function(){tara.push($(this).text());});
            $('.jud').each(function(){jud.push($(this).text());});
            $('.loc').each(function(){loc.push($(this).text());});

            $('.lntara').each(function(){lntara.push($(this).text());});
            $('.lnjud').each(function(){lnjud.push($(this).text());});
            $('.lnloc').each(function(){lnloc.push($(this).text());});

            $('.ant').each(function(){ant.push($(this).text());});
            $('.rest').each(function(){rest.push($(this).text());});
            $('.wanted').each(function(){wanted.push($(this).text());});
            $('.Permisiune').each(function(){Permisiune.push($(this).text());});
            $('.Inout').each(function(){Inout.push($(this).text());});

            $.ajax({
            url:"adauga_tranzistanti_autovehicule.php",
            method:"POST",
            data:{date_add:date_add, nume:nume, prenume:prenume, sex:sex, nastere:nastere, cnp:cnp, nat:nat, tara:tara, jud:jud, loc:loc, lntara:lntara, lnjud:lnjud, lnloc:lnloc, ant:ant, rest:rest, wanted:wanted, Permisiune:Permisiune, Inout:Inout},
            success:function(data){
                alert(data);
                $("td[contentEditable='true']").text("");
            
                fetch_item_data();
            }
            });
        });
    
        function fetch_item_data()
        {
        $.ajax({
        url:"extrage_tranzistanti.php",
        method:"POST",
        success:function(data)
        {
            $('#inserted_item_data').html(data);
        }
        })
        }
        fetch_item_data();
    });
</script>
