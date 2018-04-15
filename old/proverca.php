<?php 
session_start();
if (isset($_SESSION['stats']) ) {
	if (!isset($_SESSION['client'])) {
		header('Location: http://sasa.md/index.php');
	}
}

?>