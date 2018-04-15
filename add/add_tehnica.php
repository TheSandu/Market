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
	<title>TEHNICA</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap-theme.min.css">
	<script src="../JS/bootstrap.min.js"></script>
	<script src="../JS/npm.js"></script>
</head>
<body>
<div class="container-fluid">

<table>
<form action="add_tehnica.php" method="post">


  <!-- Marca -->
  <tr>
    <td>Tehnica</td>
    <td>
			<div class="form-group">
      	<input class='form-control' type="text" name="tehnica">
			</div>
    </td>
  </tr>
<!-- Buton -->
  <tr>
    <td>
				<input class='btn btn-default ' type="submit" name="but" value="Setare">
    </td>
  </tr>
</form>
</table>
</div>
</body>
</html>
<?php
if (isset($_POST['but'])) {
  $add = R::dispense('tehnica') ;
  $add->denumire = $_POST['tehnica'];
  R::store($add);
  echo $_POST['tehnica'];
}
?>
