<?php
	try {
		$db = new PDO('mysql:host=localhost;dbname=seic', 'root', '');
		$db->exec("set names UTF8");
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}