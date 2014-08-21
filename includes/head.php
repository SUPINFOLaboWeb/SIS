<?php
	require_once '../classes/Head.class.php';
	
	$head = new head;
	$head->setTitle('SIS');
	$head->addStyleSheet(array(
		'http://fonts.googleapis.com/css?family=Lato:100,300,400',
		'../lib/bootstrap/css/bootstrap.min.css',
		'../styles/default.css'
	));