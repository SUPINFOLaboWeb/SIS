<?php

	ob_start();

	header('Status: 301 Moved Permanently', false, 301);
	//header("Location: pages/login.php");

	// Pendant la phase de developpement seulement :
	header("Location: pages/news.php");

	ob_end_flush();
	exit();
?>