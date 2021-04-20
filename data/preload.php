<?php
	if (!defined('_IN_STATION_')) die('Access Denied');
	
	require_once('MysqliDb.php');

	$db = new MysqliDb (Array(
		'host'     => $config['db']['host'],
		'username' => $config['db']['user'],
		'password' => $config['db']['pw'],
		'db'       => $config['db']['form'],
		'port'     => $config['db']['port'],
		'prefix'   => $config['db']['prefix'],
		'charset'  => 'utf8'
	));
	
	$row = $db->get('config');
	for ($i = 0; $i < count($row); $i++) {
		if ($row[$i]['config'] == 'sitename') $global['site']['name'] = $row[$i]['value'];
		if ($row[$i]['config'] == 'sitekeywords') $global['site']['keywords'] = $row[$i]['value'];
		if ($row[$i]['config'] == 'sitedescription') $global['site']['description'] = $row[$i]['value'];
		if ($row[$i]['config'] == 'siteauthor') $global['site']['author'] = $row[$i]['value'];
		if ($row[$i]['config'] == 'sitenotice') $global['site']['notice'] = $row[$i]['value'];
		if ($row[$i]['config'] == 'sitefooter') $global['site']['footer'] = $row[$i]['value'];
		if ($row[$i]['config'] == 'siteabout') $global['site']['about'] = $row[$i]['value'];
		
	}
	
	$global['page']['num'] = !empty($_GET['page']) ? $_GET['page'] : 1;
	$global['page']['getFullPage'] = ($config['page']['enablePjax'] && !empty($_GET['_pjax'])) ? false : true;
	
	if (($global['mod'] == 'board' && $config['page']['enablePjax'] == false) || $config['page']['enablePjax']) {
		$rowCount = $db->getValue('messages', 'count(*)');
		$msgPerPage = $config['board']['msgPerPage'];
		$pageCount = ceil(($rowCount / $msgPerPage));
		$pre = ($global['page']['num'] - 1) * $msgPerPage;
		
	}
	
	require_once('function.php');
?>