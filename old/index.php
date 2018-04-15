<?php

session_start();
require 'config.php';
	if (isset($_POST['log_but'])) {

	$num = R::count( 'users');
		for ($i=0; $i <$num ; $i++) {
			$row = R::getAll( 'SELECT * FROM users' );

			if ($_POST['log'] == $row[$i]['login'] && $_POST['pass'] == $row[$i]['password']) {

				if ($row[$i]['admin'] == 0) {
					$_SESSION['client'] = true;
					header('Location: http://sasa.md/client.php');;
					exit();
				}

				elseif ($row[$i]['admin'] == 1) {
					$_SESSION['inginer'] = true;
					header('Location: http://sasa.md/inginer.php');
					exit();
				}

				elseif ($row[$i]['admin'] == 2) {
					$_SESSION['admin'] = ture;
					header('Location: http://sasa.md/admi.php');
					exit();
				}
				
			}
		}


	}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logare</title>
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet"> 
	<script src="JS/jquery-3.1.1.js" ></script>
	<link rel="stylesheet" href="CSS/css.css">
</head>
<body>
<div id="header">
<!-- 	<a href="client.php">Client</a>
	<a href="inginer.php">Inginer</a>
	<a href="admi.php">Administrator</a> -->
</div>
<div id="contain">
<table>
	<form action="index.php" method="POST">
	<tr><th>Logare</th></tr>
<tr>
	<td><label for="log">Loghin</label></td>
	<td><input type="text" name="log" id="log" placeholder="Loghin"></td>
</tr>
<tr>
	<td><label for="pass">Parola</label></td>
	<td><input type="password" name="pass" id="pass" placeholder="Parola"></td>
</tr>
<tr>
	<td><input type="submit" name="log_but" value="Logare"></form></td>
	<td>
		<form action="reg.php">
			<input type="submit" value="Registrare">
		</form>
	</td>
</tr>
	
</table>
</div>

<div id="footer"></div>

</body>
</html>