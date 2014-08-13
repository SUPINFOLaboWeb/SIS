<?php

	require '../config.php';
	require '../includes/dataBaseConnector.php';

	$campus = $_POST['campus'];

	if (!isset($campus))
		$campus = $_COOKIE['defaultCampus'];






	$requete = $db->prepare('SELECT * FROM projects WHERE campus_id = :campus OR campus_id = "" ORDER BY progress DESC');
	$requete->execute(array(
		'campus' => strtoupper($campus)
	));

	while ($resultat = $requete->fetch()) {
		if ($resultat) {
			echo '
				<div class="panel-heading">
					<h3 class="panel-title">#' . $resultat['id'] . ' ' . $resultat['name'] . '</h3>
				</div>
				<div class="panel-body">
				 	' . $resultat['description'] . '
				</div>
			</div>
			';
		}
	}

	$requete->closeCursor();


?>