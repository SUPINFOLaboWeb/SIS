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

					$pdoCampusManager 		= new PdoCampusManager;
					$pdoPrivilegeManager 	= new PdoPrivilegeManager;

					$_SESSION['user']['idBooster'] 	= $user->getIdBooster();
					$_SESSION['user']['firstName'] 	= $user->getFirstname();
					$_SESSION['user']['lastName']	= $user->getLastname();
					$_SESSION['user']['campusId']	= $user->getCampusId();
					
					$_SESSION['user']['campusName']	= $pdoCampusManager
														->getCampus($user->getCampusId())
														->getCampusName();

					$_SESSION['user']['privilege']	= $pdoPrivilegeManager
														->getPrivilege($user->getPrivilegeId())
														->getPrivilegeName();

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