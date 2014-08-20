<?php
	
	require_once '../config.php';
	require_once '../includes/managers.php';

	if (isset($_POST['idBooster']) && isset($_POST['password'])) {
		
		$idBooster 	= htmlspecialchars($_POST['idBooster']);
		$password	= $_POST['password'];

		$pdoUserManager = new PdoUserManager;
		$users = $pdoUserManager->getUsers();


	} else {

	}

?>