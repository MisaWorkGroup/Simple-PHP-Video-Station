<?php if (!defined('_IN_STATION_')) die('Access Denied'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $global['page']['title']; ?></title>
		
		<? if ($global['page']['getFullPage']) { ?>
			<base href="<?php echo (isHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']; ?>/">
			
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" /> 
			
			<meta name="title" content="<?php echo $global['page']['title']; ?>" />
			<meta name="keywords" content="<?php echo $config['site']['keywords']; ?>" />
			<meta name="description" content="<?php echo $global['site']['description']; ?>" />
			<meta name="author" content="<?php echo $global['site']['author']; ?>" />
			
			<link rel="stylesheet" href="template/css/mdui.min.css" />
			<link rel="stylesheet" href="template/css/mdui.docs.css" />
			<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
			<script src="template/js/mdui.min.js"></script>
			<script src="data/DPlayer.min.js"></script>
			
			<style>html, body {scroll-behavior:smooth;}</style>
			<script>
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else{ 
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				function setCookie(name,value) {
					var Days = 30;
					var exp = new Date();
					exp.setTime(exp.getTime() + Days*24*60*60*1000);
					document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
				}
				
				function getCookie(name) {
					var arr,reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
					if (arr = document.cookie.match(reg)) {
						return unescape(arr[2]);
						
					} else {
						return null;
						
					}
				}
				
			</script>
		<? } ?>
</head>

	<body class="mdui-appbar-with-toolbar mdui-drawer-body-left mdui-theme-primary-indigo mdui-theme-accent-pink"> 
		<? if ($global['page']['getFullPage']) include 'template/drawer.php'; ?>

		<div class="mdui-container" id="mdui_text_container">