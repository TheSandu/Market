<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="Z:/home/sasa.md/www/CSS/css/bootstrap.css">
</head>
<style>
	h3,h6{
		display: inline;
	}
</style>
<body>
<div class="contain">
<div class="col-md-5">
	<h2>Calcul</h2>
		<form action="curs.php" method="POST">
			<div class="form-grup">	
				<p>
					
					<h3>U</h3>
					<h6>ies max</h6>
					<h3>(V)</h3>
				</p>
				<input type="text" name="Uiesmax">
			</div>
			<div class="form-grup">
				<p>
					<h3>R</h3>
					<h6>s</h6>
					<h3>(Ohm)</h3>
				</p>
				<input type="text" name="Rs">
			</div>
			<div class="form-grup">
				<p>
					<h3>F</h3>
					<h6></h6>
					<h3>(Hz)</h3>
				</p>
				<input type="text" name="F">
			</div>
			<div class="form-grup">
				<p>
					<h3>E</h3>
					<h6>c</h6>
					<h3>(V)</h3>
				</p>
				<input type="text" name="Ec">
			</div>
			<div class="form-grup">
				<p>
					<h3>M</h3>
					<h6></h6>
				</p>
				<input type="text" name="M">
			</div>
			<div class="form-grup">
				<p>
					<h3>I</h3>
					<h6></h6>
					<h3>(A)</h3>
				</p>
				<input type="text" name="I">
			</div>
			<div class="form-grup">
				<p>
					<h3>b</h3>
					<h6>min</h6>
				</p>
				<input type="text" name="bmin">
			</div>
			</div>
			<div class="form-grup">
				<p>
					<h3>b</h3>
					<h6>max</h6>
				</p>
				<input type="text" name="bmax">
			</div>
			<div class="form-grup">
				<p>
					<h3>I</h3>
					<h6>c min</h6>
					<h3>(A)</h3>
				</p>
				<input type="text" name="Icmin">
			</div>
			<div class="form-grup">
				<p>
					<h3>I</h3>
					<h6>c max</h6>
					<h3>(A)</h3>
				</p>
				<input type="text" name="Icmax">
			</div>
			<div class="form-grup">
				<p>
					<h3>U</h3>
					<h6>int m</h6>
					<h3>(V)</h3>
				</p>
				<input type="text" name="Uintm">
			</div>
			<input type="submit" name="but" value="Calculeaza">
		</form>
</div>
	<div class="col-md-5">
		<h2>Rezultat</h2>
<?php

function mesaj($nume1,$nume2,$val,$in)
{
	echo " 
	<div>
		<h3>".$nume1."</h3>";
			echo"<h6>".$nume2."</h6> = ".number_format($val, 4, '.', ' ')." ".$in."</div>";
}
$Uiesmax = $_POST['Uiesmax'];
$Ec = $_POST['Ec'];
$Rs = $_POST['Rs'];
$F = $_POST['F'];
$M = $_POST['M'];
$I = $_POST['I'];
$Icmin = $_POST['Icmin'];
$Icmax = $_POST['Icmax'];
$bmin = $_POST['bmin'];
$bmax = $_POST['bmax'];
$Uintm = $_POST['Uintm'];

if (isset($_POST['but'])) {

	$Uceadm = 1.3*$Ec;
	$Iceadm = ((2*$Uiesmax)/$Rs);
	$Urest = 1;
	$Ic0 = (1.2*$Uiesmax/$Rs);

	$Uce0 = $Uiesmax + $Urest;

	$Rcom = $Ec/$I;
	$Rc = $Rcom/1.25;
	$Re = 0.25*$Rc;

	$Iintmin = $Ibmin = $Icmin/$bmin;
	$Ibmin = $Icmin/$bmin;
	$Iintmax = $Ibmax = $Icmax/$bmin;
	$Iintm = $Ibm = ($Ibmax + $Ibmin)/2;

	$Rint = 2*$Uintm / (2*$Iintm) ;
	$R1_2 = 6*$Rint;
	$R1 = $Ec*$R1_2/($Re*$Ic0);
	$R2 = $R1*$R1_2/($R1-$R1_2);

	$S = ( $R3*( $R1+$R2 ) + $R1*$R2 ) / ($Re*($R1+$R2) + ($R1*$R2) / (1+$bmax) );

	$Ries = $Rc + $Rs;
	$C2 = 1 / ( 2 * pi() * $F * $Ries * sqrt(pow($M, 2) - 1) );
	$Ce = 10 / (2 * pi() * $F * $Re );

	$Ku = $Uiesmax/$Uintm;

	mesaj('U','ce amd',$Uceadm,'V');
	mesaj('I','c adm',$Iceadm,'A');
	mesaj('U','ce0',$Uce0,'V');
	mesaj('I','c0',$Ic0,'A');
	echo "<h3>P( ".$Uce0."V, ".number_format($Ic0, 2, '.', ',')."A)</h3>";
	mesaj('R','com',$Rcom,'Ohm');
	mesaj('R','c',$Rc,'Ohm');
	mesaj('R','e',$Re,'Ohm');
	mesaj('I','b min',$Ibmin,'A');
	mesaj('I','b max',$Ibmax,'A');
	mesaj('R','1-2',$R1_2,'Ohm');
	mesaj('R','int',$Rint,'Ohm');
	mesaj('R','1',$R1,'Ohm');
	mesaj('R','2',$R2,'Ohm');
	mesaj('S','',$R2,'');
	mesaj('C','2',$C2,'F');
	mesaj('C','3',$Ce,'F');
	mesaj('K','u',$Ku,'ori');

}
?>
</div>
</div>
</body>
</html>