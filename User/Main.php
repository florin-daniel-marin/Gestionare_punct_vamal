<?php
    session_start();
    require_once('../Session/session_connect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Controlori <?php echo $_SESSION['nrdesktop'];?></title>
		<link  rel="stylesheet" href="../Resources/Css/style1.css" type="text/css">
        <title>Interogari</title>
        <script type="text/javascript" src="jquery-3.6.3.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                    <li class="Logout"><a href="../Session/log_out.php">Log Out</a></li>
                </ul>
            </nav>
            <main>
                <hr>
                Inainte de a incepe lucrul, trebuie sa introduci controlorii debutanti si controlorii asistenti.<br>
                Apoi vei fi redirectionat in Workbench, pentru a incepe tura.
                <br>
                <form class="pp" action="Routes/controlori.php" method="post">

                    <select class="selectmain" id="selectus0" name="cadet1">
                        <option id="none" value="NULL">none</option>
                        <option value="Controlor Vamal Asistent">Controlor Vamal Asistent</option>
                        <option value="Controlor Vamal Debutant">Controlor Vamal Debutant</option>
                    </select>
                    <div id="adaug_optiuni_ajax"></div>
                    <div align="center">
                        <button type="submit" name="save" id="save" class="btn">Save</button>
                    </div>

                </form>
            </main>
            <footer>
            <div></div>  <!-- Use whatever tags are appropriate for content. -->
            </footer>    
		</div>
	</body>
</html>

<script>
    $(document).ready(function(){
        var count = 0;
        $("#selectus"+count).one('click', function(){
            count = count + 1;
            var html_code = "<input type='text' name='numeprenume1' placeholder='Nume si prenume'' required></input>";
            html_code += "<br/><select class='selectmain' id='selectus1' name='cadet2'>";
            html_code += "<option id='none' value='NULL'>none</option>";
            html_code += "<option value='Controlor Vamal Asistent'>Controlor Vamal Asistent</option>";
            html_code += "<option value='Controlor Vamal Debutant'>Controlor Vamal Debutant</option>";
            html_code += "</select>";
            $('#adaug_optiuni_ajax').append(html_code);

            $("#selectus"+count).one('click', function(){
            count = count + 1;
            var html_code = "<br/><input type='text' name='numeprenume2' placeholder='Nume si prenume' id='nume2' required></input>";
            $('#adaug_optiuni_ajax').append(html_code);

        });
    }); 
});
</script>

