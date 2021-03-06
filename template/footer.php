<?php if (!defined('_IN_STATION_')) die('Access Denied');
	if ($global['page']['getFullPage']) {
		include 'template/submitMessageDialog.php'; ?>
<div class="doc-footer-nav mdui-color-theme" style="height:auto">
	<div class="mdui-typo" style="padding:8px">
		<? if (!empty($global['site']['footer'])) echo $global['site']['footer']; ?>
		<center><p>Copyright©2021 <? echo $global['site']['name']; ?><br>
			Powered by <a href="https://github.com/MisaLiu/Simple-PHP-Video-Station" target="_blank">MisaLiu</a></p></center>
	</div>
</div>

<a href="" id="JumpLink" style="display:none">Jump</a>

<div class="mdui-dialog mdui-dialog-prompt" style="display:none;" id="jumpMsgPage">
	<div class="mdui-dialog-title">页面跳转</div>
	<div class="mdui-dialog-content" style="height: 92px;">
		<div class="mdui-textfield">
			<label class="mdui-textfield-label">请输入您要跳转的页码（范围 1-<?php echo $pageCount; ?>）</label>
			<input id="jumpPage" class="mdui-textfield-input" type="text" value="" />
		</div>
	</div>
	<div class="mdui-dialog-actions">
		<button onclick="jumpMsgFloor.open();" class="mdui-btn mdui-ripple mdui-text-color-primary mdui-float-left" mdui-dialog-close>楼层跳转</button>
		<button class="mdui-btn mdui-ripple mdui-text-color-primary" mdui-dialog-close>cancel</button>
		<button onclick="jumpBoardPage();" class="mdui-btn mdui-ripple mdui-text-color-primary" mdui-dialog-close>ok</button>
	</div>
</div>

<div class="mdui-dialog mdui-dialog-prompt" style="display:none;" id="jumpMsgFloor">
	<div class="mdui-dialog-title">楼层跳转</div>
	<div class="mdui-dialog-content" style="height: 92px;">
		<div class="mdui-textfield">
			<label class="mdui-textfield-label">请输入您要跳转的楼层编号（范围 1-<?php echo $rowCount; ?>）</label>
			<input id="jumpMessage" class="mdui-textfield-input" type="text" value="" />
		</div>
	</div>
	<div class="mdui-dialog-actions">
		<button class="mdui-btn mdui-ripple mdui-text-color-primary" mdui-dialog-close>cancel</button>
		<button onclick="jumpBoardMessage();" class="mdui-btn mdui-ripple mdui-text-color-primary" mdui-dialog-close>ok</button>
	</div>
</div>

<script src="template/js/pjax.js"></script>
<script src="template/js/preload.js?202105012102" type="text/javascript"></script>
<?php include "template/footerJs.php";} ?>
</body>
</html>
