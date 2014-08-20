<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	if (session_status() !== PHP_SESSION_ACTIVE)
		session_start();

	$modules = [
		"files"		=> "Files",
		"inventory"	=> "Inventory",
		"logs"		=> "Logs",
		"meetings"	=> "Meetings",
		"news"		=> "News",
		"projects" 	=> "Projects",
		"renting" 	=> "Renting",
		"todo"		=> "Todo List"
	];

?>