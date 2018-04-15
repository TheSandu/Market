<?php
require '../config.php';

	foreach ($_POST as $key => $value) {
			$change = R::load('solicitari', intval($key) );
				$change->statut = $value;
			R::store($change);
	}

?>