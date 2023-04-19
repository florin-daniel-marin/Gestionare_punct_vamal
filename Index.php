<?php
	session_start();
    require_once('Session/session_connect.php');
	$_SESSION['user_type'] = 'user';
	$_SESSION['nrdesktop'] = rand(1, 10);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Desktop Vama Isaccea</title>
		<link href="Resources/Css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
            <img src="Resources/Media/header-DGV.png" class="center">
			<h1>Login Desktop #<?php echo $_SESSION['nrdesktop'];?> Vama-Isaccea</h1>
            <h2> Grad:</h2>
			<form action="Session/authentification.php" method="post">
                <select type="select" name="grad" value="grad">
                    <option value="Director General Vama">Director General Vama</option>
                    <option value="Director General Adjunct Vama">Director General Adjunct Vama</option>
                    <option value="Director Executiv Vama">Director Executiv Vama</option>
                    <option value="Sef Birou Vamal">Sef Birou Vamal</option>
                    <option value="Inspector Vamal Superior">Inspector Vamal Superior</option>
					<option value="Inspecotr Vamal Principal">Inspector Vamal Principal</option>
                    <option value="Inspector Vamal Asistent">Inspector Vamal Asistent</option>
                    <option value="Inspector Vamal Debutant">Inspector Vamal Debutant</option>
                    <option value="Controlor Vamal Principal">Controlor Vamal Principal</option>
                </select>

				<input type="text" name="numeprenume" placeholder="Nume si prenume" id="nume" required>
				<input type="password" name="parola" placeholder="Parola" id="parola" required>
				<input type="submit" value="Login">
			</form>

			<form action="Session/change_to_admin.php" method="post">
				
				<button class="button">Change to admin</button>
			</form>

		</div>
	</body>
</html>

