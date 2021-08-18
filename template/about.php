<?php if (!defined('_IN_STATION_')) die('Access Denied');
	require_once('template/header.php'); ?>
<h1>关于本站点</h1>

<div class="mdui-card mdui-hoverable">
	<div class="mdui-card-content">
		<div class="mdui-typo">
			<? if (!empty($about)) {
				echo $about;
			} else {
				echo "暂无内容。";
			} ?>
		</div>
	</div>
</div>

</div> 
<br>
<? require_once("template/footer.php"); ?>
