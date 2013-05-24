<?php
	include_once("php/spider.php");
	include_once("php/stats.php");
	if (!check_if_spider()) {
		session_start();
		$_SESSION["laghstate"]="joinus";
		stats_update_event("HIT_JOINUS");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Join Us?</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div style="background-image:url('img/titlebg.png');background-repeat:repeat-x;">
      <div style="margin-left:auto;margin-right:auto;width:70%;height:50px">
	<div style="height:100%;">
	  <b style="line-height:50px;font-size:30px;height:100%;"><a style="color:black;" href="index.php">lAghavA:</a></b><i style="color: azure; font-size:20px;">lightness of Being</i>

	</div>
      </div>
    </div>
    <div style="margin-left:auto;margin-right:auto;width:70%;text-align:center;">
<img src="img/narrowjoin.jpg" alt="Join Us" width=100% height=50px>
    </div>
    <div style="margin-left:auto;margin-right:auto;width:70%;" align="justify">
      <p class="lead" style="font-size:25px">
	If you are a <b>fresher</b> with good problem solving skills, <i style="background-color:#f8f998;"> No matter what branch or what your scores are,</i> we have an opportunity for you.
      </p>
      <p class="lead" style="font-size:25px">
	Send your Resume to us and we will call you for a short telephone interview. If you are selected we will put you through our rigorous 2 month <a class="btn btn-primary" style="font-size:25px;" href="info/courseoffering.pdf">training program</a></b>.
      </p>
      <p class="lead" style="font-size:25px">
	The cost of the training program is Rs20000, which will be borne by you. At the end of the program we will offer you a job starting at Rs5000 per month. This means that in the worst case you will have your money back by 6 months not to mention <i style="background-color:#f8f998;"><b>6 months of work experience to put on your resume and an industry level exposure to mobile technology.</b></i>
      </p>
      
      <p class="lead" style="font-size:25px">
	Our appraisal cycles are directly linked to the business we have, in the best case, we would upgrade your salary every month.
      </p>

      <p class="lead" style="font-size:25px">
	<b>Interested?</b> Then drop us your resume with your contact number to <a class="btn btn-primary" style="font-size:25px;" href="mailto:param@laghava.com">param@laghava.com</a>.
      </p>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
