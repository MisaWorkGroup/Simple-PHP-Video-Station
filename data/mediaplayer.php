<?php if (!defined('_IN_STATION_')) die('Access Denied'); ?>
<style>
	.scale {
		width: 100%;
		padding-bottom: 56.25%;
		height: 0;
		position: relative;
	}
	
	.video {
		width: 100%;
		height: 100%;
		background-color: black;
		position: absolute;
	}
</style>
<div class="scale">
	<div class="video" id="video"></div>
</div>
<script>
	var dp = new DPlayer({
		container: document.getElementById('video'),
		video: {
			url: '<? echo $media['now']['url']; ?>'
		}<? if (!empty($config['player']['damakuAPI'])) { ?>,
		danmaku: {
			id: '<? echo $config['player']['damakuPrefix'] . $media['now']['id']; ?>',
			api: '<? echo $config['player']['damakuAPI']; ?>',
			user: '<? echo $config['player']['userPrefix'] . $_SESSION['user']; ?>'
		},<? } ?>
	});
</script>