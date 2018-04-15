<?php
require 'config.php';
echo "<select name='tipservicii' class='form-control' id='tipservicii'>";
$id = $_POST['tehnica'];
$rez = R::find('tipservicii',
        ' tehnica_id = :tehnica_id',
            array(
                ':tehnica_id'=>$id,
            )
        );
foreach ($rez as $key => $value) {
	echo '<option value='.$value->id.'>'.$value->tip.'</option>';
}
echo "</select>";
?>
