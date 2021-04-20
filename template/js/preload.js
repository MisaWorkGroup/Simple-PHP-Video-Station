var messageFastPost = new mdui.Dialog('#fast_post');
var drawer = new mdui.Drawer('#drawer', {'swipe': true});
var jumpMsgPage = new mdui.Dialog('#jumpMsgPage');
var jumpMsgFloor = new mdui.Dialog('#jumpMsgFloor');

$(document).pjax('a[target!=_blank]', '#mdui_text_container', {fragment:'#mdui_text_container', timeout:10000});

$(document).on('pjax:send', function() {
	$('#mdui_loading').removeClass('mdui-hidden');
	mdui.$('#mdui_text_container').mutation();
    mdui.$.showOverlay();
    if ($(window).width() <= 1024){
    	if (drawer.isOpen()){
    		drawer.close();
    	}
    }
});

$(document).on('pjax:complete', function() {
	$('#mdui_loading').addClass('mdui-hidden');
    mdui.$.hideOverlay();
});

function submitFormFast() {
	var isFastPost = true;
	messageFastPost.close();
	$('#mdui_loading').removeClass('mdui-hidden');
	mdui.$.showOverlay();

	var $userhash = document.getElementById('fp_user').value;
	var $username = document.getElementById('fp_username').value;
	var $email = document.getElementById('fp_email').value;
	var $website = document.getElementById('fp_website').value;
	var $message = document.getElementById('fp_text').value;

	if ($username == "" || $email == "" || $message == "" || $userhash == ""){
		if ($userhash == ""){
		var $responseText = "您的请求无效。";

		}
		if ($message == ""){
			var $responseText = "留言内容不能为空。";

		}
		if ($email == ""){
			var $responseText = "邮箱不能为空。";

		}
		if ($username == ""){
			var $responseText = "用户名不能为空。";

		}
		$('#mdui_loading').addClass('mdui-hidden');
		mdui.$.hideOverlay();
		mdui.alert($responseText, '出错啦！');
		return;
	}
	

	xmlhttp.open("POST","data/submitMessage.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("username=" + $username + "&email=" + $email + "&website=" + $website + "&text=" + $message + "&user=" + $userhash);
}