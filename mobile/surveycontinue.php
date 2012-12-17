<?php
	include_once("php/spider.php");
	include_once("php/stats.php");
	if (!check_if_spider()) {
		session_start();
		stats_update_event("HIT_MSURVEY_CONTINUE");
	}
?>
<!DOCTYPE html>
<html style="height:100%;">
  <head>
    <script src="js/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/laghstats.js"></script>
    <script>
    var d = document;
    var safari = (navigator.userAgent.toLowerCase().indexOf('safari') != -1) ? true : false;
    var gebtn = function(parEl,child) { return parEl.getElementsByTagName(child); };
    var qn = 0;
    var chosenchecks = 0;
    var type=["radio","radio","radio","radio","radio", "radio","check","radio","radio", "radio", "check", "radio"]
    onload = function() {
        var body = gebtn(d,'body')[0];
        body.className = body.className && body.className != '' ? body.className + ' has-js' : 'has-js';
        
        if (!d.getElementById || !d.createTextNode) return;
        for(var j = 1; j<= 12; j++) {
			   $("#radio"+j).hide();
        }
	$(".qn0").click(turn_radio);
        $(".label_check").addClass("c_off");
        $(".label_radio").addClass("r_off");
	$("#coverpg").hide("slow");
	$("#surveyform").show();
    };
    var check_it = function() {
	if ($(this).hasClass("c_off")) {
		$(this).removeClass("c_off");
		$(this).addClass("c_on");
		chosenchecks += 1;
	        if (chosenchecks == 5) {
	            $(".qn"+qn).unbind('click');
	            setTimeout(function() {
		        $("#radio"+(qn)).hide();
		        qn = qn + 1;
			if (qn == 12) {
				$("#sbmtbtn").click();
			} else {
		        if (type[qn] == "radio") {
			    $(".qn"+qn).click(turn_radio);
		        } else {
			    chosenchecks = 0;
			    $(".qn"+qn).click(check_it);
		        }
		        $("#radio"+(qn)).show();
			}
	            }, 100);
	        } else {
		    $(".qn"+qn).unbind('click');
	            setTimeout(function() {
			    $(".qn"+qn).click(check_it);
		        },100);	
		}
	 } else if ($(this).hasClass("c_on")) {
		$(this).removeClass("c_on");
		$(this).addClass("c_off");
		chosenchecks -= 1;
		$(".qn"+qn).unbind('click');
	        setTimeout(function() {
			    $(".qn"+qn).click(check_it);
		       },100);	
	}
    };
//    $(document).resize(function() {
//		if ($(".qn"+qn).height() > $(document).height()) {
//			$(".qn"+qn).height(0.5*$(document).height());
//		}
//	}
//    );
    var turn_radio = function() {
        var inp = gebtn(this,'input')[0];
	if ($(this).hasClass("r_off")) {
		$(this).removeClass("r_off");
		$(this).addClass("r_on");
	        $(".qn"+qn).unbind('click');
	        setTimeout(function() {
		    $("#radio"+(qn)).hide();
		    qn = qn + 1;
		    if (qn == 12) {
			lagh_register_event("SURVEY_COMPLETE");
			$("#sbmtbtn").click();
		    } else {
		    if (type[qn] == "radio") {
		        $(".qn"+qn).click(turn_radio);
		    } else {
		        chosenchecks = 0;
		        $(".qn"+qn).click(check_it);
		    }
		    $("#radio"+(qn)).show();
		    }
	        }, 100);
	 } else if ($(this).hasClass("r_on")) {
		$(this).removeClass("r_on");
		$(this).addClass("r_off");
	}
    };
    </script>

    <title>lAghavA:lightness of being</title>
    <!-- Bootstrap -->
    <link href="css/checkboxes.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body style="height:100%;">
    <div id="coverpg" style="background-image:url('img/design.png');position:fixed;margin-left:auto;margin-right:auto;top:0px;left:0px;text-align:center;height:100%;width:100%;">
      <p class="lead" style="margin-top:15%;font-size:25px;">
        Survey Loading.... Please wait.
      </p>
    </div>
    <div style="color:azure; background-image:url('img/titlebg.png');background-repeat:repeat-x;display:block;width:100%;top:0;">
      <div style="padding-top:5px;padding-bottom:5px;margin-left:auto;margin-right:auto;width:70%;height:10%">
	<div style="height:100%;">
	  <b style="font-size:x-large;height:100%;"><a style="color:black;" href="index.php">lAghavA:</a></b><i style="color:azure;">lightness of Being</i>
	</div>
      </div>
    </div>
    <form id="surveyform" style="display:none;" action="php/getsurvey.php" method="post" accept-charset="utf-8">
