<?php
	require_once '../classes/head.class.php';
    require_once('../protected/required.php');

    require_once('../classes/manager/CampusManager.php');
    require_once('../classes/manager/FileManager.php');
    require_once('../classes/manager/ItemManager.php');
    require_once('../classes/manager/LogManager.php');
    require_once('../classes/manager/MeetingManager.php');
    require_once('../classes/manager/MeetingUserManager.php');
    require_once('../classes/manager/NewsManager.php');
    require_once('../classes/manager/NewsCommentManager.php');
    require_once('../classes/manager/PrivilegeManager.php');
    require_once('../classes/manager/ProjectManager.php');
    require_once('../classes/manager/ProjectCommentManager.php');
    require_once('../classes/manager/ProjectUserManager.php');
    require_once('../classes/manager/RentManager.php');
    require_once('../classes/manager/ToDoManager.php');
    require_once('../classes/manager/UserManager.php');

    require_once('../classes/manager/pdo/PdoCampusManager.php');
    require_once('../classes/manager/pdo/PdoFileManager.php');
    require_once('../classes/manager/pdo/PdoItemManager.php');
    require_once('../classes/manager/pdo/PdoLogManager.php');
    require_once('../classes/manager/pdo/PdoMeetingManager.php');
    require_once('../classes/manager/pdo/PdoMeetingUserManager.php');
    require_once('../classes/manager/pdo/PdoNewsManager.php');
    require_once('../classes/manager/pdo/PdoNewsCommentManager.php');
    require_once('../classes/manager/pdo/PdoPrivilegeManager.php');
    require_once('../classes/manager/pdo/PdoProjectManager.php');
    require_once('../classes/manager/pdo/PdoProjectCommentManager.php');
    require_once('../classes/manager/pdo/PdoProjectUserManager.php');
    require_once('../classes/manager/pdo/PdoRentManager.php');
    require_once('../classes/manager/pdo/PdoToDoManager.php');
    require_once('../classes/manager/pdo/PdoUserManager.php');
	

	$head = new head;
	$head->setTitle('SIS');
	$head->addStyleSheet(array(
		'http://fonts.googleapis.com/css?family=Lato:100,300,400',
		'../lib/bootstrap/css/bootstrap.min.css',
		'../styles/default.css'
	));