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
	<title>SERVICII</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap-theme.min.css">
	<script src="../JS/bootstrap.min.js"></script>
	<script src="../JS/npm.js"></script>
</head>
<body>
<form action="add_model.php" method="post">
<table>
<!-- Servicii -->
  <tr>
    <td>
      Modelul
    </td>
    <td>
      <input class='form-control' type="text" name="model">
    </td>
  </tr>
  <tr>
    <td>
      Pentru ce marca
    </td>
    <td>
      <select class='form-control' name="marca">
        <?php

        $cant = R::count('marca');
    		for ($i = 1; $i <= $cant; $i++) {
    			$marca = R::load('marca', $i);
          echo "<option value=".$i.">".$marca->denumire."</option>";
    		}

        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      <input value='Setare' class='btn btn-default' type="submit" name="but">
    </td>
  </tr>

</table>
</form>
</body>
</html>
<?php

if (isset($_POST['but'])) {
  $add = R::dispense('model');
  $add->denumire = $_POST['model'];
  $add->marca_id = intval($_POST['marca']);
  R::store($add);
}
?>
