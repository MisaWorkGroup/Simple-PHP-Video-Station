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
		
		if ($_POST['user'] == $config['admin']['user'] && $_POST['userhash'] == $_SESSION['user']) {
			if ($config['admin']['ismd5'] && $_POST['password'] == md5($config['admin']['password'], false)) {
				$_SESSION['isAdmin'] == true;
				echo '0';
				
			} elseif (!$config['admin']['ismd5'] && $_POST['password'] == $config['admin']['password']) {
				$_SESSION['isAdmin'] == true;
				echo '0';
				
			} else {
				die('-50');
			
			}
		} else {
			die('-50');
		
		}
		
	} elseif ($_POST['type'] == 'global') {
		if (!$_SESSION['isAdmin'])
			die('-500');
		
		if (empty($_POST['name']) || empty($_POST['content']))
			die('-999');
		
		$db->where('config', htmlspecialchars(stripslashes(trim($_POST['name']))));
		if ($db->updata('config', Array('value' => $_POST['content']))
			echo 'success';
		else
			echo 'failed';
		
	} elseif ($_POST['type'] == 'media') {
		if (!$_SESSION['isAdmin'])
			die('-500');
		
		if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['url']) || empty($_POST['do']))
			die('-999');
		
		if ($_POST['do'] == 1) {
			
		} elseif ($_POST['do'] == 2) {
			
		}
		
	} else {
		die();
		 
	}
?>