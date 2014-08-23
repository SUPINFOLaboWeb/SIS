<?php
	require_once '../config.php';
	require_once '../includes/managers.php';

	$newsManager = new PdoNewsManager;

	echo 'Loading News';

	$news = $newsManager->getNews();

	print_r($news);
?>