var mediaDialog = new mdui.Dialog('#editMedia');
var mediaDialogInst = document.getElementById('editMedia');
var dialogMode = 0;

function adminLogin() {
	$('#mdui_loading').removeClass('mdui-hidden');
	mdui.$.showOverlay();
	
	mdui.$.ajax({
		method : 'POST',
		url : './data/admin.php',
		data : {
			type : 'login',
			user : document.getElementById('admin_account').value,
			password : document.getElementById('admin_password').value,
			userhash : userHash
		},
		complete : function(xhr, textStatus) {
			$('#mdui_loading').addClass('mdui-hidden');
			mdui.$.hideOverlay();
		},
		success : function(data, textStatus, xhr) {
			if (data == '0') {
				mdui.alert('登录成功', '提示', function() {
					document.getElementById('JumpLink').href = 'admin.php';
					document.getElementById('JumpLink').click();
				});
			} else {
				mdui.alert('登录失败，错误码：' + data, '提示');
			}
		},
		error : function(xhr, textStatus) {
			mdui.alert('登录失败', '提示');
		}
	});
	
}

function submitGlobalChanges() {
	var obj = {
		'sitename' : document.getElementById('siteName').value,
		'sitekeywords' : document.getElementById('siteKeyw').value,
		'sitedescription' : document.getElementById('siteDesc').value,
		'siteauthor' : document.getElementById('siteAuth').value,
		'sitenotice' : document.getElementById('siteNoti').value,
		'siteabout' : document.getElementById('siteAbou').value,
		'sitefooter' : document.getElementById('siteFoot').value
	};
	
	$('#mdui_loading').removeClass('mdui-hidden');
	mdui.$.showOverlay();
	
	mdui.$.ajax({
		method : 'POST',
		url : './data/admin.php',
		data : {
			type : 'global',
			data : JSON.stringify(obj),
			userhash : userHash
		},
		complete : function(xhr, textStatus) {
			$('#mdui_loading').addClass('mdui-hidden');
			mdui.$.hideOverlay();
		},
		success : function(data, textStatus, xhr) {
			if (data == '0') {
				mdui.alert('修改成功', '提示', function() {
					document.getElementById('JumpLink').href = 'admin.php';
					document.getElementById('JumpLink').click();
				});
				
			} else {
				mdui.alert('修改失败，错误码：' + data, '提示');

			}
		},
		error : function(xhr, textStatus) {
			mdui.alert('修改失败', '提示');
			
		}
	});
	
}

function editMedia(id) {
	dialogMode = 1;
	
	$('#mdui_loading').removeClass('mdui-hidden');
	mdui.$.showOverlay();
	
	mdui.$.ajax({
		method : 'POST',
		url : './data/admin.php',
		data : {
			type : 'media',
			do : '0',
			mediaid : id,
			userhash : userHash
		},
		complete : function(xhr, textStatus) {
			$('#mdui_loading').addClass('mdui-hidden');
			mdui.$.hideOverlay();
		},
		success : function(data, textStatus, xhr){
			var obj = JSON.parse(data);
			
			if (obj.id) {
				document.getElementById('mediaDialogTitle').innerHTML = '编辑媒体';
				document.getElementById('mediaDialogId').value = obj.id;
				document.getElementById('mediaDialogName').value = obj.name;
				document.getElementById('mediaDialogUrl').value = obj.url;
				
				mdui.mutation('#mediaDialog');
				mediaDialog.open();
				
			} else {
				mdui.alert('从服务器拉取数据失败，错误码：' + data, '提示');
				
			}
		},
		error : function(textStatus, xhr){
			mdui.alert('从服务器拉取数据失败', '提示');
			
		}
	});
}

function addMedia() {
	dialogMode = 2;
	
	document.getElementById('mediaDialogTitle').innerHTML = '添加媒体';
	document.getElementById('mediaDialogId').value = '';
	document.getElementById('mediaDialogName').value = '';
	document.getElementById('mediaDialogUrl').value = '';
	
	mdui.mutation('#mediaDialog');
	mediaDialog.open();
	
}

mediaDialogInst.addEventListener('confirm.mdui.dialog', function () {
	if (dialogMode == 1) {
		$('#mdui_loading').removeClass('mdui-hidden');
		mdui.$.showOverlay();
		
		mdui.$.ajax({
			method : 'POST',
			url : './data/admin.php',
			data : {
				type : 'media',
				do : '2',
				mediaid : document.getElementById('mediaDialogId').value,
				name : document.getElementById('mediaDialogName').value,
				url : document.getElementById('mediaDialogUrl').value,
				userhash : userHash
			},
			complete : function(xhr, textStatus) {
				$('#mdui_loading').addClass('mdui-hidden');
				mdui.$.hideOverlay();
			},
			success : function(data, textStatus, xhr){
				if (data == 'success') {
					mdui.alert('保存成功<br>您可能需要刷新以查看效果', '提示');
					
				} else if(data == 'failed') {
					mdui.alert('保存数据失败', '提示');
					
				} else {
					mdui.alert('保存数据失败，错误码：' + data, '提示');
					
				}
			},
			error : function(textStatus, xhr){
				mdui.alert('保存数据失败', '提示');
				
			}
		});
		
	} else if (dialogMode == 2) {
		$('#mdui_loading').removeClass('mdui-hidden');
		mdui.$.showOverlay();
		
		mdui.$.ajax({
			method : 'POST',
			url : './data/admin.php',
			data : {
				type : 'media',
				do : '1',
				name : document.getElementById('mediaDialogName').value,
				url : document.getElementById('mediaDialogUrl').value,
				userhash : userHash
			},
			complete : function(xhr, textStatus) {
				$('#mdui_loading').addClass('mdui-hidden');
				mdui.$.hideOverlay();
			},
			success : function(data, textStatus, xhr){
				if (data == 'success') {
					mdui.alert('添加成功<br>您可能需要刷新以查看效果', '提示');
					
				} else if(data == 'failed') {
					mdui.alert('添加数据失败', '提示');
					
				} else {
					mdui.alert('添加数据失败，错误码：' + data, '提示');
					
				}
			},
			error : function(textStatus, xhr){
				mdui.alert('数据失败', '提示');
				
			}
		});
		
	}
});
