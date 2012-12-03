<?php
include_once("dbconfig.php");
function redirect_to_home() {
        header( 'Location: http://www.laghava.com/index.html');
        exit();
}
# get db config, survey config and dump
# based on embedded secret data
if (!array_key_exists("surveyconfig",$_POST)) {
	error_log("Failed to find type of survey.... dying");
	redirect_to_home();
}
$surveyname = $_POST["surveyconfig"];
$out = array();
$dbdatafile = "dbconfig/".$surveyname.".php";
if (!file_exists($dbdatafile)) {
	error_log("could not find survey data.... dying");
	redirect_to_home();
}
include_once($dbdatafile);
$obj = new dbdata();
foreach ($obj->data as $key) {
	if (array_key_exists($key,$_POST)) {
		$out[$key] = $_POST[$key];
	} else {
		$out[$key] = "0";
	}
}

$link = mysql_connect(DBHOST,DBUSER,DBPASS);
if (!$link) {
        error_log("Could not connect to mysql");
        redirect_to_home();
}
mysql_select_db("laghuserdata",$link);
$query = "insert into surveydata values ('$surveyname'";
foreach($out as $val) {
    $query = $query.",'$val'";
}
$query = $query.");";
mysql_query("$query",$link);
mysql_close($link);

redirect_to_success();

