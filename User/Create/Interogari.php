<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Main Desktop Vama Isaccea</title>
		<link  rel="stylesheet" href="style1.css" type="text/css">
	</head>

	<body id="main">
        <div >
            <header>
                <div class="header-image"> 
                        <img src="header-right_blue.jpg" width=100% height="50">
                    </div>
                <figure>
                    <h1>Vama Issacea</h1>
                        <figcaption>
                        <p>Navigheaza in meniu pentru a cauta pagina de interogari dupa ce ai inceput tura:</p>
                        </figcaption>
                </figure>
            </header>
            <nav>
                <ul>
                    <li class="Main page"><a href="Desktop_vama.php">Main page</a></li>
                    <li class="Interogari"><a href="Interogari.php">Interogari</a></li>
                    <li class="Tranzistanti"><a href="Tranzistanti.php">Tranzsitanti</a></li>
                    <li class="Raport"><a href="Raport.php">Raport</a></li>
                </ul>
            </nav>
            <main>
                <hr>
                Inainte de a incepe lucrul, trebuie sa introduci controlorii debutanti si controlorii asistenti.<br>
                Apoi vei fi redirectionat pe pagina Interogari, pentru a incepe tura.
                <br>
                <div class="fixedFc">
                Nume<form action="#" method="post">
                    <table class="academia">
                        <tbody>
                        <th>
                            <td>

                            </td>
                        </th>
                        </tbody>

                <input  name="nume" id="nume" required>
                <input  name="prenume" id="prenume" required>
                <input  name="datanasterii" id="datanasterii" required>
                <input  name="CNP" id="CNP" >
                <input  name="nat" id="nat" required>
                <input  name="tara" id="tara" required>
                <input  name="judet" id="judet" required>
                <input  name="localitate" id="localitate" required>
                <input  name="lntara" id="lntara" required>
                <input  name="lnjudet" id="lnjudet" required>
				<input  name="lnlocalitate" id="lnlocalitate" required>
                <input  name="parola" placeholder="Parola" id="parola" required>
                <input  name="parola" placeholder="Parola" id="parola" required>
				<input  value="Login">
                    </table>
                </form>
                </div>
                <?php
                   
                        
                ?>
            </main>
            <footer>
            <div></div>  <!-- Use whatever tags are appropriate for content. -->
            </footer>    
		</div>
	</body>
</html>
