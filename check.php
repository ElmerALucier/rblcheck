<?php
// mail-tester.com services

require("rbl_lib.php");

if(count($argv)>1){
	$blockedList = rblcheck(trim($argv[1]));
	if(count($blockedList) > 0)
	{
		// Your IP is blocked somewhere.
		echo "IP is blocked on:\n";
		print_r($blockedList);
	}
	else
	{
		echo "The IP is not blocked.";
	}
}else{
	echo "usage: php ".$_SERVER['SCRIPT_NAME']. " <ip>";
}
