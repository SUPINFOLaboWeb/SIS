<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		<title><?php //printTitle(); ?></title>


		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
		<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../styles/default.css" rel="stylesheet">
	</head>

	<body>
	<div class="navbar navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">LIMA</a>
				<span class="navbar-brand campus"></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Settings</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-md-1 sidebar">
				<ul class="nav nav-sidebar">
					<li><a href="#" class="campusName" id="clermont">CLE</a></li>
					<li><a href="#" class="campusName" id="grenoble">GRE</a></li>
					<li><a href="#" class="campusName" id="marseille">MAR</a></li>
					<li><a href="#" class="campusName" id="montpellier">MON</a></li>
					<li><a href="#" class="campusName" id="nice">NIC</a></li>
				</ul>
			</div>
			<div class="col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-1 sidebar sidebarLinks">
				<ul class="nav nav-sidebar">
					<li><a href="#" class="sidebarLink" id="home">Dashboard</a></li>
					<li><a href="#" class="sidebarLink" id="log">Log</a></li>
					<li><a href="#" class="sidebarLink" id="projects">Projects</a></li>
					<li><a href="#" class="sidebarLink" id="todo">Todo List</a></li>
					<li><a href="#" class="sidebarLink" id="monitoring">Monitoring</a></li>
					<li><a href="#" class="sidebarLink" id="inventory">Inventory</a></li>
					<li><a href="#" class="sidebarLink" id="renting">Renting</a></li>
					<li><a href="#" class="sidebarLink" id="members">Members</a></li>
				</ul>
			</div>