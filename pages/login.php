<?php
	require_once '../config.php';
	require_once '../includes/head.php';

	$head->addStyleSheet('../styles/login.css');
	$head->printHead();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap">
				<p class="form-title">Sign In</p>
				<form class="login" action="authentication.php" method="POST">
					<input type="text" placeholder="Username" name="idBooster" />
					<input type="password" placeholder="Password" name="password" />
					<input type="submit" value="Sign In" class="btn btn-success btn-sm" />
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	require '../includes/footer.php';
?>