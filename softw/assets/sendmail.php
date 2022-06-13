<?php

// if submitted check response
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$recaptcha=$_POST['g-recaptcha-response'];
if(!empty($recaptcha))
{
include("getCurlData.php");
$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6LeQZRIUAAAAAMngyfOuRAp4HrDf2HIqJ5eGHfhA';
$ip=$_SERVER['REMOTE_ADDR'];
$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
$res=getCurlData($url);
$res= json_decode($res, true);
if($res['success'])
{
$name=$_REQUEST['contact-name'];
$email=$_REQUEST['contact-email'];
$phone=$_REQUEST['contact-subject'];
$message=$_REQUEST['contact-message'];
$EmailTo="len@lensaunders.com";
$Subject="Len Saunders Contact Form";
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$headers ="From: ";
$headers .=$email;

$success = mail($EmailTo, $Subject, $Body, $headers);

if ($success){
header("Location: ../thankyou.html"); /* Redirect browser */

}
else
{
	echo "<script type='text/javascript'>alert('Please Try Agin Message Not Send');window.location.href='../contact.html';</script>";
}
}
else
{
	echo "<script type='text/javascript'>alert('Please Submit Captcha');window.location.href='../contact.html';</script>";
}
}
else
{
	echo "<script type='text/javascript'>alert('Please Submit Captcha');window.location.href='../contact.html';</script>";
}
}
?>