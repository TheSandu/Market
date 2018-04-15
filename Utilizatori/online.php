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
	<title>REZ</title>
		<link rel="stylesheet" href="../CSS/css.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap-theme.min.css">
		<script src="../JS/bootstrap.min.js"></script>
		<script src="../JS/npm.js"></script>
</head>
<body>
<table class="table">
	<?php

		$cant = R::count('users');
		$find = R::find('rol');
		$k = 0;
		for ($i = 1; $i <= $cant; $i++) {
			$utiliz = R::load('users', $i);
			 $user_rol = R::find('rol','id=:id',array(':id'=>$utiliz->rol_id));
        if ($utiliz->online == 1) {
					$k++;
					echo "<tr>
									<th>".$k."</th>
									<td class='login'>".$utiliz->login."</td>
									<td>
										<select class='rol_schimb form-control' name=".$utiliz->login.">
										 <option value=".$utiliz->rol_id.">".reset($user_rol)->tip."</option>";
									foreach ($find as $key => $value) {
										if ($value->id != $utiliz->rol_id) {
											echo "<option value=".$value->id." >".$value->tip."</option>";
										}
									}
				    	echo "</select>
									</td>
								</tr>";
        }
		}
	?>
</table>
	<div id="contain">
	</div>

</body>
</html>
