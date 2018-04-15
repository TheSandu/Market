<?php

require 'config.php';
// require 'proverca/pro_client.php';

?>
<!-- <script>
	window.open("google.com", "Popup", "location=1,status=1,scrollbars=1, resizable=1, directories=1, toolbar=1, titlebar=1, width=300, height=300");
</script> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Client</title>
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet"> 
	<script src="JS/jquery-3.1.1.js"></script>
	<script src='JS/script.js'></script>
	<link rel="stylesheet" href="CSS/css.css">
</head>
<body>
<div id="header">
</div>
<div id="contain">
	<form action="client.php" id="tat" method="POST">
		<table>
			<tr>
				<td>Nmele Prenumele</td>
				<td><input type="text" name="nume"></td>
			</tr>
			<tr>
				<td>Numarul de telefon</td>
				<td><input type="text" name="tel"></td>
			</tr>
			<tr>
				<td>Adresa</td>
				<td><input type="text" name="adres"></td>
			</tr>
			<tr>
				<td>Tipul tehnicii</td>
				<td>
					<select name="tehnica" id="tehnica">
						<?php
							$n = R::count('tehnica');
							for ($i=1; $i <=$n; $i++) { 
								$tehnica = R::load('tehnica',$i);
								echo '<option value="'.$tehnica->id.'">'.$tehnica->denumire.'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Marca tehnicii</td>
				<td id="_marca">
					<select name="marca" id="marca">
					</select>
				</td>
			</tr>
			<tr>
				<td>Model tehnicii</td>
				<td id="_model">
					<select name="model" id="model">
					</select>
				</td>
			</tr>
			<tr>
				<td>Tipul Servicilor</td>
				<td id="_servicii">
					<select name="tipservicii" id="tipservicii">
					</select>
				</td>
			</tr>
			<tr>
				<td>Urgenta</td>
				<td>
					<select name="urgenta">
						<?php
							$n = R::count('urgenta');

							for ($i=1; $i <=$n; $i++) {
								$urgenta = R::load('urgenta',$i);
								echo '<option value="'.$urgenta->urgenta.'">'.$urgenta->urgenta.'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="but" value="Trimite date"></td>
			</tr>
		</table>

	
	</form>
</div>

<div id="footer"></div>

</body>

</html>
<?php
// nume tel adres tehnica marca model tipservicii urgenta
if (isset($_POST['but'])) {

	$table = R::dispense('solicitari');

		$table->nume 		= $_POST['nume'] ;
		$table->tel         = $_POST['tel'] ;
		$table->adres       = $_POST['adres'] ;
		$table->tehnica     = $_POST['tehnica'] ;
		$table->marca       = $_POST['marca'] ;
		$table->model       = $_POST['model'] ;
		$table->tipservicii = $_POST['tipservicii'] ;
		$table->urgenta     = $_POST['urgenta'] ;
	R::store($table);
}

?>