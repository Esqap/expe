<?php
session_start();
    require("vendor/autoload.php");

include('Includes/php/funtions.php');
Include("Includes/php/connection.php");
if($_POST['task'] == 'e_email_verify' ){
    $_SESSION['noti_expert_verify'] = "Your request for verification has been sent.";
    $email = $_POST['email'];
    $id = $_POST['id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $dob = $_POST['dob'];
    $bio = $_POST['bio'];
    $fb = $_POST['fb'];
    $twi = $_POST['twi'];
    $li = $_POST['li'];
    $reason = $_POST['reason'];

    $msg = "Request From: $email"."<br>";
    $msg .= "First Name: $fname"."<br>";
    $msg .= "Last Name: $lname"."<br>";
    $msg .= "Date Of birth: $dob"."<br>";
    $msg .= "bio : $bio"."<br>";
    $msg .= "FB link : $fb"."<br>";
    $msg .= "Twitter Link : $twi"."<br>";
    $msg .= "Linkedin Link : $li"."<br>";
    $msg .= "Reason : $reason"."<br>";

    
$to = "haniabidkz@gmail.com";							 
		$subject = 'Expert Account Verification';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>ESQAP Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;">'.$name.' Wants to Become a Expert, Details are</div><div style="padding:24px; font-size:17px;">'.$msg.'<a href="http://www.esqap.com/do_expert_verify.php?u='.$id.'">Activate Expert Account</a></b></div></body></html>';
	
		sendMail($to,$subject,$message);

    $update = "UPDATE users set expert_verify='2' where u_id='$id'";

    mysqli_query($con,$update);

    echo $id;
}

?>