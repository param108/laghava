import Image
import sys
import string
import os
filename = sys.argv[1]
dirname = sys.argv[2]
os.mkdir(dirname)
im = Image.open(filename)
prefix = filename.split(".")[0]
width = im.size[0]
height = im.size[1]
stepx = 300
stepy = 40
print '<table border="0" cellpadding="0">'
for y in range(0,height,stepy):
	print "<tr>"
	for x in range(0,width,stepx):
		if (x + stepx) > width:
			stepx = width - x 
		if (y + stepy) > height:
			stepy = height - y
		print "<td>"
		im2=im.crop([x,y,x+stepx,y+stepy])
		imagename = dirname+"/"+prefix+str(x)+"x"+str(y)+".png";
		imageurl = "img/"+imagename
		print '<img class="imgholder" src="'+imageurl+'" height="'+str(stepy)+'px" width="'+str(stepx)+'px" style="cursor:pointer;height:'+str(stepy)+'px;width:'+str(stepx)+'px;" />'
		im2.save(dirname+"/"+prefix+str(x)+"x"+str(y)+".png");
		print "</td>"
	print "</tr>"
print "</table>"
