<?php
	
	require_once '../config.php';
	require_once '../includes/managers.php';
	require_once '../classes/PasswordHash.php';

	if (isset($_POST['idBooster']) && isset($_POST['password'])) {
		
		$idBooster 	= htmlspecialchars($_POST['idBooster']);
		$password	= $_POST['password'];

		$pdoUserManager = new PdoUserManager;
		$users = $pdoUserManager->getUsers();

		$hasher = new PasswordHash(8, FALSE);

		// A revoir : boucle for(each) non optimale pour une recherche

		foreach ($users as $user) {
			if (($idBooster == $user->getIdBooster()) && ($hasher->CheckPassword($password, $user->getPassword()))) {
				
				if ($user->getPrivilegeId() != 4) {
					header('Location: home.php') or die();
				} else {
					header('Location: login.php?erno=3') or die();
				}
			}
		}

		header('Location: login.php?erno=2') or die();

	} else {
		header('Location: login.php?erno=1') or die();
	}

?>