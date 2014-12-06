<?php
require_once 'mail.php';
$return = array();
$email = strip_tags(trim($_POST['email']));
$name = strip_tags(trim($_POST['name']));
$number = strip_tags(trim($_POST['phone']));
$message = strip_tags(trim($_POST['message']));
$mailer = new SimpleMail();
$mailer -> setTo('kunalvarma05@gmail.com', 'Ritesh Singhania');
$mailer -> setSubject('Inquiry');
$mailer -> setFrom($email, $name);
$mailer -> addMailHeader('Reply-To', $email, $name);
$mailer -> addGenericHeader('X-Mailer', 'PHP/' . phpversion());
$mailer -> addGenericHeader('Content-Type', 'text/html; charset="utf-8"');
$mailer -> setMessage("<!DOCTYPE HTML><html><head><title>MG Ispat</title></head><body><h1>MG Ispat</h1><p>Inquiry from <b>$name</b><br>Phone number: <b>$number</b><br><hr>$message</p></body></html>");
$mailer -> setWrap(100);
$send = $mailer -> send();
if ($send) {
	$return = array("error" => false, "message" => "Thanks for reaching out to us. We will get back to you soon.");
} else {
	$return = array("error" => true, "message" => "There seems to be some problem. Try again.");
}
echo json_encode($return);
?>