<?php
function mylog($str) {
	error_log($str."\n",3,"logfile.txt");
}

