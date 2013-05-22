<?php
include_once("dbconfig.php");
include_once("spider.php");
include_once("stats.php");
include_once("dbm.class.php");
if (!check_if_spider()) {
	session_start();
	stats_update_event("HIT_GETSURVEY");
}

function redirect_to_home() {
        header( 'Location: ../SurveyThankYou.php');
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

$link = new dbm(DBHOST,"laghuserdata",DBUSER,DBPASS);

$query = "insert into surveydata values ('$surveyname'";

foreach($out as $val) {
    $query = $query.",'$val'";
}

$query = $query.");";

$link->m_dbh->query("$query",$link);
$link->m_dbh->commit();

redirect_to_home();

