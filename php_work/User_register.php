<?php

if(isset($_POST['task']) && $_POST['task']=="register")
{

//Connection
include('../Includes/php/connection.php');
include('../Includes/php/funtions.php');

$U_email = validateString($_POST['r_email']);
$U_name = validateString($_POST['r_username']);
$U_pass = validateString($_POST['r_pass']);
$occu = validateString($_POST['occu']);
$referrer_id=$_POST['referrer_id'];


//email verification

$email_query= "select * from users where email='$U_email'";
$exe_query=mysqli_query($con,$email_query);
$check=mysqli_num_rows($exe_query);
if($check>0){
	// echo "<script>document.getElementById('email').style.borderColor = 'red';
	// 	document.getElementById('empty_email').innerHTML = ('Email already Taken')</script>";
	echo "E-mail is already in use. Please use your E-mail.";
	exit();
}else{

// //Registeration
$default_image="images/default.jpeg";
$reg_query="insert into users(Name,email,pass,notify,image) values('$U_name','$U_email','$U_pass',0,'$default_image')";
$exe_reg_query=mysqli_query($con,$reg_query);


if($exe_reg_query){


//Getting the Last Inserted ID of the row of the new user who have just register. This id is used to populate about table becuase of some reason.
$lastid = mysqli_insert_id($con);

//Check If User Is Registered Using Referral Link
if($referrer_id != ''){
	$ref_query="insert into referrals(referrer_id,refereed_id)values('$referrer_id','$lastid')";
	$ref_result=mysqli_query($con,$ref_query) or die(mysqli_error($con));

	//Send Ebook Gift to the Referrer
	if($ref_result){
		$q_mail="select * from users where u_id='$referrer_id'";
		$result_mail=mysqli_query($con,$q_mail) or die(mysqli_error($con)) ;
		$row_mail=mysqli_fetch_array($result_mail);
		$referrer_email=$row_mail['email'];		
		$to = "$referrer_email";							 
		$from = "info@esqap.com";
		$subject = 'ESQAP - Download Ebook';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>ESQAP</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;">GIFT From ESQAP</div><div style="padding:24px; font-size:17px;">You received a Ebook as a gift from ESQAP because someone registered on ESQAP Using your referral link. Thanks for your support. <br><br />Click the link below to download your Ebook:<br /><br /><a href="#">Download</a></div></body></html>';
		$headers = "From: $from\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$mail_sent=mail($to, $subject, $message, $headers);
		if($mail_sent){
			$q_update="update referrals set gift_recieved='1' where referrer_id='$referrer_id' AND gift_recieved='0' ";
			$result_update=mysqli_query($con,$q_update);
		}
}
}



$q_about="insert into about(u_id,occu) values ('$lastid','$occu')";
mysqli_query($con, $q_about) or die(mysqli_error($con));

    $to = "$U_email";							 
		$from = "admin@esqap.com";
		$subject = 'Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Latest Experience Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;">Latest Experience Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$U_email.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.esqap.com/activate.php?u='.$U_email.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$U_email.'</b></div></body></html>';
	
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$check=mail($to, $subject, $message, $headers);

	if($check){
	    echo "<div class='alert alert-success'>Congratulations! Please visit your E-mail account to activate.</div>";
	}

}
}


}
?>