<?php
	define('_IN_STATION_', true);
	
	require_once('Config.php');
	require_once('preload.php');
	session_start();
	
	$breakTime = $config['board']['breakTime'];
	
	$lastSubTime = $_SESSION['lastSubTime'];
	$_SESSION['lastSubTime'] = time();
	
	if ($_SERVER['REQUEST_METHOD'] != "POST")
		die();
	
	if ($_POST['type'] == 'login') {
		if ($_SESSION['isAdmin'])
			die('-500');
		
		if (empty($lastSubTime) || (time() - $lastSubTime) < $breakTime) 
			die('-100');
		
		if (empty($_SESSION['user']))
			die('-999');
		
		if (strlen($_SESSION['user']) !== $config['user']['hashLenth'])
			die('-999');
		
		if (empty($_POST['user']) || empty($_POST['password') || $_SESSION['user'] != $_POST['userhash'])
			die('-999');
		
		if ($_POST['user'] == $config['admin']['user'] && $_POST['password'] == $config['admin']['password'] && $_POST['userhash'] == $_SESSION['user']) {
			$_SESSION['isAdmin'] == true;
			echo '0';
			
		} else {
			die('-50');
		
		}
	}
?>