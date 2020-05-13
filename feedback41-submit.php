<?php

$svver = $_POST['sv-version'];
$fbver = $_POST['feedback-version'];
$name = $_POST['name'];
$email = $_POST['email'];
$about = $_POST['about'];
$followup = $_POST['followup'];

if ($name != "" || $email != "" || $about != "") {
   
    $to = 'c.cannam@qmul.ac.uk';
    $subject = "Sonic Visualiser feedback";
    $message = "$name [$email] [followup: $followup] wrote:\n$about";
    $headers = "From: noreply@sonicvisualiser.org";

    mail($to, $subject, $message, $headers);

    header("Location: feedback41-thanks.html");

} else {

    header("Location: feedback41.php");
}

?>

