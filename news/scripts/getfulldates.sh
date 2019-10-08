tagprefix="v"

echo "cat CHANGELOG |"
grep '[A-Z][a-z]* 20[0-9][0-9]' CHANGELOG | 
    sed 's/^[^0-9]*//' | 
    sed 's/).*//' | 
    sed 's/(//' | 
    while read version month year; do
        tag=$(hg tags | grep "$tagprefix" | grep "[v_-]$version" |
                  head -1 | awk '{print $1}')
        day=$(hg log -r"$tag" --template '{date|shortdate}' |
                  awk -F- '{print $3; }')
        echo "sed 's/$month $year/$day $month $year/' |"
    done
echo cat
