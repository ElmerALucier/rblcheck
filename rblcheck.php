<?php
// mail-tester.com services

if(!function_exists("rblcheck"))
{
	// Lookup IPv4 IPs on a set of blacklists.
	function rblcheck($ip)
	{
		$blacklists = array(
			"ips.backscatterer.org",
			"spamrbl.imp.ch",
			"service.mailblacklist.com",
			"psbl.surriel.com",
			"backscatter.spameatingmonkey.net",
			"dnsbl.sorbs.net",
			"zen.spamhaus.org",
			"db.wpbl.info",
			"b.barracudacentral.org",
			"dnsbl.inps.de",
			"bl.mailspike.net",
			"spam.spamrats.com",
			"bl.spameatingmonkey.net",
			"bl.spamcannibal.org",
			"uribl.swinog.ch",
			"cblplus.anti-spam.org.cn",
			"ubl.unsubscore.com",
			"ix.dnsbl.manitu.net",
			"access.redhawk.org",
			"spam.dnsbl.sorbs.net",
			"bl.spamcop.net",
			"truncate.gbudb.net",
			
			// "0spam.fusionzero.com",
			// "bl.tiopan.com",
			// "blackholes.five-ten-sg.com",
			// "blackholes.intersil.net",
			// "bogons.cymru.com",
			// "cbl.abuseat.org",
			// "combined.njabl.org",
			// "dnsbl.ahbl.org",
			// "dnsbl.justspam.org",
			// "dnsbl.mags.net",
			// "dnsbl.rangers.eu.org",
			// "dnsbl-1.uceprotect.net",
			// "ip.v4bl.org",
			// "l2.apews.org",
			// "no-more-funn.moensted.dk",
			// "rbl.efnet.org",
			// "drone.abuse.ch",
			// "spam.dnsbl.anonmails.de",
			// "spamguard.leadmon.net",
			// "t1.dnsbl.net.au",
			// "tor.dan.me.uk",
			// "tor.dnsbl.sectoor.de",
			// "virbl.dnsbl.bit.nl",
			// "dul.ru",
			// "spamsources.fabel.dk",
			// "dnsrbl.swinog.ch",
			// "dnsbl.kempt.net",
			// "blacklist.woody.ch",
			// "virbl.bit.nl",
			// "orvedb.aupads.org",
			// "korea.services.net",
			// "bl.emailbasura.org"
		);
		
		$listed = array();
		
		if($ip && filter_var($ip, FILTER_VALIDATE_IP))
		{
			$reverse_ip = implode(".", array_reverse(explode(".",$ip)));
			foreach($blacklists as $blacklist)
			{
				if(checkdnsrr($reverse_ip.".".$blacklist.".", "A"))
				{
					$listed[] = $blacklist;
				}
			}
		}
		
		return count($listed) > 0 ? $listed : null;
	}
}
?>
