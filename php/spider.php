<?php
	$spider_check_done = false;
	$is_spider=false;
	function check_if_spider()
	{
		global $is_spider,$spider_check_done;
		if (!$spider_check_done) {
		    $spider_check_done = true;
		    // Add as many spiders you want in this array
		    $spiders = array('Googlebot', 'Yammybot', 'Openbot', 'Yahoo', 'Slurp', 'msnbot', 'ia_archiver', 'Lycos', 'Scooter', 'AltaVista', 'Teoma', 'Gigabot', 'Googlebot-Mobile');
		
		    // Loop through each spider and check if it appears in
		    // the User Agent
		    foreach ($spiders as $spider)
		    {
			if (preg_match("/$spider/", $_SERVER['HTTP_USER_AGENT']))
			{
				$is_spider = true;
				return TRUE;
			}
		    }
		    return FALSE;
		} else {
		    return $is_spider;
		}
	}
