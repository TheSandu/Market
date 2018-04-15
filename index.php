<?php
session_start();
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=sasa','root', '' );
if (isset($_SESSION['logat'])) {
	header('Location: http://sasa.md/page.php');
}
if (isset($_POST['log_but'])) {

	$n = R::count('users');

	for ($i=1; $i <= $n; $i++) {
		$rez = R::load( 'users',$i);
		if( $_POST['log'] == $rez->login && $_POST['pass'] == $rez->pass ){
			header('Location: http://sasa.md/page.php');
			$_SESSION['logat'] = true;
			break;
		}
	}
}
if (isset($_POST['log_but'])) {
	$_SESSION['log'] = $_POST['log'];

	$find = R::find('users',
		' login=:login ',array(':login'=>$_SESSION['log']));
	foreach ($find as $key => $value) {
		$value->online = '1';
		R::store($value);
		break;
	}
}
if (isset($_POST['reg_button'])) {
		header('Location: http://sasa.md/reg.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logare</title>
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
	<script src="JS/jquery-3.1.1.js"></script>
	<script src='JS/script.js'></script>
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap-theme.min.css">
<script src="JS/bootstrap.min.js"></script>
<script src="JS/npm.js"></script>
<!-- 	Latest compiled and minified CSS
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

Optional theme
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

Latest compiled and minified JavaScript
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
</head>
<body style="background-color:#1b1a50;">
<div id="header">
</div>
<div id="contain">
	<div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2 center" id="login-box" style="padding-bottom:10px; margin-top:200px; background: #ebeff5;">
	<h3 class="paddinger">Log In</h3>
	<form method="post" action="index.php" role="form">
	  <div class="form-group">
	    <input class="form-control" name="log" id="log" placeholder="Login" type="mail">
		<span class="glyphicon ion-ios-email-outline"></span>
	  </div>
	  <div class="form-group">
	    <input class="form-control" name="pass" id="pass" placeholder="Password" type="password">
		<span class="glyphicon ion-ios-locked-outline"></span>
	  </div>
	  <input type="submit" class="btn btn-primary" name="log_but" value='Submit'>
		<input class='btn btn-default' type="submit" name="reg_button" value="Registrare">
	</form>
	</div>
</div>

<div id="footer"></div>

</body>
</html>
