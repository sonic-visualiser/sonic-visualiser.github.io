<?php

header("Location: survey16-thanks.html");

$trap = $_POST['misc'];

$d = time();
if ($trap == "") {
   $filename = "/var/surveys/sv16/$d";
} else {
   $filename = "/var/surveys/sv16/dubious/$d";
}

$file = fopen($filename, "w");

if ($file) {
   $i = 0;
   fwrite($file, "ip: " . $_SERVER['REMOTE_ADDR'] . "\n");
      foreach (array_keys($_POST) as $key) {
          $value = $_POST[$key];
	  if ($value == "") continue;
	  fwrite($file, "$key: $value\n");
	  $i = $i + 1;
      }
   fclose($file);
}

?>

