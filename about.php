<?php 
	define('_IN_STATION_', true);
	
	require_once('data/Config.php');
	$global['mod'] = 'about';
	require_once('data/preload.php');

	session_start();
	if (empty($_SESSION['user']) || (time() - $_SESSION['lastSubTime']) > $config['user']['hashEffectiveTime'])
		$_SESSION['user'] = rand_string($config['user']['hashLenth']);
	
	if (!isset($_SESSION['lastSubTime']))
		$_SESSION['lastSubTime'] = time();
	
	$global['page']['title'] = '关于本站点 - ' . $global['site']['name'];
	$about = $global['site']['about'];
	
	require_once('template/about.php');
?>
