<?php
	require_once '../config.php';
	require_once '../includes/managers.php';

	$newsManager = new PdoNewsManager;

	echo 'Loading News';
?>