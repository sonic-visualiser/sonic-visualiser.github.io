#!/bin/bash

#!!! Replace all instances of example and example.com

nowd=`date '+%Y-%m-%dT%H:%M:%SZ'`

( 

cat <<EOF
<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
 
  <title></title>
  <link href="http://example.com/news/atom/" rel="self" type="application/atom+xml"/>
  <link href="http://example.com/news/" rel="alternate" type="text/html"/>
  <link href="http://example.com/" rel="related"/>
  <author>
    <name>News</name>
    <email>news@example.com</email>
  </author>
  <id>http://example.com/news/atom/</id>
  <updated>$nowd</updated>

EOF

ls 2*.txt | sort -rn | while read x; do

    d=`basename $x .txt`
    artd=`date -d "$d 09:00:00" '+%Y-%m-%dT%H:%M:%SZ'`
    pd=`date -d "$d" '+%d %B, %Y' | sed -e 's/^\(1[0-9]\) /\1th /' -e 's/1 /1st /' -e 's/2 /2nd /' -e 's/3 /3rd /' -e 's/\([4-9]\) /\1th /' -e 's/^0//'`

    title=`cat "$x" | sed '/^ *$/d' | head -1`

    echo "&lt;h4&gt;$pd&lt;/h4&gt;" > /tmp/$$

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
s/<a href="([^\/][^:]*)"/<a href="http:\/\/example.com\/$1"/gs;
s/<a href="(\/[^:]*)"/<a href="http:\/\/example.com$1"/gs;
s/\&/&amp;/gs;
s/</&lt;/gs;
s/>/&gt;/gs;
s/\"/&quot;/gs;
print;
' >> /tmp/$$

    cat <<EOF

  <entry>
    <id>http://example.com/news/$d</id>
    <title>$title</title>
    <link rel="alternate" type="text/html" href="http://example.com/news/$d.html"/>
    <published>$artd</published>
    <updated>$artd</updated>
    <content type="html">
EOF

    cat /tmp/$$

    cat <<EOF
    </content>
  </entry>
EOF

done 

echo "</feed>"

) > atom/index.html

