<?php
	require_once '../config.php';
	require_once '../includes/managers.php';
	require_once '../includes/head.php';

	$head->printHead();

	require_once '../includes/navbar.php';
	require_once '../includes/sidebar.php';
?>

	
	<div class="col-sm-7 col-sm-offset-5 col-md-9 col-md-offset-3 main">
	<?php
		echo $_SESSION['user']['idBooster'];
		echo $_SESSION['user']['firstName'];
		echo $_SESSION['user']['lastName'];
		echo $_SESSION['user']['campusId'];

		//echo $_SESSION['user']['campusName'];
		//echo $_SESSION['user']['privilege'];
	?>
	</div>


<?php
	require '../includes/footer.php';
?>