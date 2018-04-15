<?php
require 'config.php';
require 'proverca\proverca.php';
$find = R::find('users',
	' login=:login ',array(':login'=>$_SESSION['log']));
foreach ($find as $key => $value) {
	$id_client = $value->clienti_id;
	$id_users = $value->id;
	$rol = $value->rol_id;
		$client = R::find('clienti',
				' id=:id ',array(':id'=>$value->clienti_id));
				break;
}
if (isset($_GET['button'])) {
	$value->online = 0;
	R::store($value);
	session_unset();
	header("Location:http://sasa.md/index.php");
}
?>
<!DOCTYPE html>
<html lang="en" style="height:100%;width: 100%;">
<head>
	<meta charset="UTF-8">
	<title>Online Repair</title>
	<script src="JS/jquery-3.1.1.js" ></script>
	<script src='JS/admin.js'></script>
	<script src="JS/script.js"></script>
	<link rel="stylesheet" href="../CSS/css.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/css/bootstrap-theme.min.css">
	<script src="JS/bootstrap.min.js"></script>
	<script src="JS/npm.js"></script>
</head>
<body style="height:100%;width: 100%;">
<div  id="container-fluid" style="height:100%;">
	<div class="col-md-2 col-lg-2 col-xs-2" style="padding:0;background-color:#222062;height:100%;color:#fff;" >
		<div class="list">
			<img src="/IMG/index.png">
			<ul>
				<li class="list-menu" id="profil">Profile</li>
				<?php if ($rol == 2) {?><li class="list-menu" id="inscriere">Inscriere</li><?php } ?>
				<?php if ($rol == 3 || $rol == 1) {?><li class="list-menu" id="inscrieri">Inscrierele</li><?php } ?>
				<li class="list-menu" id="settings">Settings</li>
				<?php if ($rol == 1) {?><li class="list-menu" id="user_info">Info utilizatorir</li><?php } ?>
				<?php if ($rol == 1) {?><li class="list-menu" id="add_base" >Adauga in baza</li><?php } ?>
				<li class="list-menu">
					<form action=page.php>
						<input style="background:none;border:none;" value="Exit" id="exit" type="submit" name="button">
					</form>
				</li>
			</ul>
		</div>
	</div>
		<!-- Inscriere -->
	<div style="display:none; height: 100%" class="col-md-4" id="page2">
		<form style="display:inline; font-size:1.2em;" action="page.php" id="tat" method="POST">
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
				<label for="tehnica">Tipul tehnicii</label>
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
				<label for="marca">Marca tehnicii</label>
				<div id="_marca">
					<select name="marca" id="marca" class="form-control">
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="model">Model tehnicii</label>
				<div id="_model">
					<select name="model" id="model" class="form-control">
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="tipservicii">Tipul Servicilor</label>
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
							echo '<option value="'.$urgenta->id.'">'.$urgenta->urgenta.'</option>';
						}
					?>
				</select>
			</div>
			<input type="submit" class="btn btn-primary" name="but" value="Trimite date">
		</form>
	</div>

		<!-- Inscrieri -->
	<div class="col-md-9" style="display:none;" id="page3">
		<div class="col-md-8" style="margin-top:10px;">
						<form action="page.php" method="post" id="caut_form">
							<div class="form-group form-inline">
								<label>Cautare</label>
								<input class="form-control" type="text" name="cautare" id='caut_input' placeholder="Iuntroduce">
								<input class="btn btn-primary" type="button" name="caut_but" id="caut_but" value="Cauta">
								<input class="btn btn-default ord_but" type="button" value="ASC">
								<input class="btn btn-default ord_but" type="button" value="DESC">
							</div>
						</form>
		</div>
		<div class="form-group">
						<form action="page.php" method="POST">
						<div id="tablea">
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
								<tbody id=tbody>
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
											<button type=submit id='but".$i."' class='sets collapse btn btn-info'>SET</button>
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
							</div>
						</form>
		</div>
	</div>
		<!-- Profil -->
	<div class="col-md-4" style="font-size:1.2em;" id="page1">
		<form action="page.php" method="post">
			<div class="form-group">
				<label for="">Nmele Prenumele</label>

												<?php
												foreach ($client as $key => $value) {
													echo $value->nume."<br>";
													break;
												}
												?>
			</div>
			<div class="form-group">
				<label for="">Numarul de telefon</label>
					<?php
						foreach ($client as $key => $value) {
							echo $value->tel."<br>";
							break;
						}
					?>
			</div>
			<div class="form-group">
				<label for="">Adresa</label>
					<?php
						foreach ($client as $key => $value) {
							echo $value->adresa;
							break;
						}
					?>
			</div>
		</form>
	</div>
		<!-- Setari -->
	<div class="col-md-4" style="display:none;font-size:1.2em;" id="page4">
			<form action="page.php" method="post">
				<div class="form-group">
					<label >Numele Prenumele</label>
					<input class="form-control" type="text" name="insc_nume" placeholder="Schimba numele">
				</div>
				<div class="form-group">
					<label >Numarul de telefon</label>
					<input class="form-control" type="text" name="insc_tel" placeholder="Schimba nr. de telefon">
				</div>
				<div class="form-group">
					<label >Adresa</label>
					<input class="form-control" type="text" name="insc_adresa" placeholder="Schimba Adresa">
				</div>
				<div class="form-group">
					<label >Login</label>
					<input class="form-control" type="text" name="insc_log" placeholder="Shimba Login">
				</div>
				<div class="form-group">
					<label >Parola</label>
					<input class="form-control" type="password" name="insc_pass" placeholder="Shimba parola">
				</div>
				<input class="btn btn-primary" type="submit" name="insc_but" value="Inregistrare">
			</form>

			<?php

				if ( isset($_POST['insc_but']) ) {
					 $insc_cl = R::load('clienti',intval($id_client));
					 $insc_ut = R::load('users',intval($id_users));

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

					if ($_POST['insc_pass']!="") {
						$insc_ut->pass = $_POST['insc_pass'];
					}
					 R::store($insc_cl);
					 R::store($insc_ut);
				}

			?>
	</div>
		<!-- Utilizatori -->
	<div class="col-md-9" style="display:none;margin:10px;" id="page5" >
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="paddinger">Utilizatorii</h4></div>
				<div class="panel-body">
			        <div class="list-group col-md-12">
						<div class="inline list-group-item" id='utizilatori'>
							Utilizatori
						</div>
						<div class="inline list-group-item" id="online">
							Utilizatori Online
						</div>
					</div>
				</div>
			</div>
	</div>
		<!-- Adauga in baza -->
	<div class="col-md-9" style="display:none;margin:10px;" id="page6" >
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="paddinger">Adaugari</h4></div>
				<div class="panel-body">
					<div class="list-group    col-md-12">
						<div class="inline list-group-item" id="add_rol">
							Adauga Rol
						</div>
						<div class="inline list-group-item" id="add_tehnica">
							Adauga Tehnica
						</div>
						<div class="inline list-group-item" id="add_marca">
							Adauga Marca
						</div>
						<div class="inline list-group-item" id="add_servicii">
							Adauga Servicii
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
</div>
</body>
</html>
<!-- Rol -->
<?php
// nume tel adres tehnica marca model tipservicii urgenta
if (isset($_POST['but'])) {
	$find = R::find('users',
		' login=:login ',array(':login'=>$_SESSION['log']));

	$client = R::find('clienti',
			' id=:id ',array(':id'=>$find->client_id));

	$table = R::dispense('solicitari');
		$table->nume 		    = $info[0] ;
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
