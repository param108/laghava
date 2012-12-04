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
step = 300
print "<table>"
for y in range(0,height,step):
	print "<tr>"
	for x in range(0,width,step):
		stepx = step
		stepy = step
		if (x + step) > width:
			stepx = width - x 
		if (y + step) > height:
			stepy = height - y
		print "<td>"
		im2=im.crop([x,y,x+stepx,y+stepy])
		imagename = dirname+"/"+prefix+str(x)+"x"+str(y)+".png";
		imageurl = "img/"+imagename
		print '<img src="'+imageurl+'"/>'
		im2.save(dirname+"/"+prefix+str(x)+"x"+str(y)+".png");
		print "</td>"
	print "</tr>"
print "</table>"
