<?php

	require '../config.php';
	require '../includes/dataBaseConnector.php';

	$campus = $_POST['campus'];

	if (!isset($campus))
		$campus = $_COOKIE['defaultCampus'];

	echo '
	<div class="todo panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"></h3>
			<input class="form-control" type="text" id="name" name="name" placeholder="Write the name here..."/>
		</div>
		<div class="panel-body">
			<textarea class="form-control" type="text" id="content" name="content" placeholder="Description..."></textarea>
		</div>
		<div class="panel-footer">
			<button type="button" class="btn btn-info createTodo">Create</button>
		</div>
	</div>
	';

	$requete = $db->prepare('SELECT * FROM logs WHERE campus = :campus OR campus = "" ORDER BY isDone ASC');
	$requete->execute(array(
		'campus' => strtoupper($campus)
	));

	while ($resultat = $requete->fetch()) {
		if ($resultat) {
			if ($resultat['isDone'] == 1)
				echo '<div class="todo panel panel-success" id="' . $resultat['id'] . '">';
			else
				echo '<div class="todo panel panel-default" id="' . $resultat['id'] . '">';

			echo '
				<div class="panel-heading">
					<h3 class="panel-title">#' . $resultat['id'] . ' ' . $resultat['name'] . '</h3>
				</div>
				<div class="panel-body">
				 	' . $resultat['content'] . '
				</div>
				<div class="panel-footer">
					<div class="btn-group">
						<button type="button" class="btn btn-success">Achieve !</button>
						<button type="button" class="btn btn-danger">Delete</button>
					</div>
				</div>
			</div>
			';
		}
	}

	$requete->closeCursor();
?>