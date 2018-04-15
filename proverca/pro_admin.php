<?php

if (!isset($_SESSION['admin'])) {
	header('Location: http://sasa.md/index.php');
}

?>