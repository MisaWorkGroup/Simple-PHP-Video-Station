<?php if (!defined('_IN_STATION_')) die('Access Denied');
	include 'template/header.php'; ?>

<h1 id="title"><? echo $global['site']['name']; ?></h1>

<? if (!empty($home['notice'])) { ?>
		<div class="mdui-card mdui-hoverable">
			<div class="mdui-card-content">
				<div class="mdui-typo" style="position:relative;top:-20px;">
					<h1>公告板</h1>
					<? echo $global['site']['notice']; ?>
				</div>
			</div>
		</div>
	<br>
<? } ?>

<div class="mdui-card mdui-hoverable">
	<div class="mdui-card-content">
		<div class="mdui-typo" style="position:relative;top:-20px;">
			<h1>视频列表</h1>
		</div>
		
		<div class="mdui-container-fluid" style="padding:0 0 0 0;margin-top:5px;">
			<div class="mdui-row" style="margin:0 0 0 0;">
				<? if (isset($home['videos'])) {
						for ($i = 0; $i < count($home['videos']); $i++) { ?>
							<div class="mdui-col-xs-12 mdui-col-md-6" style="padding:0 0 0 0;">
								<a href="media/<? echo $home['videos'][$i]['id']; ?>" class="mdui-btn mdui-ripple mdui-center mdui-text-color-theme-accent mdui-text-truncate"><? echo $home['videos'][$i]['name']; ?></a>
							</div>
					<? }
					} else { ?>
						<center><p>当前没找到视频～</p></center>
				<? } ?>
			</div>
		</div>
	</div>
</div>

</div>
<br>
<? include "template/footer.php"; ?>