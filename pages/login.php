<?php
	require_once '../config.php';
	require_once '../includes/head.php';

	$head->addStyleSheet('../styles/login.css');
	$head->printHead();
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap">
				<p class="form-title">Sign In</p>
				<form class="login" action="authentication.php" method="POST">
				
				<?php
				if (isset($_GET['erno'])) {
					switch ($_GET['erno']) {
						case '1':
							$alertText = "No credentials provided !";
							break;

						case '2':
							$alertText = "Login or Password incorrect !";
							break;

						case '3':
							$alertText = "You're not allowed !";
							break;
						
						default:
							break;
					}

					if (isset($alertText)) {
						echo '
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								' . $alertText . '
							</div>
						';
					}
				}

				?>

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