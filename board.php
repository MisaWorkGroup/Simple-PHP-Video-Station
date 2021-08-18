<?php 
	define('_IN_STATION_', true);
	
	require_once('data/Config.php');
	$global['mod'] = 'board';
	require_once('data/preload.php');
	require_once('data/Parsedown.php');
	
	$board = array();
	$Parsedown = new Parsedown();
	
	session_start();
	if (empty($_SESSION['user']) || (time() - $_SESSION['lastSubTime']) > $config['user']['hashEffectiveTime'])
		$_SESSION['user'] = rand_string($config['user']['hashLenth']);
	
	if (!isset($_SESSION['lastSubTime']))
		$_SESSION['lastSubTime'] = time();
	
	$global['page']['title'] = '留言板 - ' . $global['site']['name'];
	
	$db->pageLimit = $config['board']['msgPerPage'];
	$board['msgs'] = $db->arraybuilder()->paginate('messages', $global['page']['num']);
	
	require_once('template/board.php');
?>
