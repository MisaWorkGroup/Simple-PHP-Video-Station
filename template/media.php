<?php if (!defined('_IN_STATION_')) die('Access Denied');
	require_once('template/header.php');
	
	if (!empty($media['error'])) {
		require_once("template/nomedia.php");
		
	} else {
		require_once("template/mediaplayer.php");
		
	}
?>
</div>
<br>

<? require_once("template/footer.php"); ?>
