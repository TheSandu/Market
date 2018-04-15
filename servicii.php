<?php
//require '../config.php';
// require 'proverca/pro_inginer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inginer</title>
	<link href="https://fonts.googleapis.com/css?family=Federo|Signika" rel="stylesheet">
	<script src="JS/jquery-3.1.1.js" ></script>
	<script src='JS/script.js'></script>
	<link rel="stylesheet" href="CSS/css.css">
</head>
<body>
<div id="header">
<!--
	<a href="client.php">Client</a>
	<a href="inginer.php">Inginer</a>
	<a href="admi.php">Administrator</a> -->
</div>
<div id="contain">
	<form action="inginer.php" method="POST">

		<table>
				<tr>
					<td class="title">ID</td>
					<td class="title">Numele,Prenumele</td>
					<td class="title">Telefon</td>
					<td class="title">Adresa</td>
					<td class="title">Ce fel de dispozitiv</td>
					<td class="title">Marca</td>
					<td class="title">Model</td>
					<td class="title">Tipul problemei</td>
					<td class="title">Urgenta</td>
					<td class="title">Statutul</td>
				</tr>
<?php


$num = R::count('solicitari');

for ($i=1; $i <= $num; $i++) {

echo "<tr>";

	$rez = R::load('solicitari',$i);
	foreach ($rez as $key => $value) {

		if ($key == 'tehnica') {

			$find = R::find('tehnica',
				' id=:id ',array(':id'=>$value));
			foreach ($find as $key => $value) {
				echo "<td id='".$key."'>".$value->denumire."</td>";
			}
		}

		elseif ($key == 'marca') {

			$find = R::find('marca',
				' id=:id ',array(':id'=>$value));
			echo "<td>";
			foreach ($find as $key => $value) {
				echo $value->denumire;
			}
			echo "</td>";
		}

		elseif ($key == 'model') {

			$find = R::find('model',
				' id=:id ',array(':id'=>$value));
			foreach ($find as $key => $value) {
				echo "<td>".$value->denumire."</td>";
			}
		}

		elseif ($key == 'tipservicii') {

			$find = R::find('tipservicii',
				' id=:id ',array(':id'=>$value));
			foreach ($find as $key => $value) {
				echo "<td>".$value->tip."</td>";
			}
		}

		elseif ($key == 'urgenta') {

			$find = R::find('urgenta',
				' id=:id ',array(':id'=>$value));
			foreach ($find as $key => $value) {
				echo "<td>".$value->urgenta."</td>";
			}
		}

		elseif ($key == 'statut') {

			$find = R::find('statut',
				' id=:id ',array(':id'=>$value));
			echo "<td>";

				echo "<div class=iner>";

			foreach ($find as $key => $value) {
				echo $value->tip;
			}
						echo "</div>";

			$find = R::find('statut');

					echo "<select name=".$i." class='ascuns'>";
			foreach ($find as $key => $value) {
				echo $key."<br>";
						echo "<option value=".$value->id.">".$value->tip."</option>";
			}
					echo "
					</select>
						<button type=submit class=sets></button>
					</td>";
		}

		else{
			echo "<td>".$value."</td>";
		}
	}
echo "</tr>";
}

?>
		</table>

	</form>
</div>
<div id="footer"></div>

</body>
</html>
