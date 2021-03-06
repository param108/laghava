<?php
	include_once("php/spider.php");
	include_once("php/stats.php");
	if (!check_if_spider()) {
		session_start();
                $_SESSION["laghstate"]="index";
		stats_update_event("HIT_INDEX");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/laghstats.js"></script>
    <script>

      var first_time = true;
      function onClickDiscover() {
	if (first_time) {
	    first_time = false;
           lagh_register_event("LOAD_CLICKED");	
	}
      $(".discoverbtn").hide();
      $(".planbtn").show();
      }
      function onClickPlan() {
      $(".discoverbtn").show();
      $(".planbtn").hide();
      }

      function resizepic() {
      width=$("#titlestrip").width();
      height=$(window).height()*0.8;
      if (!((height > 480) && (width > 900))) {
		   dwd = (width/900);
		   dht  = (height/480);
		   dd = 0;
		   if (dht < dwd) {
			dd = dht;
		   } else {
			dd = dwd;
		   }
		   myht = (160*dd);
		   mywd = (300*dd);
		   $(".imgholder").each(function() {
		       $(this).width(mywd);
		       $(this).height(myht);
		   });
	} else {
	   $(".imgholder").each(function() {
		       $(this).width(300);
		       $(this).height(160);
		   });

	}
      }
      var imagesloaded=0;
      function onloadimage() {
	    imagesloaded++;
	    if (imagesloaded == 18) {
                lagh_register_event("LOAD_ALL_COMPLETE");
	    }
      }
      $(document).ready(function() {
      $(".planbtn").hide();
      $(".planbtn").click(onClickPlan);
      $(".discoverbtn").click(onClickDiscover);
      $(".imgholder").load(onloadimage);
      $(window).resize(resizepic);
      resizepic();	
      lagh_register_event("LOAD_READY");
      });
    </script>
    <title>lAghavA:lightness of being</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/index.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div style="background-image:url('img/titlebg.png');background-repeat:repeat-x;">
      <div style="margin-left:auto;margin-right:auto;width:70%;height:50px">
	<div id="titlestrip" style="height:100%;">
	  <b style="line-height:50px;font-size:30px;height:100%;"><a style="color:black;" href="index.php">lAghavA:</a></b><i style="color:azure;font-size:20px;">lightness of Being</i>
	</div>
      </div>
    </div>
    <div class="menubar" link="azure" alink="azure" vlink="khaki" style="margin-top:-1px;margin-left:auto;margin-right:auto;width:70%;text-align:right;" >
    <div style="display:inline-block;padding-bottom:5px;padding-top:5px;padding-left:5px;padding-right:5px;margin-top:0;margin-left:2px;margin-right:2px;background:#245982;color:azure"><a class="menubarlink" href="aboutus.html"><b>About us</b></a></div>
    <div style="display:inline-block;padding-bottom:5px;padding-top:5px;padding-left:5px;padding-right:5px;margin-top:0;margin-left:2px;margin-right:2px;background:#245982;color:azure"><a class="menubarlink" href="methodology.html"><b>Methodology</b></a></div>
    <div style="display:inline-block;padding-top:5px;padding-right:5px;padding-left:5px;padding-bottom:5px;margin-left:2px;margin-right:2px;background:#245982;color:azure"><a class="menubarlink" href="survey.php"><b>Survey</b></a></div>
    </div>
    <div style="margin-top:5px;margin-left:auto;margin-right:auto;width:70%;text-align:center;" >
    </div>
    <div class="discoverbtn" style="margin-left:auto;margin-right:auto;width:70%;max-height:60%;text-align:center;" >
<table border="0" cellpadding="0" style="margin-left:auto;margin-right:auto;">
<tr>
<td>
<img class="imgholder" src="img/todolist/todolist0x0.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/todolist/todolist300x0.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/todolist/todolist600x0.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
</tr>
<tr>
<td>
<img class="imgholder" src="img/todolist/todolist0x160.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/todolist/todolist300x160.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/todolist/todolist600x160.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
</tr>
<tr>
<td>
<img class="imgholder" src="img/todolist/todolist0x320.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/todolist/todolist300x320.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/todolist/todolist600x320.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
</tr>
</table>
    <!-- <img class="imgholder" src="img/todolist.png" height="600px" width="1600px" class="discoverbtn" style="cursor:pointer;cursor:pointer;width:1600px;height:640px;" onClick="onClickDiscover()"/> -->
    </div>
    <div class= "planbtn" style="cursor:pointer;margin-left:auto;margin-right:auto;width:70%;max-height:60%;" >

<table border="0" cellpadding="0" style="margin-left:auto;margin-right:auto;">
<tr>
<td>
<img class="imgholder" src="img/leffect/leffect0x0.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/leffect/leffect300x0.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/leffect/leffect600x0.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
</tr>
<tr>
<td>
<img class="imgholder" src="img/leffect/leffect0x160.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/leffect/leffect300x160.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/leffect/leffect600x160.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
</tr>
<tr>
<td>
<img class="imgholder" src="img/leffect/leffect0x320.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/leffect/leffect300x320.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
<td>
<img class="imgholder" src="img/leffect/leffect600x320.png" height="160px" width="300px" style="cursor:pointer;height:160px;width:300px;" />
</td>
</tr>
</table>
<!--    <img src="img/leffect.png" height="600px" width="1200px" class="planbtn" style="cursor:pointer;cursor:pointer;width:1200px;height:640px;" onClick="onClickPlan()"/> -->
    </div>
    <div style="text-align:center;">
      <strong style="font-size:25px;">Interested in taking your life to the next level? Why not <a class="btn btn-primary" href="willcall.php">take us for a spin</a> ?</strong><br>
	<b>[</b><a href="methodology.html">Methodology</a><b>].[</b><a href="survey.php">Survey</a><b>]</b>
    </div>
  </body>
</html>
