<?php
define('_IN_STATION_', true);

require_once('Config.php');
require_once('preload.php');
session_start();

$breakTime = $config['board']['breakTime'];
$defaultState = $config['board']['defaultState'];

$lastSubTime = $_SESSION['lastSubTime'];
$_SESSION['lastSubTime'] = time();

if ($_SERVER['REQUEST_METHOD'] != "POST")
	die();

if (empty($lastSubTime) || (time() - $lastSubTime) < $breakTime) 
	die('-100');

if (empty($_SESSION['user']))
	die('-999');

if (strlen($_SESSION['user']) !== $config['user']['hashLenth'])
	die('-999');

if ($_SESSION['user'] !== $_POST['user'])
	die('-999');

$value = array();

$value['id'] = null;
$value['username'] = htmlspecialchars(stripslashes(trim($_POST['username'])));
$value['email'] = htmlspecialchars(stripslashes(trim($_POST['email'])));
$value['website'] = htmlspecialchars(stripslashes(trim($_POST['website'])));
$value['timestamp'] = $db->now();
$value['message'] = $_POST['text'];
$value['state'] = $defaultState;

if (empty($value['username']))
	die('-20');

if (empty($value['email']))
	die('-30');

if (empty($value['message']))
	die('-50');

if (new_strlen($value['message']) > $config['board']['msgLength'])
	die('-60');

$rowCount = $db->insert('messages', $value);
echo $rowCount;

$_SESSION['user'] = rand_string($config['user']['hashLenth']);
?>