<?php
// Declaring variables
$website_url = admin_url();
$username = $_POST['userName'];
$useremail = $_POST['userEmail'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$toEmail = "support@fixrunner.com";
$email_subject = $subject;
$email_body = $content . "\n" .
	"\n" .
	"From Name: " . $subject . "\n" .
	"From Email: " . $useremail . "\n" .
	"Website: " . $website_url . "\n";

$mailHeaders = "From: <" . $useremail . ">\r\n";
$mailHeaders .= "Reply-To:" . $useremail . "\r\n";

mail($toEmail, $email_subject, $email_body, $mailHeaders);