<?php
require 'config.php';
echo "<select name='model' class='form-control' id='model'>";
$id = intval($_POST['marca']);
$rez = R::find('model',
        ' marca_id = :marca_id',
            array(
                ':marca_id'=>$id,
            )
        );
foreach ($rez as $key => $value) {
	echo '<option value='.$key.'>'.$value->denumire.'</option>';
}
echo "</select>";
?>
