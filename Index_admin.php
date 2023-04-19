<?php
	session_start();
    require_once('Session/session_connect.php');
	$_SESSION['user_type'] ='admin';
	$_SESSION['nrdesktop'] = rand(1, 10);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Desktop Vama Isaccea</title>
		<link href="Resources/Css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
            <img src="Resources/Media/header-DGV.png" class="center">
			<h1>Login Admin Vama-Isaccea</h1>
            <h2> Grad:</h2>
			<form action="Session/authentification.php" method="post">
                <select type="select" name="grad" value="grad">
                    <option value="Director General Vama">Director General Vama</option>
                    <option value="Director General Adjunct Vama">Director General Adjunct Vama</option>
                    <option value="Director Executiv Vama">Director Executiv Vama</option>
                    <option value="Sef Birou Vamal">Sef Birou Vamal</option>
                    <option value="Inspector Vamal Superior">Inspector Vamal Superior</option>
                </select>

				<input type="text" name="numeprenume" placeholder="Nume si prenume" id="nume" required>
				<input type="password" name="parola" placeholder="Parola" id="parola" required>
				<input type="submit" value="Login">
			</form>

			
		</div>
	</body>
</html>