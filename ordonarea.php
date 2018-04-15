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
?>
<script src='/JS/jquery-3.1.1.js'></script>
<script src='/JS/script.js'></script>
<?php
/////////////////////
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
  <tbody id=tbody>';
  if ( !isset($_POST['ord']) ) {
    $ordonare = '';
  }
  else {
    $ordonare = $_POST['ord'];
  }
	$i = 0;
  $rez = R::findAll( 'solicitari' , ' ORDER BY nume '.$ordonare.'' );
  foreach ($rez as $key => $value)
  {
		$i++;
    echo "<tr>";
    echo "
    <td>".$i."</td>
    <td>".$value->nume."</td>
    <td>".$value->tel."</td>
    <td>".$value->adres."</td>
    ";
    $tehnica = R::find('tehnica','id =:id',array(':id' => $value->tehnica));
      echo '<td>'.$tehnica[$value->tehnica]->denumire.'</td>';
    $marca = R::find('marca','id =:id',array(':id' => $value->marca));
      echo '<td>'.$marca[$value->marca]->denumire.'</td>';
    $model = R::find('model','id =:id',array(':id' => $value->model));
      echo '<td>'.$model[$value->model]->denumire.'</td>';
    $tip_servicii = R::find('tipservicii','id =:id',array(':id' => $value->tipservicii));
      echo '<td>'.$tip_servicii[$value->tipservicii]->tip.'</td>';
    $urgenta = R::find('urgenta','id =:id',array(':id' => $value->urgenta));
      echo '<td>'.$urgenta[$value->urgenta]->urgenta.'</td>';


			$statut = R::find('statut',
				' id=:id ',array(':id'=>$value->statut));
			echo "<td>";

				echo "
				<div data-toggle='collapse' data-target='#sel".$i.",#but".$i."'>";
							echo $statut[$value->statut]->tip;
									echo "
				</div>";

			$statut = R::find('statut');

					echo "
					<select name=".$i." id='sel".$i."' class='collapse form-control'>";
			foreach ($statut as $key => $value) {
							echo "
						<option value=".$value->id.">".$value->tip."</option>";
			}
					echo "
					</select>
					<button type=submit id='but".$i."' class='collapse sets btn btn-info'>SET</button>
					</td>";


    echo "</tr>";

  }
/////////////////////
?>
