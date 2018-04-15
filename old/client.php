<?php

require 'config.php';
require 'proverca/pro_client.php';
if (isset($_POST['exit'])) {

		$util = R::find('users',
			' login=:login ',array(':login'=>$_SESSION['log']));
		foreach ($util as $key => $value) {
			$value->online = '0';
			R::store($value);
			break;
		}
	session_unset();
	header('Location: http://sasa.md/index.php');
}
$find = R::find('users',
	' login=:login ',array(':login'=>$_SESSION['log']));
foreach ($find as $key => $value) {
	$id_client = $value->clienti_id;
	$id_users = $value->id;
		$client = R::find('clienti',
				' id=:id ',array(':id'=>$value->clienti_id));
				break;
}
?>
<!-- <script>
	window.open("google.com", "Popup", "location=1,status=1,scrollbars=1, resizable=1, directories=1, toolbar=1, titlebar=1, width=300, height=300");
</script> -->
<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
	<meta charset="UTF-8">
	<title>Client</title>
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
	<script src="JS/jquery-3.1.1.js"></script>
	<script src='JS/script.js'></script>
	<link rel="stylesheet" href="../CSS/css.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="height:100%;">
<div id="header">
</div>
<div class='container-fluid' id="contain" style="height:100%;">


	<div class="row" style="height:100%;">
		<div class="col-md-2" style=" padding:0;background-color:#222062; height:100%;color:#fff;">

			<div class="list">
				<img src="/IMG/index.png" alt="">
				<div class="head"></div>
				<ul>
					<li class="list-menu" id="profil">Profile</li>
					<li class="list-menu" id="inscriere">Inscriere</li>
					<li class="list-menu" id="settings">Settings</li>
					<li class="list-menu" id="exit" ><i class="glyphicon glyphicon-log-out"></i> EXIT</li>
				</ul>
			</div>

		</div>
		<div class="col-md-9">
			<div style="display:none;" class="col-md-4" id="page2">
			<form style="display:inline; font-size:1.2em;" action="client.php" id="tat" method="POST">
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

				<div class="form-group">
					<label for="">Tipul tehnicii</label>
					<select class="form-control" name="tehnica" id="tehnica">
						<?php
							$n = R::count('tehnica');
							for ($i=1; $i <=$n; $i++) {
								$tehnica = R::load('tehnica',$i);
								echo '<option value="'.$tehnica->id.'">'.$tehnica->denumire.'</option>';
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="">Marca tehnicii</label>
					<div id="_marca">
						<select name="marca" id="marca" class="form-control">
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="">Model tehnicii</label>
					<div id="_model">
						<select name="model" id="model" class="form-control">
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="">Tipul Servicilor</label>
					<div id="_servicii">
						<select name="tipservicii" id="tipservicii" class="form-control">
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="">Urgenta</label>
					<select name="urgenta" class="form-control">
						<?php
							$n = R::count('urgenta');

							for ($i=1; $i <=$n; $i++) {
								$urgenta = R::load('urgenta',$i);
								echo '<option value="'.$urgenta->urgenta.'">'.$urgenta->urgenta.'</option>';
							}
						?>
					</select>
				</div>
				<input type="submit" class="btn btn-primary" name="but" value="Trimite date">
			</form>
				<form style="display:inline;" id="left"  action="client.php" method="post">
					<input class="btn btn-default" type="submit" name="exit" value="Vihod">
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
</div>
</div>
<div id="footer"></div>

</body>

</html>

<?php
// nume tel adres tehnica marca model tipservicii urgenta
if (isset($_POST['but'])) {
	$find = R::find('users',
		' login=:login ',array(':login'=>$_SESSION['log']));

	$client = R::find('clienti',
			' id=:id ',array(':id'=>$find->client_id));

	$table = R::dispense('solicitari');

		$table->nume 		= $info[0] ;
		$table->tel         = $info[1] ;
		$table->adres       = $info[2] ;
		$table->tehnica     = $_POST['tehnica'] ;
		$table->marca       = $_POST['marca'] ;
		$table->model       = $_POST['model'] ;
		$table->tipservicii = $_POST['tipservicii'] ;
		$table->urgenta     = $_POST['urgenta'] ;
	R::store($table);
}


?>
