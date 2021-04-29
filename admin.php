<?php 
	define('_IN_STATION_', true);
	
	$admin = array();
	require_once('data/Config.php');
	$global['mod'] = 'admin';
	require_once('data/preload.php');
	
	session_start();
	if (empty($_SESSION['user']) || (time() - $_SESSION['lastSubTime']) > $config['user']['hashEffectiveTime'])
		$_SESSION['user'] = rand_string($config['user']['hashLenth']);
	
	if (!isset($_SESSION['lastSubTime']))
		$_SESSION['lastSubTime'] = time();
	
	$admin['isAdmin'] = $_SESSION['isAdmin'];
	
	$global['page']['title'] = '管理视频 - ' . $global['site']['name'];
	
	$admin['notice'] = $global['site']['notice'];
	$admin['videos'] = $db->get('data');
	$admin['about'] = $global['site']['about'];
	$admin['footer'] = $global['site']['footer'];
	$admin['name'] = $global['site']['name'];
	$admin['keywords'] = $global['site']['keywords'];
	$admin['description'] = $global['site']['description'];
	$admin['author'] = $global['site']['author'];
	
	include 'template/admin.php';
?>