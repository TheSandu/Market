<?php
require '../config.php';
require '../proverca/proverca.php';
?>
<script src="../JS.util.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../CSS/css/bootstrap-theme.min.css">
<script src="../JS/bootstrap.min.js"></script>
<script src="../JS/npm.js"></script>
<?php

$admin = R::find('users','login=:login',array(':login'=>$_SESSION['log']));
if (reset($admin)->rol_id == 1) {

$find_users = R::find('users','login=:login',array(':login'=>$_POST['log']));
$id_client = reset($find_users)->clienti_id;
foreach ($find_users as $key => $value) {
  $id = trim($value->id);
  break;
}

$find_clienti = R::find('clienti','id=:id',array(':id' => $id_client ));
$find_rol = R::find('rol');
$rol_user = R::find('rol','id=:id',array(':id' => reset($find_users)->rol_id));

echo "<table class=table>";
echo "<tr>
        <td>".reset($find_clienti)->nume."</td>
        <td>".reset($find_clienti)->tel."</td>
        <td>".reset($find_clienti)->adresa."</td>
      </tr>";
echo "</table>";
}
?>
