<?php if (!defined('_IN_STATION_')) die('Access Denied');
	require_once('template/header.php'); ?>
<h1>留言板</h1>

<? if (count($board['msgs']) > 0) {
	for ($i = 0; $i < count($board['msgs']); $i++) { ?>
		<div class="mdui-card mdui-hoverable" id="message_<? echo $board['msgs'][$i]['id']; ?>">
			<div class="mdui-card-header">
				<img class="mdui-card-header-avatar" src="<? echo "https://gravatar.bytecho.net/avatar/" . md5(strtolower(trim($board['msgs'][$i]['email']))) . "?s=100"; ?>"/>
				<div class="mdui-card-header-title mdui-typo">
					<? if (!empty($board['msgs'][$i]['website']) && $board['msgs'][$i]['state'] > 0) { ?>
						<a href="<? echo $board['msgs'][$i]['website'];?>" target="_blank">
					<? }
					echo $board['msgs'][$i]['username'];
					if (!empty($board['msgs'][$i]['website']) && $board['msgs'][$i]['state'] > 0) { ?>
						</a>
					<? } ?>
					<span class="mdui-float-right">#<? echo $board['msgs'][$i]['id']; ?></span>
				</div>
				
				<div class="mdui-card-header-subtitle">At <? echo $board['msgs'][$i]['timestamp'] ?></div>
			</div>
			
			<div class="mdui-card-content mdui-typo" style="position:relative;top:-10px;">
				<? if ($board['msgs'][$i]['state'] == -1) { ?>
					<p><center class="mdui-text-color-theme-disabled">该消息因判断为垃圾消息而被隐藏</center></p>
				<? } elseif ($board['msgs'][$i]['state'] == 0) { ?>
					<p><center class="mdui-text-color-theme-disabled">该消息未通过审核，暂时无法查看</center></p>
				<? } else {
						echo $Parsedown->text(htmlspecialchars($board['msgs'][$i]['message']));										
					}
				?>
			</div>
		</div>
		<br>
	<? } ?>
		<div class="mdui-container-fluid" style="padding:0 0 0 0;margin:0 0 0 0;">
			<div class="mdui-row" style="margin:0 0 0 0;">
				<div class="mdui-col-xs-4">
					<a href="<? echo $global['page']['num'] > 1 ? 'board/' . ($global['page']['num'] - 1) : 'javascript:;'; ?>" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" <? if ($global['page']['num'] <= 1) { ?> disabled <? } ?>><i class="mdui-icon material-icons">&#xe314;</i>&nbsp;上一页</a>
				</div>
				<div class="mdui-col-xs-4">
					<p onclick="jumpMsgPage.open();" class="mdui-typo mdui-center mdui-text-center" style="margin:6px 0 0 0;"><? echo $global['page']['num'] . ' / ' . $pageCount; ?></p>
				</div>
				<div class="mdui-col-xs-4">
					<a href="<? echo $global['page']['num'] < $pageCount ? 'board/' . ($global['page']['num'] + 1) : 'javascript:;'; ?>" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-float-right" <? if ($global['page']['num'] >= $pageCount) { ?> disabled <? } ?>>下一页&nbsp;<i class="mdui-icon material-icons">&#xe315;</i></a>
				</div>
			</div>
		</div>
<? }else{ ?>
	<div class="mdui-card mdui-hoverable">
		<div class="mdui-card-content mdui-typo" style="position:relative;top:-10px;" id="message_0">
			<center><h2 class="mdui-text-color-theme-secondary">还没有人写留言</h2><br>
				<p class="mdui-text-color-theme-secondary">现在就去当第一个写留言的人吧！</p></center>
		</div>
	</div>
<? } ?>
<center><button onclick="messageFastPost.open();" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" style="margin:12px 0 0 0;"><i class="mdui-icon material-icons">&#xe3c9;</i>&nbsp;立即留言</button></center>
</div>
<br>
<? require_once("template/footer.php"); ?>
