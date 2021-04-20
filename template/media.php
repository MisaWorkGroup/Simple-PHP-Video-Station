<?php if (!defined('_IN_STATION_')) die('Access Denied');
	include 'template/header.php';
	
	if (!empty($media['error'])) {
		include "template/nomedia.php";
		
	} else {
		include "template/mediaplayer.php";
		
	}
?>
</div>
<br>

<? include "template/footer.php"; ?>