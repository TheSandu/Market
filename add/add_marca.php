<?php

require '../config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../CSS/css.css">
	<script src='../JS/jquery-3.1.1.js'></script>
	<script src='data:application/octet-stream;base64,JChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7DQoNCgkkKCcubG9naW4nKS5jbGljayhmdW5jdGlvbigpIHsNCgkJJC5hamF4KHsNCgkJCXVybDogJy4uL1V0aWxpemF0b3JpL2NoYW5nZS5waHAnLA0KCQkJdHlwZTogJ1BPU1QnLA0KCQkJZGF0YToge2xvZzogJCh0aGlzKS50ZXh0KCl9LA0KCQkJc3VjY2VzczogZnVuY3Rpb24oYXJndW1lbnQpIHsNCgkJCQkkKCcjY29udGFpbicpLmh0bWwoYXJndW1lbnQpOw0KCQkJfQ0KCQl9KTsNCgkJDQoJfSk7DQp9KTs='></script>
	<title>MARCA</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap-theme.min.css">
	<script src="../JS/bootstrap.min.js"></script>
	<script src="../JS/npm.js"></script>
</head>
<body>

<table>
<form class="" action="add_marca.php" method="post">

  <!-- Tehnica -->
  <tr>
    <td>
      Pentru ce tehnica
    </td>
    <td><div class="form-group">
      <select class='form-control' name="tehnica">
        <?php

        $cant = R::count('tehnica');
        for ($i = 1; $i <= $cant; $i++) {
          $tehnica = R::load('tehnica', $i);
          echo "<option value=".$i.">".$tehnica->denumire."</option>";
        }

        ?>
      </select>
			</div>
    </td>
  </tr>

  <!-- Marca -->
  <tr>
    <td>Marca</td>
    <td>
			<div class="form-group">
      <input class='form-control' type="text" name="marca">
		</div>
    </td>
  </tr>

  <!-- Model -->
  <tr>
    <td>Modelul</td>
    <td>
			<div class="form-group">
      <input class='form-control' type="text" name="model">
		</div>
    </td>
  </tr>

  <!-- Buton -->
  <tr>
    <td>
      <input type="submit" name="but" value="Setare">
    </td>
  </tr>
</form>
</table>
	<div id="contain">
	</div>
</body>
</html>
<?php

if (isset($_POST['but'])) {
  $marca = R::dispense('marca');
  $marca->denumire = $_POST['marca'];
  $marca->tehnica_id = intval($_POST['tehnica']);
  $proverca1 = R::store($marca);

  if ($proverca1 == false) {
    echo "<script>alert('Nu so salvat marca')</script>";
  }

  $find = R::find('marca',
    ' denumire=:denumire ',array(':denumire'=>$_POST['marca']));
  $model = R::dispense('model');
  $model->denumire = $_POST['model'];
  foreach ($find as $key => $value) {
    echo $value->id;
    $model->marca_id = $value->id;
    break;
  }
  $proverca2 = R::store($model);

  if ($proverca2 == false) {
    echo "<script>alert('Nu so salvat modelu')</script>";
  }
}
?>
