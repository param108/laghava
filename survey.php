<?php
	include_once("php/mobileCheck.php");
	include_once("php/spider.php");
	include_once("php/stats.php");
	if (!check_if_spider()) {
		session_start();
		stats_update_event("HIT_SURVEY_ENTRY");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="js/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>lAghavA:lightness of being</title>
    <!-- Bootstrap -->
    <link href="css/checkboxes.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
<?php
	if ($md->isMobile()) {
		print('<div style="color:khaki;background-color:#245982;width:100%;line-height:50px">Do you want the mobile version?<br>\
	  <a  class="btn input-block-level btn-primary" href="surveycontinue.php"><strong>Yes</strong> switch to mobile version</a><br>\
	  <a  class="btn input-block-level btn-primary" href="SurveyNotNow.php"><strong>No</strong>Do not switch</a>\
	</div>');
	}
?>
    <div style="background-image:url('img/design.png');width:100%;height:100%;position:fixed;z-index:-1;overflow:scroll;">
    <div style="color:azure; background-image:url('img/titlebg.png');background-repeat:repeat-x;display:block;width:100%;height:10%;top:0;">
      <div style="margin:auto;margin-left:auto;margin-right:auto;width:70%;height:10%">
	<div style="height:100%;">
	  <b style="line-height:50px;font-size:30px;height:100%;"><a style="color:black;" href="index.php">lAghavA:</a></b><i style="color:azure;font-size:20px;">lightness of Being</i>
	</div>
      </div>
    </div>
    <div class="needbgnd" style="margin-left:auto;margin-right:auto;width:70%;text-align:center;">
	<i style="color:khaki"><strong>This survey is an anonymous survey. We do not store any of your personal data other than the answers that you choose.</strong></i><br><br>
    </div>
    <div style="margin-left:auto;margin-right:auto;width:70%;margin-top:10%;text-align:center;">
      <span class="needbgnd" style="display:inline-block;">
      <p class="lead" style="font-size:25px">Are you a resident of Bangalore?</p>
	<p style="text-align:left;list-style-type:none;width:100%;">
	  <a  class="btn input-block-level btn-primary" href="surveycontinue.php"><strong>Yes</strong>, I reside in Bangalore</a><br>
	  <a  class="btn input-block-level btn-primary" href="SurveyNotNow.php"><strong>No</strong>, I dont reside in Bangalore</a>
	</p>
      </span>
    </div>    
    <div style="width:100%;position:absolute;top:90%;text-align:center;z-index:-1;">
      <strong style="font-size:25px;">Interested in taking your life to the next level? Why not <a class="btn btn-primary" href="willcall.php">take us for a spin</a> ?</strong>
    </div>
  </div>
  </body>
</html>
