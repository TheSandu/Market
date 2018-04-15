<?php
require '../config.php';
foreach ($_POST as $key1 => $value1) {
  $find  = R::find('users','login=:login',array(':login'=>$key1));
   foreach ($find as $key2 => $value2) {
     $value2->rol_id = $value1;
     R::store($value2);
   }

}
?>
