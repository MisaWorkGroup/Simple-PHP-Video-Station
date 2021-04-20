<?php

/*
	报错一览：

	-999  请求无效      一般是用户 session 验证失败
	-100  操作过于频繁  减缓操作间隔时长或修改冷却时间后再试
	-20   用户名为空
	-30   邮箱为空
	-40   网站为空      一般不会强行请求这个
	-50   留言为空

	>=0   提交成功

*/

define('_IN_STATION_', true);

require_once('Config.php');
require_once('preload.php');
session_start();

$value = array();

$breakTime = $config['board']['breakTime'];
$defaultState = $config['board']['defaultState'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	if (isset($_SESSION['lastSubTime']) && (time() - $_SESSION['lastSubTime']) > $breakTime) {
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user'] != ""){
				if (strlen($_SESSION['user']) === $config['user']['hashLenth']) {
					if ($_SESSION['user'] === $_POST['user']) {
						
						$value['id'] = null;
						$value['username'] = htmlspecialchars(stripslashes(trim($_POST['username'])));
						$value['email'] = htmlspecialchars(stripslashes(trim($_POST['email'])));
						$value['website'] = htmlspecialchars(stripslashes(trim($_POST['website'])));
						$value['timestamp'] = $db->now();
						$value['message'] = $_POST['text'];
						$value['state'] = $defaultState;

						if (empty($value['username'])) {
							echo('-20');
							$_SESSION['lastSubTime'] = time();
							die();
						}
						
						if (empty($value['email'])) {
							echo('-30');
							$_SESSION['lastSubTime'] = time();
							die();
						}
						
						if (empty($value['message'])) {
							echo('-50');
							$_SESSION['lastSubTime'] = time();
							die();
						}
						
						$rowCount = $db->insert('messages', $value);

						echo $rowCount;

						$_SESSION['lastSubTime'] = time();
						$_SESSION['user'] = rand_string($config['user']['hashLenth']);
						
					}else{
						echo('-999');

					}
				}else{
					echo('-999');

				}
			}else{
				echo('-999');

			}
		}else{
			echo('-999');

		}
	}else{
		echo('-100');

	}
}


$_SESSION['lastSubTime'] = time();

?>