<?php
	define('_IN_STATION_', true);
	
	require_once('Config.php');
	require_once('preload.php');
	session_start();
	
	$breakTime = 1; // 考虑到编辑站点信息的频繁性，这里使用较短的提交间隔
	
	$lastSubTime = $_SESSION['lastSubTime'];
	$_SESSION['lastSubTime'] = time();
	
	if ($_SERVER['REQUEST_METHOD'] != "POST")
		die();
	
	if (empty($lastSubTime) || (time() - $lastSubTime) < $breakTime) 
		die('-100');
	
	if (empty($_SESSION['user']) || empty($_POST['userhash']))
		die('-999');
	
	if (strlen($_SESSION['user']) !== $config['user']['hashLenth'])
		die('-999');
	
	if ($_SESSION['user'] !== $_POST['userhash'])
		die('-999');
	
	if ($_POST['type'] == 'login') {
		if ($_SESSION['isAdmin'])
			die('-500');
		
		if (empty($_POST['user']) || empty($_POST['password']))
			die('-202');
		
		if ($_POST['user'] == $config['admin']['user']) {
			if ($config['admin']['ismd5'] && md5($_POST['password'], false) == $config['admin']['password']) {
				$_SESSION['isAdmin'] = true;
				echo '0';
				
			} elseif (!$config['admin']['ismd5'] && $_POST['password'] == $config['admin']['password']) {
				$_SESSION['isAdmin'] = true;
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
		
		if (empty($_POST['data']))
			die('-999');
		
		$obj = json_decode($_POST['data'], true);
		$return = 0;
		
		if(count($obj) != 7)
			die('-200');
		
		$db->where('config', 'sitename');
		if (!$db->update('config', Array('value' => $obj['sitename'])))
			$return -= 10;
		
		$db->where('config', 'sitekeywords');
		if (!$db->update('config', Array('value' => $obj['sitekeywords'])))
			$return -= 20;
		
		$db->where('config', 'sitedescription');
		if (!$db->update('config', Array('value' => $obj['sitedescription'])))
			$return -= 30;
		
		$db->where('config', 'siteauthor');
		if (!$db->update('config', Array('value' => $obj['siteauthor'])))
			$return -= 40;
		
		$db->where('config', 'sitenotice');
		if (!$db->update('config', Array('value' => $obj['sitenotice'])))
			$return -= 50;
		
		$db->where('config', 'siteabout');
		if (!$db->update('config', Array('value' => $obj['siteabout'])))
			$return -= 60;
		
		$db->where('config', 'sitefooter');
		if (!$db->update('config', Array('value' => $obj['sitefooter'])))
			$return -= 70;
		
		echo $return;
		
	} elseif ($_POST['type'] == 'media') {
		if (!$_SESSION['isAdmin'])
			die('-500');
		
		if (!isset($_POST['do']))
			die('-999');
			
		if ($_POST['do'] == 0) {
			if (empty($_POST['mediaid']))
				die('-999');
			
			$db->where('id', $_POST['mediaid']);
			$mediaNow = $db->getOne('data');
			
			if ($mediaNow) {
				$return = array(
					'id'   => $mediaNow['id'],
					'name' => $mediaNow['name'],
					'url'  => $mediaNow['url']
				);
				
				echo json_encode($return);
			} else {
				die('-50');
				
			}
			
		} elseif ($_POST['do'] == 1) {
			if (empty($_POST['name']) || empty($_POST['url']))
				die('-999');
			
			$value = Array(
				'name' => htmlspecialchars(stripslashes(trim($_POST['name']))),
				'url' => htmlspecialchars(stripslashes(trim($_POST['url'])))
			);
			if ($db->insert('data', $value))
				echo 'success';
			else
				echo 'failed';
			
		} elseif ($_POST['do'] == 2) {
			if (!isset($_POST['mediaid']) || empty($_POST['name']) || empty($_POST['url']))
				die('-999');
			
			$db->where('id', htmlspecialchars(stripslashes(trim($_POST['mediaid']))));
			if ($db->update('data', Array(
				'name' => htmlspecialchars(stripslashes(trim($_POST['name']))),
				'url'  => htmlspecialchars(stripslashes(trim($_POST['url']))))
			))
				echo 'success';
			else
				echo 'failed';
		}
		
	} else {
		die();
		 
	}
?>
