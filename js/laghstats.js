function lagh_register_event(event, c1="",c2="",c3="",c4="",c5="",d1=0,d2=0,d3=0,d4=0,d5=0) {
$.ajax({
  type: "POST",
  url: "php/rcvstats.php",
  data: { event: event, 
	  c1: c1,
	  c2: c2,
	  c3: c3,
	  c4: c4,
	  c5: c5,
	  d1: d1,
	  d2: d2,
	  d3: d3,
	  d4: d4,
	  d5: d5 }
})
}
	

