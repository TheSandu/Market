<?php

require 'config.php';
// require 'proverca/pro_inginer.php';
// echo "<script src='JS/jquery-3.1.1.js' ></script><script src='JS/script.js'>";

$find = R::find('users',
	' login=:login ',array(':login'=>$_SESSION['log']));
foreach ($find as $key => $value) {
	$id_client = $value->clienti_id;
	$id_users = $value->id;
		$client = R::find('clienti',
				' id=:id ',array(':id'=>$value->clienti_id));
				break;
}

/////////////////////
if($_POST['cautare'] != ''){

				$num = R::count('solicitari');
echo '<table class="table">
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
						<tbody>';
				for ($i=1; $i <= $num; $i++) {

				$rez = R::load('solicitari',$i);
if( strpos($rez->nume,$_POST['cautare']) !==false ){
				echo '<tr>';
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
								}
				}
				echo "</tr></tbody></table>";
}
else{
	$num = R::count('solicitari');
echo '<table class="table">
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
						<tbody>';
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
									<button type=submit id='but".$i."' class='collapse sets btn btn-info' style='width:100%;'>SET</button>
								</td>";
					}

					else{
						echo "<td>".$value."</td>";
					}
				}
				echo "</tr>";
				}
}
/////////////////////

?>
