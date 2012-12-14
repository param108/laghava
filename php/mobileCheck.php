<?php
if (!defined("MOBILE_DETECT")) {
	define("MOBILE_DETECT",'Mobile-Detect-2.5.2/Mobile_Detect.php');
}
include_once(MOBILE_DETECT);
$md = new Mobile_Detect();
