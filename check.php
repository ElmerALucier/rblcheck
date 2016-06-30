<?php
// mail-tester.com services

require("rblcheck.php");

$blockedList = rblcheck($argv[1]);
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
?>
