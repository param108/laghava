template=[];
qtypes=["radio","radio","radio","radio","radio", "radio","check","radio","radio", "radio", "check", "radio"];
for i in range(0,12):
	qtype = qtypes[i]
	fp = open("q"+str(i)+".txt");
	lines = [ x.strip('\n') for x in fp.readlines()];
	template.append('<div id="radio'+str(i)+'" style="margin-left:auto;margin-right:auto;width:100%;text-align:left;display:block;left:15%;max-height:50%;">');
    	template.append('<div style="position:relative;width:95%;margin-left:auto;margin-right:auto;height:30%;" styleid="sizer">')
	template.append('<br>')
	if qtype == "radio":
		template.append('<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="radios">');
	else:
		template.append('<fieldset style="height:30%;margin-left:auto;margin-right:auto;" class="checkboxes largeqn">');
	template.append('<h3>'+lines[0]+'</h3>');
	choice = 1
	if qtype == "radio":
		qprefix="radio%(qn)02d"%{"qn":i};
	else:
		qprefix="checkbox%(qn)02d"%{"qn":i};
	for ans in lines[1:]:
		asuffix="%(ans)02d"%{"ans":choice}
		radiodet = qprefix+asuffix
		if qtype == "radio":
			template.append('<label class="label_radio '+"qn"+str(i)+'" for="'+radiodet+'"><input name="sample-radio-'+str(i)+'" id="'+radiodet+'" value="'+str(choice)+'" type="radio" checked />'+ans+'</label>') 
		else:
			template.append('<label class="label_check '+"qn"+str(i)+'" for="'+radiodet+'"><input name="sample-radio-'+str(i)+'" id="'+radiodet+'" value="'+str(choice)+'" type="checkbox" checked />'+ans+'</label>') 
		choice = choice + 1
        template.append('</fieldset> </div> </div>')
for line in template:
	print line

