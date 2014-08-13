<?php
	
	require '../config.php';

	switch ($_POST['page']) {
		case 'dashboard' :
			require "home.php";
			break;
	
		case 'log' :
			require "log.php";
			break;
			
		case 'projects' :
			require "projects.php";
			break;
			
		case 'todo' :
			require "todo.php";
			break;
			
		case 'monitoring' :
			require "monitoring.php";
			break;
			
		case 'inventory' :
			require "inventory.php";
			break;
			
		case 'renting' :
			require "renting.php";
			break;
			
		case 'members' :
			require "members.php";
			break;
		
		default:
			require "home.php";
			break;
	}

?>