<?php

require '../config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../CSS/css.css">
	<script src='../JS/jquery-3.1.1.js'></script>
	<script src='../JS/util.js'></script>
	<title>ROL</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap-theme.min.css">
	<script src="../JS/bootstrap.min.js"></script>
	<script src="../JS/npm.js"></script>
</head>
<body>
<div class="container">
<table>
<form action="add_rol.php" method="post">


  <!-- Rol -->
  <tr>
    <td>Rolul</td>
    <td>
      <input class='form-control' type="text" name="rol">
    </td>
  </tr>
<!-- Buton -->
  <tr>
    <td>
      <input class='btn btn-default' type="submit" name="but" value="Setare">
    </td>
  </tr>
</form>
</table>
	</div>

</body>
</html>
<?php

if (isset($_POST['but'])) {
	$num = R::count( 'rol', ' tip like ? ', $_POST['rol'] );
echo $num;
	if ($num ==0 ) {
		$add = R::dispense('rol') ;
		$add->tip = $_POST['rol'];
		//R::store($add);
		echo $_POST['rol'];
	}
	else {
		echo "<script>alert('Deja exista')</script>";
	}
}

?>
