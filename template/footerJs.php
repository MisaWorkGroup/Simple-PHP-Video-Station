<script type="text/javascript">
	if (navigator.serviceWorker) {
		navigator.serviceWorker.register('./sw.js');
	};
	
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			$('#mdui_loading').addClass('mdui-hidden');
			mdui.$.hideOverlay();

			if (xmlhttp.responseText >= 0){
				var $jumpMessage = xmlhttp.responseText;
				var $responseText = "提交成功，即将跳转至您的留言...";
				mdui.snackbar({
					message: $responseText,
					onClosed: function (){
						document.getElementById('JumpLink').href = 'board/' + Math.ceil($jumpMessage / <?php echo $config['board']['msgPerPage']; ?>) + '#message_' + $jumpMessage;
						document.getElementById('JumpLink').click();
					}
				});
				
			}else{
				if (xmlhttp.responseText == -999){
					var $responseText = "您的请求无效。";

				} else if (xmlhttp.responseText == -100) {
					var $responseText = "您的请求过于频繁，请尝试稍后提交。";
					
				} else if (xmlhttp.responseText == -20) {
					var $responseText = "用户名不能为空。";

				} else if (xmlhttp.responseText == -30) {
					var $responseText = "邮箱不能为空。";
					
				} else if (xmlhttp.responseText == -40) {
					var $responseText = "个人网站不能为空。";
					
				} else if (xmlhttp.responseText == -50) {
					var $responseText = "留言内容不能为空。";
					
				} else {
					var $responseText = xmlhttp.responseText;
				}
				mdui.alert($responseText, '出错啦！');

			}

		}
	}
	
	function jumpBoardPage() {
		jumpMsgPage.close();
		var $jumpPage = $('#jumpPage').val();
		$jumpPage = Math.floor($jumpPage);
		
		if ($jumpPage < 1 || $jumpPage == "" || $jumpPage > <?php echo $pageCount; ?>){
			mdui.alert('请输入合法的页码','出错啦！');
			return;
		}
		document.getElementById('JumpLink').href = 'board/' + $jumpPage;
		document.getElementById('JumpLink').click();	
	}

	function jumpBoardMessage() {
		jumpMsgFloor.close();
		var $jumpMessage = $('#jumpMessage').val();
		$jumpMessage = Math.floor($jumpMessage);
		
		if ($jumpMessage < 1 || $jumpMessage == "" || $jumpMessage > <?php echo $rowCount; ?>){
			mdui.alert('请输入合法的楼层编号','出错啦！');
			return;
		}
		
		document.getElementById('JumpLink').href = 'board/' + Math.ceil($jumpMessage / <?php echo $msgPerPage; ?>) + '#message_' + $jumpMessage;
		document.getElementById('JumpLink').click();
	}
</script>