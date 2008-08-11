#!/bin/sh
#

file=$1

charset=`file -bi "$file"  | awk -F charset= '{ print $2 }'`

tmp=`date +%s%N`

if [ "$charset" = "iso-8859-1" ]; then
  iconv -f iso-8859-1 -t utf-8 "$file" > "$file$tmp"
  mv "$file$tmp" "$1"
else 
  if [ "$charset" = "us-ascii" ] || [ "$charset" = "utf-8" ]
  then
    #Nothing to do
    echo -n ""
  else 
    echo "Charset of the file $file is ambiguous. Please convert it by hand."
  fi
fi

