<?php 

require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Client</title>
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet"> 
	<script src="JS/jquery-3.1.1.js" ></script>
	<link rel="stylesheet" href="CSS/css.css">
</head>
<body>
<div id="header">
<!-- 	
	<a href="client.php">Client</a>
	<a href="inginer.php">Inginer</a>
	<a href="admi.php">Administrator</a> 
-->
</div>
<div id="contain">
<table>
	<form action="reg.php" method="POST">
	<tr><th>Registrare</th></tr>
<tr>
	<td><label for="log">Loghin</label></td>
	<td><input type="text" name="log" id="log" placeholder="Loghin"></td>
</tr>
<tr>
	<td><label for="pass">Parola</label></td>
	<td><input type="password" name="pass" id="pass" placeholder="Parola"></td>
</tr>
<tr>
	<td><input type="submit" name="reg_but" value="Inregistrare"></form></td>
	<td>
		<form action="index.php">
			<input type="submit" value="Logare">
		</form>
	</td>
</tr>
	
</table>
</div>

<div id="footer"></div>

</body>
</html>
<?php 
	
	if ($_POST['reg_but']) {
		$reg = R::dispense('users');
		$reg->login = md5(htmlspecialchars($_POST['log']));
		$reg->password = md5(htmlspecialchars($_POST['pass']));

		$proverca = R::store( $reg );

		if ($proverca == true) {
			echo "Tat norm";
		}
	}

 ?>