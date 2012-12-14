<?php
	include_once("php/mobileCheck.php");
	include_once("php/spider.php");
	include_once("php/stats.php");
	if (!check_if_spider()) {
		session_start();
		stats_update_event("HIT_MSURVEY_ENTRY");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="../js/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>lAghavA:lightness of being</title>
    <!-- Bootstrap -->
    <link href="css/checkboxes.css" rel="stylesheet" media="screen"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
  </head>
  <body>
    <div style="color:azure; background-image:url('img/titlebg.png');background-repeat:repeat-x;display:block;width:100%;height:10%;top:0;">
      <div style="margin:auto;margin-left:auto;margin-right:auto;width:70%;height:10%">
	<div style="height:100%;">
	  <b style="line-height:50px;font-size:30px;height:100%;"><a style="color:black;" href="index.php">lAghavA:</a></b><i style="color:azure;font-size:20px;">lightness of Being</i>
	</div>
      </div>
    </div>
    <span style="color:khaki;font-size:50px;width:100%;"><strong>This survey is an anonymous survey. We do not store any of your personal data other than the answers that you choose.</strong></span><br/><br/>
    <div style="margin-left:auto;margin-right:auto;width:100%;text-align:center;">
      <span class="needbgnd" style="display:inline-block;">
	<p class="lead" style="font-size:50px">Are you a resident of Bangalore?</p>
	<p style="text-align:left;list-style-type:none;width:100%;">
	  <a  class="btn input-block-level btn-primary" style="font-size:x-large;" href="surveycontinue.php"><strong>Yes</strong>, I reside in Bangalore</a><br/>
	    <a  class="btn input-block-level btn-primary" style="font-size:x-large;" href="SurveyNotNow.php"><strong>No</strong>, I dont reside in Bangalore</a>
	</p>
      </span>
    </div>    
    <div style="width:100%;position:absolute;top:90%;text-align:center;z-index:-1;">
      <strong style="font-size:x-large;">Interested in taking your life to the next level? Why not <a class="btn btn-primary" href="willcall.php">take us for a spin</a> ?</strong>
    </div>
  </body>
</html>