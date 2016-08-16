<?php
$req = $bddConnection->prepare('UPDATE cmw_maintenance SET maintenanceEtat = :maintenanceEtat WHERE maintenanceId = :maintenanceId');
$req->execute(array (
	'maintenanceEtat' => $_POST['maintenanceEtat'],
	'maintenanceId' => $_GET['maintenanceId'],
	))
?>