#!/bin/bash

echo > newsbits.html

ls 2*.txt | sort -rn | while read x; do

    d=`basename $x .txt`
    pd=`date -d "$d" '+%d %B, %Y' | sed -e 's/^\(1[0-9]\) /\1th /' -e 's/1 /1st /' -e 's/2 /2nd /' -e 's/3 /3rd /' -e 's/\([4-9]\) /\1th /' -e 's/^0//'`

    echo "<h4>$pd</h4>" > /tmp/$$

    cat $x | perl -e '
$_ = join "", <>;
s/^(\s*)([A-Za-z][^\n]*)/$1<b>$2<\/b>/s;
s/\n-+\n/\n/gs;
s/\n\n([^\n])/\n\n<p>$1/gs;
s/^\n*([^<\n])/\n<p>$1/gs;
s/^\n*(<[^p])/\n<p>$1/gs;
s/([^\n])\n\n/$1<\/p>\n\n/gs;
s/([^>\n])\n*$/$1<\/p>\n\n/gs;
s/\[\[([^\|]*)\|([^\]]*)\]\]/<a href="$1">$2<\/a>/gs;
s/\[\[([^\|\]]*)\]\]/<a href="$1">$1<\/a>/gs;
print;
' >> /tmp/$$

    cat /tmp/$$

    cat > $d.html <<EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <!--#include virtual="/include/head.html" -->
  </head>
  <body>

  <div id="top">
  <h1 class="replace" id="title"><span></span></h1>
  </div>

  <!--#include virtual="/include/nav.html" -->
  <!--#include virtual="/include/feeds.html" -->

  <a href="/news.html"><h2>News</h2></a>

EOF

   cat /tmp/$$ >> $d.html

   cat >> $d.html <<EOF

  </body>
</html>
  
EOF

done >> newsbits.html

