<?php if (!defined('_IN_STATION_')) die('Access Denied'); ?>
<h1><?php echo $media['now']['title']; ?></h1>

<div class='mdui-card mdui-hoverable'>
	<div class='mdui-card-media'>
		<? include 'data/mediaplayer.php'; ?>
	</div>
	<div class='mdui-card-actions' style='padding-bottom:4px;'>
		<script type="text/javascript">
			function copyText(text, callback) {

			    var tag = document.createElement('input');
			    tag.setAttribute('id', 'cp_hgz_input');
			    tag.value = text;

			    document.getElementsByTagName('body')[0].appendChild(tag);

			    document.getElementById('cp_hgz_input').select();
			    document.execCommand('copy');
			    document.getElementById('cp_hgz_input').remove();
			    
			    if(callback) {callback(text)}
			}
		</script>
		<!--
		<button class='mdui-btn mdui-ripple' onclick="copyText('<?php echo (isHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . "/media/" . $media['id']; ?>', function(){mdui.snackbar({message: '复制本页地址成功'})})" style='margin-left:8px;'>复制本页地址</button>
		-->
		<button class='mdui-btn mdui-ripple' onclick="copyText('<?php echo $media['url']; ?>', function(){mdui.snackbar({message: '复制视频地址成功'})})">复制视频地址</button>
		<p class="mdui-float-right" style="margin-top:10px;margin-bottom:10px;padding-left:16px;padding-right:24px;"><?php echo $media['now']['views'] . " 次观看" ?></p>
	</div>
	<div class='mdui-card-actions' style='padding-top:4px;'>
		<div class="mdui-container-fluid" style="padding:0 0 0 0;">
			<div class="mdui-row" style="margin:0 0 0 0;">
				<div class="mdui-col-xs-12 mdui-col-md-6">
					<a href='<? echo $media['pre']['id'] ? '/media/' . $media['pre']['id'] : 'javascript:;'; ?>' class='mdui-btn mdui-ripple mdui-text-color-theme-accent mdui-center mdui-text-left'>上一篇：<? echo $media['pre']['title']; ?></a>
				</div>
				<div class="mdui-col-xs-12 mdui-col-md-6">
					<a href='<? echo $media['next']['id'] ? '/media/' . $media['next']['id'] : 'javascript:;'; ?>' class='mdui-btn mdui-ripple mdui-text-color-theme-accent mdui-center mdui-text-right' id='mdui_media_next'>下一篇：<? echo $media['next']['title']; ?></a>
					<script type="text/javascript">

						$(function (){
							var windowWidth = $(window).width();
							if (windowWidth > 600){
								$('#mdui_media_next').removeClass('mdui-text-left');
								$('#mdui_media_next').addClass('mdui-text-right');

							}else{
								$('#mdui_media_next').addClass('mdui-text-left');
								$('#mdui_media_next').removeClass('mdui-text-right');

							}

						});

						$(window).resize(function(){
							var windowWidth = $(window).width();
							if (windowWidth > 600){
								$('#mdui_media_next').removeClass('mdui-text-left');
								$('#mdui_media_next').addClass('mdui-text-right');

							}else{
								$('#mdui_media_next').addClass('mdui-text-left');
								$('#mdui_media_next').removeClass('mdui-text-right');

							}
						});

					</script>
				</div>
			</div>
		</div>
	</div>
</div>