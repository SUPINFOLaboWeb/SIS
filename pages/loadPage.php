<?php
	
	require '../config.php';

	$campus = strtolower(htmlspecialchars($_POST['campus']));

	switch ($_POST['page']) {	
		case 'files' :
			require 'files.php';
			break;

		case 'inventory' :
			require 'inventory.php';
			break;

		case 'logs' :
			require 'logs.php';
			break;

		case 'meetings' :
			require 'meetings.php';
			break;

		case 'news' :
			require 'news.php';
			break;

		case 'projects' :
			require 'projects.php';
			break;

		case 'renting' :
			require 'renting.php';
			break;

		case 'todo' :
			require 'todo.php';
			break;

		default:
			require "news.php";
			break;
	}

?>