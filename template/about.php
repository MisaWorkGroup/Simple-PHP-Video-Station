<?php if (!defined('_IN_STATION_')) die('Access Denied');
	include 'template/header.php'; ?>
<h1>关于本站点</h1>

<div class="mdui-card mdui-hoverable">
	<div class="mdui-card-content">
		<div class="mdui-typo">
			<? if (!empty($about)) {
				echo $config['site']['about'];
			}else{
				echo "暂无内容。";
			} ?>
		</div>
	</div>
</div>

</div> 
<br>
<? include "template/footer.php"; ?>