function lagh_register_event(ev, c1,c2,c3,c4,c5,d1,d2,d3,d4,d5) {
c1 = (typeof optionalArg === "undefined") ? "" : c1;
c2 = (typeof optionalArg === "undefined") ? "" : c2;
c3 = (typeof optionalArg === "undefined") ? "" : c3;
c4 = (typeof optionalArg === "undefined") ? "" : c4;
c5 = (typeof optionalArg === "undefined") ? "" : c5;
d1 = (typeof optionalArg === "undefined") ? 0 : d1;
d2 = (typeof optionalArg === "undefined") ? 0 : d2;
d3 = (typeof optionalArg === "undefined") ? 0 : d3;
d4 = (typeof optionalArg === "undefined") ? 0 : d4;
d5 = (typeof optionalArg === "undefined") ? 0 : d5;
$.ajax({
  type: "POST",
  url: "php/rcvstats.php",
  data: { "event": ev, 
	  "c1": c1,
	  "c2": c2,
	  "c3": c3,
	  "c4": c4,
	  "c5": c5,
	  "d1": d1,
	  "d2": d2,
	  "d3": d3,
	  "d4": d4,
	  "d5": d5 }
})
}
	

