<?php 
session_start();
if (isset($_SESSION['stats']) ) {
	if (!isset($_SESSION['client']) && !isset($_SESSION['admin']) && !isset($_SESSION['inginer'])) {
		header('Location: http://sasa.md/index.php');
	}
}

?>