<div id="radio0" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>Your Occupation</h3>
<label class="label_radio qn0" for="radio0001"><input name="sample-radio-0" id="radio0001" value="1" type="radio" checked /> self employed</label>
<label class="label_radio qn0" for="radio0002"><input name="sample-radio-0" id="radio0002" value="2" type="radio" checked /> unemployed</label>
<label class="label_radio qn0" for="radio0003"><input name="sample-radio-0" id="radio0003" value="3" type="radio" checked /> employed in a company of corporation</label>
<label class="label_radio qn0" for="radio0004"><input name="sample-radio-0" id="radio0004" value="4" type="radio" checked /> Homemaker</label>
</fieldset> </div> </div>
<div id="radio1" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>Your monthly Family income</h3>
<label class="label_radio qn1" for="radio0101"><input name="sample-radio-1" id="radio0101" value="1" type="radio" checked /> below 50K per month</label>
<label class="label_radio qn1" for="radio0102"><input name="sample-radio-1" id="radio0102" value="2" type="radio" checked /> 50K - 1lakh per month</label>
<label class="label_radio qn1" for="radio0103"><input name="sample-radio-1" id="radio0103" value="3" type="radio" checked /> 1lakh - 2lakh per month</label>
<label class="label_radio qn1" for="radio0104"><input name="sample-radio-1" id="radio0104" value="4" type="radio" checked /> 2lakh -3lakh per month</label>
<label class="label_radio qn1" for="radio0105"><input name="sample-radio-1" id="radio0105" value="5" type="radio" checked /> 3lakh - 4lakh per month</label>
<label class="label_radio qn1" for="radio0106"><input name="sample-radio-1" id="radio0106" value="6" type="radio" checked /> 4lakh - 5lakh per month</label>
<label class="label_radio qn1" for="radio0107"><input name="sample-radio-1" id="radio0107" value="7" type="radio" checked /> 5 lakhs - 10 lakhs per month</label>
<label class="label_radio qn1" for="radio0108"><input name="sample-radio-1" id="radio0108" value="8" type="radio" checked /> greater than 10 lakhs per month</label>
</fieldset> </div> </div>
<div id="radio2" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>paying my bills and premiums on time are a great inconvenience</h3>
<label class="label_radio qn2" for="radio0201"><input name="sample-radio-2" id="radio0201" value="1" type="radio" checked /> strongly disagree</label>
<label class="label_radio qn2" for="radio0202"><input name="sample-radio-2" id="radio0202" value="2" type="radio" checked /> mostly disagree</label>
<label class="label_radio qn2" for="radio0203"><input name="sample-radio-2" id="radio0203" value="3" type="radio" checked /> slightly disagree</label>
<label class="label_radio qn2" for="radio0204"><input name="sample-radio-2" id="radio0204" value="4" type="radio" checked /> slightly agree </label>
<label class="label_radio qn2" for="radio0205"><input name="sample-radio-2" id="radio0205" value="5" type="radio" checked /> mostly agree</label>
<label class="label_radio qn2" for="radio0206"><input name="sample-radio-2" id="radio0206" value="6" type="radio" checked /> strongly agree</label>
</fieldset> </div> </div>
<div id="radio3" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>household chores like groceries, laundry, banking etc are a great inconvenience</h3>
<label class="label_radio qn3" for="radio0301"><input name="sample-radio-3" id="radio0301" value="1" type="radio" checked /> strongly disagree</label>
<label class="label_radio qn3" for="radio0302"><input name="sample-radio-3" id="radio0302" value="2" type="radio" checked /> mostly disagree</label>
<label class="label_radio qn3" for="radio0303"><input name="sample-radio-3" id="radio0303" value="3" type="radio" checked /> slightly disagree</label>
<label class="label_radio qn3" for="radio0304"><input name="sample-radio-3" id="radio0304" value="4" type="radio" checked /> slightly agree </label>
<label class="label_radio qn3" for="radio0305"><input name="sample-radio-3" id="radio0305" value="5" type="radio" checked /> mostly agree</label>
<label class="label_radio qn3" for="radio0306"><input name="sample-radio-3" id="radio0306" value="6" type="radio" checked /> strongly agree</label>
</fieldset> </div> </div>
<div id="radio4" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>On average how much time are you busy in a day?</h3>
<label class="label_radio qn4" for="radio0401"><input name="sample-radio-4" id="radio0401" value="1" type="radio" checked /> less than 1hr</label>
<label class="label_radio qn4" for="radio0402"><input name="sample-radio-4" id="radio0402" value="2" type="radio" checked /> 1hr - 5hr</label>
<label class="label_radio qn4" for="radio0403"><input name="sample-radio-4" id="radio0403" value="3" type="radio" checked /> 5hr - 8hrs</label>
<label class="label_radio qn4" for="radio0404"><input name="sample-radio-4" id="radio0404" value="4" type="radio" checked /> 8hrs - 14hrs</label>
<label class="label_radio qn4" for="radio0405"><input name="sample-radio-4" id="radio0405" value="5" type="radio" checked /> more than 14hrs</label>
</fieldset> </div> </div>
<div id="radio5" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>How much of your time is spent in household chores (groceries, laundry, banking etc..) per week?</h3>
<label class="label_radio qn5" for="radio0501"><input name="sample-radio-5" id="radio0501" value="1" type="radio" checked /> less than 2 hrs</label>
<label class="label_radio qn5" for="radio0502"><input name="sample-radio-5" id="radio0502" value="2" type="radio" checked /> 2hrs - 4hrs</label>
<label class="label_radio qn5" for="radio0503"><input name="sample-radio-5" id="radio0503" value="3" type="radio" checked /> 4hrs - 6 hrs</label>
<label class="label_radio qn5" for="radio0504"><input name="sample-radio-5" id="radio0504" value="4" type="radio" checked /> 6hrs - 8 hrs</label>
<label class="label_radio qn5" for="radio0505"><input name="sample-radio-5" id="radio0505" value="5" type="radio" checked /> 8hrs - 10 hrs</label>
<label class="label_radio qn5" for="radio0506"><input name="sample-radio-5" id="radio0506" value="6" type="radio" checked /> above 10 hrs</label>
</fieldset> </div> </div>
<div id="radio6" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="checkboxes largeqn">
<h3>If I had more time I would do (pick top 5)</h3>
<label class="label_check qn6" for="checkbox0601"><input name="sample-radio-6" id="checkbox0601" value="1" type="checkbox" checked /> work related learning </label>
<label class="label_check qn6" for="checkbox0602"><input name="sample-radio-6" id="checkbox0602" value="2" type="checkbox" checked /> hobbies</label>
<label class="label_check qn6" for="checkbox0603"><input name="sample-radio-6" id="checkbox0603" value="3" type="checkbox" checked /> travelling</label>
<label class="label_check qn6" for="checkbox0604"><input name="sample-radio-6" id="checkbox0604" value="4" type="checkbox" checked /> spending time with family</label>
<label class="label_check qn6" for="checkbox0605"><input name="sample-radio-6" id="checkbox0605" value="5" type="checkbox" checked /> exercise</label>
<label class="label_check qn6" for="checkbox0606"><input name="sample-radio-6" id="checkbox0606" value="6" type="checkbox" checked /> relaxing (Time pass).</label>
<label class="label_check qn6" for="checkbox0607"><input name="sample-radio-6" id="checkbox0607" value="7" type="checkbox" checked /> work on a business Idea</label>
<label class="label_check qn6" for="checkbox0608"><input name="sample-radio-6" id="checkbox0608" value="8" type="checkbox" checked /> religious activities</label>
<label class="label_check qn6" for="checkbox0609"><input name="sample-radio-6" id="checkbox0609" value="9" type="checkbox" checked /> financial planning</label>
<label class="label_check qn6" for="checkbox0610"><input name="sample-radio-6" id="checkbox0610" value="10" type="checkbox" checked /> stock market</label>
<label class="label_check qn6" for="checkbox0611"><input name="sample-radio-6" id="checkbox0611" value="11" type="checkbox" checked /> spending time with friends</label>
<label class="label_check qn6" for="checkbox0612"><input name="sample-radio-6" id="checkbox0612" value="12" type="checkbox" checked /> networking</label>
<label class="label_check qn6" for="checkbox0613"><input name="sample-radio-6" id="checkbox0613" value="13" type="checkbox" checked /> shopping</label>
<label class="label_check qn6" for="checkbox0614"><input name="sample-radio-6" id="checkbox0614" value="14" type="checkbox" checked /> Touching up the house</label>
<label class="label_check qn6" for="checkbox0615"><input name="sample-radio-6" id="checkbox0615" value="15" type="checkbox" checked /> alternate source of income</label>
<label class="label_check qn6" for="checkbox0616"><input name="sample-radio-6" id="checkbox0616" value="16" type="checkbox" checked /> self development</label>
<label class="label_check qn6" for="checkbox0617"><input name="sample-radio-6" id="checkbox0617" value="17" type="checkbox" checked /> research</label>
<label class="label_check qn6" for="checkbox0618"><input name="sample-radio-6" id="checkbox0618" value="18" type="checkbox" checked /> more work</label>
<label class="label_check qn6" for="checkbox0619"><input name="sample-radio-6" id="checkbox0619" value="19" type="checkbox" checked /> social work or volunteering</label>
</fieldset> </div> </div>
<div id="radio7" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>There are aspects of my life or dreams that are important to me that I do not get time to work on.</h3>
<label class="label_radio qn7" for="radio0701"><input name="sample-radio-7" id="radio0701" value="1" type="radio" checked /> strongly disagree</label>
<label class="label_radio qn7" for="radio0702"><input name="sample-radio-7" id="radio0702" value="2" type="radio" checked /> mostly disagree</label>
<label class="label_radio qn7" for="radio0703"><input name="sample-radio-7" id="radio0703" value="3" type="radio" checked /> slightly disagree</label>
<label class="label_radio qn7" for="radio0704"><input name="sample-radio-7" id="radio0704" value="4" type="radio" checked /> slightly agree </label>
<label class="label_radio qn7" for="radio0705"><input name="sample-radio-7" id="radio0705" value="5" type="radio" checked /> mostly agree</label>
<label class="label_radio qn7" for="radio0706"><input name="sample-radio-7" id="radio0706" value="6" type="radio" checked /> strongly agree</label>
</fieldset> </div> </div>
<div id="radio8" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>Hiring a personal assistant, to organize and do the chores and other tasks where I am personally not required, appeals to me.</h3>
<label class="label_radio qn8" for="radio0801"><input name="sample-radio-8" id="radio0801" value="1" type="radio" checked /> strongly disagree</label>
<label class="label_radio qn8" for="radio0802"><input name="sample-radio-8" id="radio0802" value="2" type="radio" checked /> mostly disagree</label>
<label class="label_radio qn8" for="radio0803"><input name="sample-radio-8" id="radio0803" value="3" type="radio" checked /> slightly disagree</label>
<label class="label_radio qn8" for="radio0804"><input name="sample-radio-8" id="radio0804" value="4" type="radio" checked /> slightly agree </label>
<label class="label_radio qn8" for="radio0805"><input name="sample-radio-8" id="radio0805" value="5" type="radio" checked /> mostly agree</label>
<label class="label_radio qn8" for="radio0806"><input name="sample-radio-8" id="radio0806" value="6" type="radio" checked /> strongly agree</label>
</fieldset> </div> </div>
<div id="radio9" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>Hiring a personal assistant to enhance my life appeals to me</h3>
<label class="label_radio qn9" for="radio0901"><input name="sample-radio-9" id="radio0901" value="1" type="radio" checked /> strongly disagree</label>
<label class="label_radio qn9" for="radio0902"><input name="sample-radio-9" id="radio0902" value="2" type="radio" checked /> mostly disagree</label>
<label class="label_radio qn9" for="radio0903"><input name="sample-radio-9" id="radio0903" value="3" type="radio" checked /> slightly disagree</label>
<label class="label_radio qn9" for="radio0904"><input name="sample-radio-9" id="radio0904" value="4" type="radio" checked /> slightly agree </label>
<label class="label_radio qn9" for="radio0905"><input name="sample-radio-9" id="radio0905" value="5" type="radio" checked /> mostly agree</label>
<label class="label_radio qn9" for="radio0906"><input name="sample-radio-9" id="radio0906" value="6" type="radio" checked /> strongly agree</label>
</fieldset> </div> </div>
<div id="radio10" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="checkboxes largeqn">
<h3>what should a personal assistant do? (choose top 5)</h3>
<label class="label_check qn10" for="checkbox1001"><input name="sample-radio-10" id="checkbox1001" value="1" type="checkbox" checked /> do the chores and tasks that do not require my personal presence</label>
<label class="label_check qn10" for="checkbox1002"><input name="sample-radio-10" id="checkbox1002" value="2" type="checkbox" checked /> remind me about my personal commitments</label>
<label class="label_check qn10" for="checkbox1003"><input name="sample-radio-10" id="checkbox1003" value="3" type="checkbox" checked /> work with me and facilitate me to fulfill on my personal goals     </label>
<label class="label_check qn10" for="checkbox1004"><input name="sample-radio-10" id="checkbox1004" value="4" type="checkbox" checked /> be available in times of emergency</label>
<label class="label_check qn10" for="checkbox1005"><input name="sample-radio-10" id="checkbox1005" value="5" type="checkbox" checked /> monitor my time usage in a day and suggest ways to get me more time</label>
<label class="label_check qn10" for="checkbox1006"><input name="sample-radio-10" id="checkbox1006" value="6" type="checkbox" checked /> do research work on things that are important to me, such as best prices of goods, vacation ideas, etc.</label>
<label class="label_check qn10" for="checkbox1007"><input name="sample-radio-10" id="checkbox1007" value="7" type="checkbox" checked /> help me be in touch with my friends and network</label>
<label class="label_check qn10" for="checkbox1008"><input name="sample-radio-10" id="checkbox1008" value="8" type="checkbox" checked /> event management such as parties and get-togethers.</label>
<label class="label_check qn10" for="checkbox1009"><input name="sample-radio-10" id="checkbox1009" value="9" type="checkbox" checked /> motivate me to accomplish my goals</label>
</fieldset> </div> </div>
<div id="radio11" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">
<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">
<br>
<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">
<h3>I would pay a personal assistant</h3>
<label class="label_radio qn11" for="radio1101"><input name="sample-radio-11" id="radio1101" value="1" type="radio" checked /> less than 1000Rs per month</label>
<label class="label_radio qn11" for="radio1102"><input name="sample-radio-11" id="radio1102" value="2" type="radio" checked /> 1000 Rs - 2000Rs per month</label>
<label class="label_radio qn11" for="radio1103"><input name="sample-radio-11" id="radio1103" value="3" type="radio" checked /> 2000 Rs - 3000Rs per month</label>
<label class="label_radio qn11" for="radio1104"><input name="sample-radio-11" id="radio1104" value="4" type="radio" checked /> 3000 Rs - 4000Rs per month</label>
<label class="label_radio qn11" for="radio1105"><input name="sample-radio-11" id="radio1105" value="5" type="radio" checked /> 4000 Rs - 5000Rs per month</label>
<label class="label_radio qn11" for="radio1106"><input name="sample-radio-11" id="radio1106" value="6" type="radio" checked /> more than 5000Rs per month</label>
<label class="label_radio qn11" for="radio1107"><input name="sample-radio-11" id="radio1107" value="7" type="radio" checked /></label>
</fieldset> </div> </div>
</form>
    <div style="width:100%;text-align:center;z-index:-1;">
      <strong style="font-size:25px;">Interested in taking your life to the next level? Why not <a class="btn btn-primary" href="willcall.php">take us for a spin</a> ?</strong>
    </div>
  </body>
</html>
