<?php
include_once("debug.php");
include_once("dbconfig.php");
include_once("spider.php");
include_once("stats.php");
include_once("dbm.class.php");
if (!check_if_spider()) {
	session_start();
	stats_update_event("HIT_ADDNEWINTEREST");
}

function redirect_to_home() {
	header( 'Location: ../index.php');
	exit();
}
function redirect_to_success() {
	header( 'Location: ../addedNewUser.php');
	exit();
}
/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}



$value = $_POST["emailaddress"];

if (strlen($value) > 100) {
	mylog("input value too long");
	redirect_to_home();
}

if (!validEmail($value)) {
	mylog("invalid email");
	redirect_to_home();
}
$link = new dbm(DBHOST,"laghuserdata",DBUSER,DBPASS);
$link->m_dbh->query("insert into interestedUsers value ('$value');",$link);

redirect_to_success();
