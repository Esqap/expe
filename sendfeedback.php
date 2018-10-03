<?php 
	include("Includes/php/connection.php");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$feedback=$_POST['feedback'];
	
	$q="insert into feedback (name,email,mesg) values ('$name','$email','$feedback')";
	
// 	$result=mysqli_query($con,$q) or die(mysqli_error());
// 	if($result){
	    $to = "info@esqap.com";							 
		$from = "admin@esqap.com";
		$subject = 'User FeedBack';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>ESQAP Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;">ESQAP Feedback</div><div style="padding:24px; font-size:17px;">
		    FeedBack From: '.$name.'<br/>
		    Email: '.$email.'<br/>
		    FeedBack: '.$feedback.'<br/>
		    </div></body></html>';
	
		$headers = "From: info@esqap.com\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		$name=array("a"=>"Thanks for Your Precious Time","b"=>"Feedback sent Successfully!");
		$response=json_encode($name);
		echo $response;		
// 	}
	
?>
