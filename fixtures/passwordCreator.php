<?php
	
	require_once '../config.php';
	require_once '../includes/managers.php';
	require_once '../classes/PasswordHash.php';

	$clearPassword = "inactif";
	$hasedPassword = "";
	$clearPasswordLength = strlen($clearPassword);
	$hasedPasswordLength = 0;

	$hasher = new PasswordHash(8, FALSE);
	$hasedPassword = $hasher->HashPassword($clearPassword);
	$hasedPasswordLength = strlen($hasedPassword);

	echo nl2br("Clear Password : $clearPassword\n");
	echo nl2br("Clear Password Len : $clearPasswordLength\n");
	echo nl2br("Hashed Password : $hasedPassword\n");
	echo nl2br("Hashed Password Len: $hasedPasswordLength\n");