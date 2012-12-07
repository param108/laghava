<?php
include_once("dbconfig.php");

// assume session_start already called before calling this
function stats_update_event($event, $c1="",$c2="",$c3="",$c4="",$c5="",
			   	$d1=0, $d2=0, $d3=0, $d4=0, $d5=0)
{
$link = mysql_connect(DBHOST,DBUSER,DBPASS);
if (!$link) {
        error_log("Could not connect to mysql");
	die();
}
mysql_select_db("laghuserdata",$link);
$result = mysql_query("insert into userevents values  (NOW(),'".session_id()."','".$event."','".substr($_SERVER['HTTP_USER_AGENT'],0,40)."','".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$d1."','".$d2."','".$d3."','".$d4."','".$d5."');",$link);
if (!$result) {
    error_log('Invalid query: ' . mysql_error());
    die();
}
mysql_close($link);
}
