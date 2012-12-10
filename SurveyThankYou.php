<?php
	include_once("php/spider.php");
	include_once("php/stats.php");
	if (!check_if_spider()) {
		session_start();
		stats_update_event("HIT_SURVEYTHANKYOU");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Looks Interesting!</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div style="background-image:url('img/titlebg.png');background-repeat:repeat-x;">
      <div style="margin-left:auto;margin-right:auto;width:70%;height:50px">
	<div style="height:100%;">
	  <b style="line-height:50px;font-size:30px;height:100%;"><a style="color:black;" href="index.php">lAghavA:</a></b><i style="color:azure;font-size:20px;">lightness of Being</i>

	</div>
      </div>
    </div>
    <div style="margin-left:auto;margin-right:auto;width:70%;margin-top:200px;text-align:center;">
      <p class="lead" style="font-size:25px">
	Thank You for filling up the survey! If you would like to know more about <a class="btn btn-primary" href="index.php"><strong>Laghava.com</strong> click here.</a>
      </p>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
