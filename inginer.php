<?php
require 'config.php';
require 'proverca/pro_inginer.php';

$find = R::find('users',
	' login=:login ',array(':login'=>$_SESSION['log']));
foreach ($find as $key => $value) {
	$id_client = $value->clienti_id;
	$id_users = $value->id;
		$client = R::find('clienti',
				' id=:id ',array(':id'=>$value->clienti_id));
				break;
}
//session_unset();
?>

<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
	<meta charset="UTF-8">
	<title>Inginer</title>
	<link rel="stylesheet" href="../CSS/css.css">
	<link href="https://fonts.googleapis.com/css?family=Federo|Signika" rel="stylesheet">
	<script src="JS/jquery-3.1.1.js" ></script>
	<script src='JS/script.js'></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="height:100%;">
<div class="container-fluid" style="height:100%;">


	<div class="row" style="height:100%;">
		<div class="col-md-2" style=" padding:0;background-color:#222062; height:100%;color:#fff;">

			<div class="list">
				<img src="/IMG/index.png" alt="">
				<div class="head"></div>
				<ul>
					<li class="list-menu" id="profil">Profile</li>
					<li class="list-menu" id="inscriere">Inscrierele</li>
					<li class="list-menu" id="settings">Settings</li>
					<li class="list-menu"><button type="submit" style="background:none;border:none;" name="button"><i class="glyphicon glyphicon-log-out"></i> Exit</buttop></li>
				</ul>
			</div>

		</div>
		<div class="col-md-9" style="display:none;" id="page2">
			<!-- <div class="col-md-9"> -->
			<div class="row">
				<div class="col-md-4" style="margin-top:10px;">
					<form action="inginer.php" method="post" id="caut_form">
						<div class="form-group form-inline">
							<label>Cautare</label>
							<input class="form-control" type="text" name="cautare" placeholder="Iuntroduce">
							<input class="btn btn-primary" type="button" name="caut_but" id="caut_but" value="Cauta">
						</div>
					</form>
				</div>
			</div>
			<div class="form-group">
				<form action="inginer.php" method="POST">
					<table class="table">
						<thead>
							<tr>
								<th class="title">ID</th>
								<th class="title">Numele,Prenumele</th>
								<th class="title">Telefon</th>
								<th class="title">Adresa</th>
								<th class="title">Ce fel de dispozitiv</th>
								<th class="title">Marca</th>
								<th class="title">Model</th>
								<th class="title">Tipul problemei</th>
								<th class="title">Urgenta</th>
								<th class="title">Statutul</th>
							</tr>
						</thead>
						<tbody id="tbody">
				<?php

				$num = R::count('solicitari');

				for ($i=1; $i <= $num; $i++) {


				$rez = R::load('solicitari',$i);
				echo "<tr>";
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

							echo "<div data-toggle='collapse' data-target='#sel".$i.",#but".$i."'>";

						foreach ($find as $key => $value) {
							echo $value->tip;
						}
									echo "</div>";

						$find = R::find('statut');

								echo "<select name=".$i." id='sel".$i."' class='collapse form-control'>";
						foreach ($find as $key => $value) {
							echo $key."<br>";
									echo "<option value=".$value->id.">".$value->tip."</option>";
						}
								echo "
								</select>
									<button type=submit id='but".$i."' class='collapse sets btn btn-info' style='width:100%;'>SET</button>
								</td>";
					}

					else{
						echo "<td>".$value."</td>";
					}
				}
				echo "</tr>";
				}

				?>
						</tbody>
					</table>

				</form>
			</div>
		</div>
		<div class="col-md-4" style="font-size:1.2em;" id="page1">
			<form action="client.php" method="post">
				<div class="form-group">
					<label for="">Nmele Prenumele</label>

												<?php
												foreach ($client as $key => $value) {
													echo $value->nume."<br>";
													$info[] = $value->nume;
													break;
												}
												?>
				</div>

				<div class="form-group">
					<label for="">Numarul de telefon</label>
					<?php
						foreach ($client as $key => $value) {
							echo $value->tel."<br>";
							$info[] = $value->tel;
							break;
						}
					?>
				</div>

				<div class="form-group">
					<label for="">Adresa</label>
					<?php
						foreach ($client as $key => $value) {
							echo $value->adresa;
							$info[] = $value->adresa;
							break;
						}
					?>
				</div>
			</form>
		</div>
		<div class="col-md-4" style="display:none;font-size:1.2em;" id="page3">
			<form action="client.php" method="post">
				<div class="form-group">
					<label for="">Numele Prenumele</label>
					<input class="form-control" type="text" name="insc_nume" placeholder="Schimba numele">
				</div>
				<div class="form-group">
					<label for="">Numarul de telefon</label>
					<input class="form-control" type="text" name="insc_tel" placeholder="Schimba nr. de telefon">
				</div>
				<div class="form-group">
					<label for="">Adresa</label>
					<input class="form-control" type="text" name="insc_adresa" placeholder="Schimba Adresa">
				</div>
				<div class="form-group">
					<label for="">Login</label>
					<input class="form-control" type="text" name="insc_log" placeholder="Shimba Login">
				</div>
				<div class="form-group">
					<label for="">Parola</label>
					<input class="form-control" type="password" name="insc_pass" placeholder="Shimba parola">
				</div>
				<button class="btn btn-primary" type="button" name="insc_but">Inregistrare</button>
			</form>

			<?php

				if ( isset($_POST['insc_but']) ) {

					 $insc_cl = R::load('clienti',$id_client);
					 $insc_ut = R::load('users',$id_users);

					if ($_POST['insc_nume']!="") {
						 $insc_cl->nume = $_POST['insc_nume'];
					}

					if ($_POST['insc_tel']!="") {
						 $insc_cl->tel = $_POST['insc_tel'];
					}

					if ($_POST['insc_adresa']!="") {
						 $insc_cl->adresa = $_POST['insc_adresa'];
					}

					if ($_POST['insc_log']!="") {
						 $insc_ut->login = $_POST['insc_log'];
					}
					 R::store($insc_cl);
					 R::store($insc_ut);
				}

			?>

		</div>
	</div>



</div>
<div id="footer"></div>
</body>
</html>
