<?php
	define('_IN_STATION_', true);
	
	$media = array();
	require_once('data/Config.php');
	$global['mod'] = 'media';
	require_once('data/preload.php');
	
	session_start();
	if (empty($_SESSION['user']) || (time() - $_SESSION['lastSubTime']) > $config['user']['hashEffectiveTime'])
		$_SESSION['user'] = rand_string($config['user']['hashLenth']);
	
	if (!isset($_SESSION['lastSubTime']))
		$_SESSION['lastSubTime'] = time();
	
	
	$media['now']['id'] = $_GET['id'];
	$media['now']['id'] = (int)$media['now']['id'];
	
	if ($media['now']['id'] > 0){
		$db->where('id', $media['now']['id']);
		$media['now'] = $db->getOne('data');
		$media['now']['title'] = $media['now']['name'];
		
		if (!empty($media['now']['id'])) {
			$media['pre'] = $db->rawQueryOne('SELECT * FROM data WHERE id = (SELECT id FROM data WHERE id < ' . $media['now']['id'] . ' ORDER BY id DESC LIMIT 1)');
			$media['pre']['title'] = !empty($media['pre']['id']) ? $media['pre']['name'] : '没有了';
			
			$media['next'] = $db->rawQueryOne('SELECT * FROM data WHERE id = (SELECT id FROM data WHERE id > ' . $media['now']['id'] . ' ORDER BY id ASC LIMIT 1)');
			$media['next']['title'] = !empty($media['next']['id']) ? $media['next']['name'] : '没有了';
			
			$media['now']['views']++;
			$db->where('id', $media['now']['id']);
			$db->update('data', array('views' => $media['now']['views']));
		
		} else {
			$media['error'] = "不存在该媒体";
			
		}
		
	} else {
		$media['error'] = "传递了空参数或非法参数";
		
	}
	
	$global['page']['title'] = (!empty($media['error']) ? $media['error'] : $media['now']['title']) . ' - ' . $global['site']['name'];
	
	include 'template/media.php';
?>