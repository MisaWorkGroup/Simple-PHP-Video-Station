<?php 
	if (!defined('_IN_STATION_')) die('Access Denied');
	
	$config = array();
	
	$config['db']['host'] = 'localhost'; // 设置数据库所在主机
	$config['db']['user'] = 'video'; // 设置数据库用户名
	$config['db']['pw'] = 'video'; // 设置数据库密码
	$config['db']['form'] = 'video'; // 设置数据库表名
	$config['db']['port'] = 3306; // 设置数据库的连接端口
	$config['db']['prefix'] = ''; // 设置数据库表名的前缀
	
	$config['page']['enablePjax'] = true; // 如果你在你的 template 中启用了 pjax 无刷加载，请设置为 true，否则请设置为 false
	
	$config['board']['msgLength'] = 120; // 设置留言板接受的留言最大长度，汉子字符都算作一个字符
	$config['board']['msgPerPage'] = 10; // 设置留言板每页显示多少条留言
	$config['board']['defaultState'] = 1; // 发布留言时留言的默认状态。-1 = 垃圾留言，0 = 审核中的留言，1 = 正常显示的留言。请在数据库中对单条留言进行设置
	$config['board']['breakTime'] = 10; // 设置留言板两次操作之间的冷却时间，单位为秒
	
	$config['user']['hashLenth'] = 8; // 设置用户随机标识码的长度
	$config['user']['hashEffectiveTime'] = 120; // 设置用户随机标识码的有效期，单位为秒
	
	$config['player']['damakuAPI'] = ''; // 设置 DPlayer 的弹幕 API，不想启用弹幕功能请留空。关于 DPlayer 详见 https://github.com/DIYgod/DPlayer
	$config['player']['damakuPrefix'] = ''; // 设置弹幕 API 的视频标识前缀
	$config['player']['userPrefix'] = ''; // 设置弹幕 API 的用户标识前缀
	
	$config['admin']['user'] = 'admin'; // 设置管理后台的账号
	$config['admin']['password'] = 'admin'; // 设置管理后台的密码，如果下面的 `ismd5` 设置为了 true，请在此填写密码的 32 位 md5 值
	$config['admin']['ismd5'] = false; // 如果你想在密码传递给服务器后使用 md5 核对，请设置为 true
	
	$global = array();
	
?>
