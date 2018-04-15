<?php

require 'config.php';
require 'proverca.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrator</title>
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet"> 
	<script src="JS/jquery-3.1.1.js" ></script>
	<link rel="stylesheet" href="CSS/css.css">
</head>
<body>
<div id="header">
<!-- 	<a href="client.php">Client</a>
	<a href="inginer.php">Inginer</a>
	<a href="admi.php">Administrator</a> -->
</div>
<div id="contain">
	<form action="admi.php" method="POST">
		
		<table>
				<tr> 
					<td class="title">ID</td> 
					<td class="title">Numele,Prenumele</td> 
					<td class="title">Telefon</td>
					<td class="title">Adresa</td>
					<td class="title">Ce fel de dispozitiv</td>
					<td class="title">Model</td>
					<td class="title">Marca</td>
					<td class="title">Tipul problemei</td>
					<td class="title">Urgenta</td>
					<td class="title">Statutul</td>
				</tr>
		<?php 

		$num = R::count( 'test');//Aflam numarul de rinduri

for ($i=1; $i <=$num ; $i++) { 

		$haha = R::load( 'test',$i);//se incarca pentru fiecare rind

		echo '<tr>';
		foreach ($haha as $key => $value) {//pentru fiecare cimp se afisaza valoarea de $num ori
			if ($value == 'Urgent') {
				echo ' 
					<td style="background-color:red;"'.$value.'</td>';
			}
			elseif ($value == 'Nu e urgent') {
				echo ' 
					<td style="background-color:green;">'.$value.'</td>';
			}
			else echo ' 
					<td>'.$value.'</td>';

		}
		echo '</tr>';
	
}
	 ?>
</table>
<hr color=red>
<table>
	<tr>
		<td><input type="submit" name="del_info" value="Sterge"></td>
		<!-- Sterge informatia dupa numarul de identificare -->
		<td><input type="text" name='del_text'></td>

	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="del_all" value="Nuke"></td>
		<!-- sterge tat -->
	</tr>

	<tr>
		<td><input type="submit" name="add_column" value="Adauga in cerere"></td>
		<!-- Adauga in la lista cerintelor catre client -->
		<td><input type="text" name="column_text"></td>
	</tr>

	<tr>
		<td><input type="submit" name="corzina" value="Corzina"></td><td><input type="submit" name="de_corz" value="Sterge din Corzina"></td>
	</tr>
</table>

	</form>
</div>

<div id="footer"></div>

</body>
</html>

<?php
//SE INTRODUCE TOATE DATELE STERSE LA NUKE
	if (isset($_POST['del_all'])) {

		$num = R::count( 'test');

	for ($i=1; $i <=$num ; $i++) {
			$sters = R::dispense('sters');
			$haha = R::load( 'test',$i);//se incarca pentru fiecare rind "$i"
				foreach ($haha as $key => $value) {//pentru fiecare cimp se afisaza valoarea de "$num" ori
				if($key !='id'){
					$sters->$key = $value;
				}
			}
	$proverca = R::store( $sters );
					if ($proverca == true) {

						echo 'Totate datele sterse a fost salvate haha...';

						echo "So sters!!Maladet";
					}
	}	
			R::wipe( 'test' );
}
//INTRODUCE IN TABLITA CU DATE STERSE UN SINGUR RIND
	if (isset($_POST['del_info'])) {
		$ghena = R::load( 'test',intval($_POST['del_text']) );
		$sters = R::dispense('sters');
		foreach ($ghena as $key => $value) {//pentru fiecare cimp se afisaza valoarea de $num ori

				if($key !='id'){
					$sters->$key = $value;
				}




		R::trash( $ghena );	

		}
		$proverca = R::store( $sters );
			if ($proverca == true) {

				echo 'Totate datele sterse a fost salvate haha...';
			}
	}
//AFISHAREA LA APASARE DE BUTON
	if(isset($_POST['corzina'])){ 
		$num = R::count( 'sters');//Aflam numarul de rinduri
echo "<table>";
for ($i=1; $i <=$num ; $i++) { 

		$musor = R::load( 'sters',$i);//se incarca pentru fiecare rind

		echo '<tr>';
		foreach ($musor as $key => $value) {//pentru fiecare cimp se afisaza valoarea de $num ori
			if ($value == 'Urgent') {
				echo ' 
					<td style="background-color:red;"'.$value.'</td>';
			}
			elseif ($value == 'Nu e urgent') {
				echo ' 
					<td style="background-color:green;">'.$value.'</td>';
			}
			else {echo ' 
								<td>'.$value.'</td>';}

		}
		echo '</tr>';
		
	}
	echo "</table>";
}
if(isset($_POST['de_corz'])){
	R::wipe( 'sters' );
}
if (isset($_POST['add_column'])) {
	
	$add = R::dispense('test');
	$add->$_POST['column_text'];
	$proverca = R::store( $add );

	if ($proverca == true) {

		echo 'Totate datele sterse a fost salvate haha...';
	}
}
?>