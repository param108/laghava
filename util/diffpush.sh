#!/bin/bash -x

if [ "$1a" = "a" ]
then
	echo "usage $0 <git tag>"
	exit -1
fi

NAMES=""
for file in `git diff --name-only $1`
do
	if [ -f $file ]
	then
		NAMES="$NAMES $file"
	fi
done
echo $NAMES
tar -zcvf /tmp/gitdiff.tgz $NAMES
scp /tmp/gitdiff.tgz lagh2302@laghava.com:html/
ssh lagh2302@laghava.com "cd html;tar -zxvf gitdiff.tgz; rm gitdiff.tgz;"
rm /tmp/gitdiff.tgz