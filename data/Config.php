<?php 
	if (!defined('_IN_STATION_')) die('Access Denied');
	
	$config = array();
	
	$config['db']['host'] = 'localhost'; // 设置数据库所在主机
	$config['db']['user'] = 'video'; // 设置数据库用户名
	$config['db']['pw'] = ''; // 设置数据库密码
	$config['db']['form'] = 'video'; // 设置数据库表名
	$config['db']['port'] = 3306; // 设置数据库的连接端口
	$config['db']['prefix'] = ''; // 设置数据库表名的前缀
	
	$config['page']['enablePjax'] = true;
	
	$config['board']['msgPerPage'] = 10; // 设置留言板每页显示多少条留言
	$config['board']['defaultState'] = 1; // 发布留言时留言的默认状态。-1 = 垃圾留言，0 = 审核中的留言，1 = 正常显示的留言。请在数据库中对单条留言进行设置
	$config['board']['breakTime'] = 10; // 设置留言板两次操作之间的冷却时间，单位为秒
	
	$config['user']['hashLenth'] = 8; // 设置用户随机标识码的长度
	$config['user']['hashEffectiveTime'] = 120; // 设置用户随机标识码的有效期，单位为秒
	
	$config['player']['damakuAPI'] = '';
	$config['player']['damakuPrefix'] = '';
	$config['player']['userPrefix'] = '';
	
	$global = array();
	
?>