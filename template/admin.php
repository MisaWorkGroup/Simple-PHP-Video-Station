<?php if (!defined('_IN_STATION_')) die('Access Denied');
	include 'template/header.php'; ?>

<h1 id="title"><? echo $global['site']['name']; ?></h1>

<? if (!$admin['isAdmin']) { ?>
	<div class='mdui-card mdui-hoverable' style="padding-bottom:8px;">
		<div class='mdui-card-content' style="padding-top:0;padding-bottom:0;">
			<p style="margin-bottom:4px;">您还未登录，请立即登录。登录后才可进行管理操作。</p>
		</div>
		<div class="mdui-card-action" style="padding:0 8px 8px 8px;padding-bottom:8px;">
			<div class="mdui-textfield mdui-textfield-floating-label" style="padding-top:0">
				<i class="mdui-icon material-icons">account_circle</i>
				<label class="mdui-textfield-label">管理用户名</label>
				<input id="admin_account" class="mdui-textfield-input" type="username" required />
				<div class="mdui-textfield-error">请输入用户名</div>
			</div>
			<div class="mdui-textfield mdui-textfield-floating-label" style="padding-top:0">
				<i class="mdui-icon material-icons">lock</i>
				<label class="mdui-textfield-label">管理密码</label>
				<input id="admin_password" class="mdui-textfield-input" type="password" required />
				<div class="mdui-textfield-error">请输入密码</div>
			</div>
			<button onclick="adminLogin()" class="mdui-btn mdui-ripple mdui-text-color-theme-accent mdui-float-right">登录</button>
		</div>
	</div>
	<br>
<? } ?>

<div class="mdui-tab" mdui-tab>
	<a href="#global" class="mdui-ripple">全局设置</a>
	<a href="#media" class="mdui-ripple">媒体设置</a>
</div>

<div id="global" class="mdui-p-a-2">
	<div class="mdui-textfield">
		<label class="mdui-textfield-label">站点名称</label>
		<input class="mdui-textfield-input" id="siteName" type="text" value="<? echo $admin['name']; ?>" required/>
	</div>
	
	<div class="mdui-textfield">
		<label class="mdui-textfield-label">站点关键词</label>
		<input class="mdui-textfield-input" id="siteKeyw" type="text" value="<? echo $admin['keywords']; ?>" placeholder="用于 SEO 优化，多个请用,隔开，可不填" />
	</div>
	
	<div class="mdui-textfield">
		<label class="mdui-textfield-label">站点描述</label>
		<input class="mdui-textfield-input" id="siteDesc" type="text" value="<? echo $admin['description']?>" placeholder="用于 SEO 优化，可不填" />
	</div>
</div>

<div class="mdui-card mdui-hoverable">
	<div class="mdui-card-content">
		<div class="mdui-typo" style="position:relative;top:-20px;">
			<h1>公告板</h1>
			<? if (!empty($admin['notice'])) {
				 echo $global['site']['notice'];
			} else { ?>
				<center class="mdui-text-color-theme-disabled">你还没有设置站点公告</center>
			<? } ?>
		</div>
	</div>
	<? if ($admin['isAdmin']) { ?>
		<div class="mdui-card-actions">
			<button onclick="changeNotice()" class="mdui-btn mdui-ripple mdui-text-color-theme-accent mdui-float-right">修改公告</button>
		</div>
	<? } ?>
</div>
<br>

<div class="mdui-card mdui-hoverable">
	<div class="mdui-card-content">
		<div class="mdui-typo" style="position:relative;top:-20px;">
			<h1>视频列表</h1>
		</div>
		
		<div class="mdui-container-fluid" style="padding:0 0 0 0;margin-top:5px;">
			<div class="mdui-row" style="margin:0 0 0 0;">
				<? if (isset($admin['videos'])) {
						for ($i = 0; $i < count($admin['videos']); $i++) { ?>
							<div class="mdui-col-xs-12 mdui-col-md-6" style="padding:0 0 0 0;">
								<a href="javascript:editMedia(<? echo $admin['videos'][$i]['id']; ?>);" class="mdui-btn mdui-ripple mdui-center mdui-text-color-theme-accent mdui-text-truncate"><? echo $admin['videos'][$i]['name']; ?></a>
							</div>
					<? }
					} else { ?>
						<center><p>当前没找到视频～</p></center>
				<? } ?>
			</div>
		</div>
	</div>
	<? if ($admin['isAdmin']) { ?>
		<div class="mdui-card-actions">
			<button onclick="addMedia()" class="mdui-btn mdui-ripple mdui-text-color-theme-accent mdui-float-right">添加视频</button>
		</div>
	<? } ?>
</div>

</div>
<br>
<? include "template/footer.php"; ?>