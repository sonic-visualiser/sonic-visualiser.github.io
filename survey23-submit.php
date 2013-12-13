<?php

$have = 0;

$f = disk_free_space("/var/surveys");
if ($f < 100000000) {
   die("Survey storage error: please contact admin");
}

foreach (array_keys($_POST) as $key) {
    if ($key != "misc") {
        $value = $_POST[$key];
        if ($value != "") {
            $have = 1;
        }
    }
}

if (!$have) {

header("Location: survey23.html");

} else {

header("Location: survey23-thanks.html");

$trap = $_POST['misc'];

$d = time();
$r = rand();
if ($trap == "") {
   $filename = "/var/surveys/sv23/$d.$r";
} else {
   $filename = "/var/surveys/sv23/dubious/$d.$r";
}

$file = fopen($filename, "w");

if ($file) {
   $i = 0;
   $ip = $_SERVER['REMOTE_ADDR'];
   if ($ip == '127.0.0.1') {
       # local reverse proxy
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   $ua = $_SERVER['HTTP_USER_AGENT'];
   fwrite($file, "ip: $ip\n");
   fwrite($file, "ua: $ua\n");
   foreach (array_keys($_POST) as $key) {
       $value = $_POST[$key];
       if ($value == "") continue;
       fwrite($file, "$key: $value\n");
       $i = $i + 1;
   }
   fclose($file);
}

sleep(1);

}
?>
