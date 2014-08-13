<?php

	require '../config.php';
	require '../includes/dataBaseConnector.php';

	switch ($_POST['action']) {
		case 'create':
			$requete = $db->prepare('INSERT INTO todo(name, content, campus, isDone) VALUES(:name, :content, :campus, 0)');
			$requete->execute(array(
				'campus' 	=> $_POST['campus'],
				'content' 	=> $_POST['content'],
				'name' 		=> $_POST['name']
			));
			break;
		
		default:
			break;
	}
?>