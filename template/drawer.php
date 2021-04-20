<?php if (!defined('_IN_STATION_')) die('Access Denied'); ?>
<div class="mdui-appbar mdui-appbar-fixed">
	<div class="mdui-toolbar mdui-color-theme">
		<button onclick="drawer.toggle();" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '导航栏'}">
			<i class="mdui-icon material-icons">&#xe5d2;</i>
		</button>
		<a href="<?php echo (isHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']; ?>" class="mdui-typo-title"><?php echo $global['site']['name']; ?></a> 
		<div class="mdui-toolbar-spacer"></div>
		<a href="javascript:messageFastPost.open();" class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '留言'}"><i class="mdui-icon material-icons">&#xe3c9;</i></a>
	</div>
	<div class="mdui-progress mdui-hidden" id="mdui_loading">
		<div class="mdui-progress-indeterminate"></div>
	</div>
</div>

<div class="mdui-drawer" id="drawer">
	<div class="mdui-list" style="margin-bottom: 76px;">
		<a href="<?php echo (isHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']; ?>/" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">&#xe88a;</i>
			<div class="mdui-list-item-content">首页</div>
		</a>
		
		<a href="about.php" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">&#xe88e;</i>
			<div class="mdui-list-item-content">关于</div>
		</a>
		
		<a href="/board" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">&#xe3c9;</i>
			<div class="mdui-list-item-content">留言板</div>
		</a>
		
	</div>
</div>