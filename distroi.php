<?php

require '../www/config.php';
$num = R::count('users');
for ($i=1; $i <= $num; $i++) { 
	$online = R::load('users',$i);
	$online->online = 0;
	R::store($online);

}
echo "Paca";
session_unset();

?>