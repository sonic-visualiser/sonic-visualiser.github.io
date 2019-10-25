#!/bin/sh
dir=`dirname $0`
sh $dir/news2html.sh
sh $dir/news2atom.sh
