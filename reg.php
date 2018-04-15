<?php

require 'config.php';
	$unilog = R::count('users','login = ? ',array($_POST['log']));
if (isset($_POST['reg_button'])) {
	if ($unilog != 0){
 	 echo "
 	 <script>
 		alert('Deja exista');
 	 </script>";
  }
  elseif ($_POST['name']== '') {
 	 echo "
 	 <script>
 		alert('Nu ai introdus numele');
 	 </script>";
  }
  elseif ($_POST['log']== '') {
 	 echo "
 	 <script>
 		alert('Nu ai introdus loginul');
 	 </script>";
  }
  elseif ($_POST['pass']== '') {
 	 echo "
 	 <script>
 		alert('Nu ai introdus parola');
 	 </script>";
  }
	elseif( $unilog == 0 && $_POST['name']!= '' && $_POST['log']!= '' && $_POST['pass']!= ''){
		$reg_client = R::dispense('clienti');
		  	$reg_client->nume = $_POST['name'];
	  		$reg_client->tel = $_POST['tel'];
	  		$reg_client->adresa = $_POST['adr'];
		R::store($reg_client);

		$find = R::find('clienti','nume=:nume',array(':nume' => $_POST['name']));
		$reg_users = R::dispense('users');
			$reg_users->login = $_POST['log'];
			$reg_users->pass = $_POST['pass'];
			$reg_users->clienti_id = reset($find)->id;
		R::store( $reg_users );
			echo "
			<script>
			 alert('Tat norm');
			</script>";
			header("Location: index.php");
   }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Client</title>
	<!-- <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet"> -->
	<script src="JS/jquery-3.1.1.js" ></script>
	<link rel="stylesheet" href="CSS/css.css">
	<script src='JS/script.js'></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap-theme.min.css">
	<script src="JS/bootstrap.min.js"></script>
	<script src="JS/npm.js"></script>
</head>
<body>
<div class="container-fluid" style="background-color:#1b1a50;">
<div class="col-md-5 col-md-offset-3 center" style="margin-top:100px;padding:10px;background: #ebeff5;">
	<form action="reg.php" method="post">
		<div class="form-group">
			<label for="">Numele, Prenumele</label>
			<input class='form-control' type="text" name="name">
		</div>
		<div class="form-group">
			<label for="">Adresa</label>
			<input class='form-control' type="text" name="adr">
		</div>
		<div class="form-group">
			<label for="">Telefon</label>
			<input class='form-control' type="text" name="tel">
		</div>
		<div class="form-group">
			<label for="">Login</label>
			<input class='form-control' type="text" name="log">
		</div>
		<div class="form-group">
			<label for="">Parola</label>
			<input class='form-control' type="password" name="pass">
		</div>
		<button type="submit" class='btn btn-primary' name="reg_button">Registrare</button>
	</form>
</div>
</div>
</body>
</html>
