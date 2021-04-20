<?php 
	define('_IN_STATION_', true);
	
	$home = array();
	require_once('data/Config.php');
	$global['mod'] = 'home';
	require_once('data/preload.php');
	
	session_start();
	if (empty($_SESSION['user']) || (time() - $_SESSION['lastSubTime']) > $config['user']['hashEffectiveTime'])
		$_SESSION['user'] = rand_string($config['user']['hashLenth']);
	
	if (!isset($_SESSION['lastSubTime']))
		$_SESSION['lastSubTime'] = time();
	
	$global['page']['title'] = $global['site']['name'];
	
	$home['notice'] = $global['site']['notice'];
	$home['videos'] = $db->get('data');
	
	include 'template/home.php';
?>