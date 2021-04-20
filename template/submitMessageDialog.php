<div class="mdui-dialog" id="fast_post">
	<div class="mdui-dialog-content mdui-typo" style="padding: 16px 16px 8px 16px;">
		<h3 style="margin:2px;padding-left:2px;">提交留言</h3>
		<input type="hidden" id="fp_user" value="<?php echo $_SESSION['user']; ?>" required />

		<div class="mdui-textfield mdui-textfield-floating-label" style="padding-top:0px;">
			<i class="mdui-icon material-icons">&#xe853;</i>
			<label class="mdui-textfield-label">用户名</label>
			<input type="username" id="fp_username" class="mdui-textfield-input" required />
			<div class="mdui-textfield-error">请输入用户名</div>
			<div class="mdui-textfield-helper">在此输入您的昵称</div>
		</div>

		<div class="mdui-textfield mdui-textfield-floating-label" style="padding-top:0px;">
			<i class="mdui-icon material-icons">&#xe0be;</i>
			<label class="mdui-textfield-label">邮箱</label>
			<input type="email" id="fp_email" class="mdui-textfield-input" required />
			<div class="mdui-textfield-error">请输入合法的邮箱格式</div>
			<div class="mdui-textfield-helper">在此输入您的邮箱地址</div>
		</div>

		<div class="mdui-textfield mdui-textfield-floating-label" style="padding-top:0px;">
			<i class="mdui-icon material-icons">&#xe894;</i>
			<label class="mdui-textfield-label">个人站点</label>
			<input type="website" id="fp_website" class="mdui-textfield-input" />
			<div class="mdui-textfield-error">请输入合法的网页地址</div>
			<div class="mdui-textfield-helper">在此输入您的个人站点地址（可不填）</div>
		</div>

		<div class="mdui-textfield mdui-textfield-floating-label" style="padding-top:0px;">
			<i class="mdui-icon material-icons">&#xe0d8;</i>
			<label class="mdui-textfield-label">留言内容</label>
			<textarea id="fp_text" class="mdui-textfield-input" maxlength="120" required></textarea>
			<div class="mdui-textfield-error">请输入留言内容</div>
			<div class="mdui-textfield-helper">支持 Markdown 语法，禁止发布广告及违法信息</div>
		</div>

		<button onclick="submitFormFast();" class="mdui-btn mdui-ripple mdui-btn-dense mdui-text-color-theme-accent mdui-float-right" style="margin:0">提交</button>
	</div>
</div>