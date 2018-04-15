<?php
require 'config.php';

$id = intval($_POST['tehnica']);

$rez = R::find('marca',
	' tehnica_id = :tehnica_id',
	array(
		':tehnica_id'=>$id,
		)
	);

echo "<select name='marca' class='form-control' id='marca'>";
foreach ($rez as $key => $value) {
	echo '<option value='.$key.'>'.$value->denumire.'</option>';
}
echo "</select>";
?>
