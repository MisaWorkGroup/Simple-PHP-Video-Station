<?php
	if (!defined('_IN_STATION_')) die('Access Denied');

	function isHTTPS() {
	    if (defined('HTTPS') && HTTPS) return true;
	    if (!isset($_SERVER)) return FALSE;
	    if (!isset($_SERVER['HTTPS'])) return FALSE;
	    if ($_SERVER['HTTPS'] === 1) {
	        return TRUE;
	    } elseif ($_SERVER['HTTPS'] === 'on') {
	        return TRUE;
	    } elseif ($_SERVER['SERVER_PORT'] == 443) {
	        return TRUE;
	    }
	    return FALSE;
	}
	
	function rand_string($length) {
		$str = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 
			'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's', 
			't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D', 
			'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O', 
			'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z', 
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$keys = array_rand($str, $length); 
		$rand_string = '';
		
		for($i = 0; $i < $length; $i++) {
			$rand_string .= $str[$keys[$i]];
		}
		
		return $rand_string;
	}
	
	function new_strlen($str) {
		$len = strlen($str);
		$i = 0;
		$j = 0;
		
		while ($i < $len) {
			if (preg_match('/^[' . chr(0xa1) . '-' . chr(0xf9) . ']+$/', $str[$i])) {
				$i += 3;
			} else {
				$i += 1;
			}
			$j++;
		}
		
		return $j;
	}
?>
