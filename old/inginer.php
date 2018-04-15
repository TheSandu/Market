<?php

require 'config.php';
require 'proverca.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inginer</title>
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
	<form action="inginer.php" method="POST">
		
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
			
			if($value == 'Urgent'){
				echo ' 
					<td style="background-color:red;">'.$value.'</td>';
			}
			elseif($value == 'Nu e urgent'){
				echo ' 
				<td style="background-color:green;">'.$value.'</td>';
			}
			else{
				echo ' 
				<td>'.$value.'</td>';
			}
		}
	
}
echo '</table><hr color=red><table></tr>
		<tr>
		<td> <input type="submit" name="change" value="Schimba"> </td><td><input type="text" name="id" placeholder="Id"><input type="text" name="stats" placeholder="Statutul"> </td>
		</tr>';
	 ?>
		</table>

	</form>
</div>
<?php 

if (isset($_POST['change'])) {

	$jora = R::load( 'test',intval($_POST['id']) );

	$jora->statut = $_POST['stats'];
		$proverca = R::store( $jora );
}
 ?>
<div id="footer"></div>

</body>
</html>
<!-- 
		// 	foreach ($jora as $key => $value) {//pentru fiecare cimp se afisaza valoarea de $num ori
		// 		if ($value == 'Reparat') {
		// 			echo '<br>$jora['.$key.']='.$value.'<br>';
		// 		}
		// 	echo '
		// 			<td>'.$key.'-'.$value.'</td>';

		// }$_POST['stats'] -->