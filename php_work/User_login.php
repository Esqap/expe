<?php

//login time!!
//Getting Email and password first from the user

$email=validateString($_POST['L_email']);
$pass=validateString($_POST['L_pass']);


//Email and pass verification
include('Includes/php/connection.php');
$verification_query="select email,pass from users where email='$email' and pass='$pass'";
$run_query=mysqli_query($con,$verification_query);
$row=mysqli_num_rows($run_query);
if($row>0){

if(isset($_POST["remember"]))
{
		setcookie("email",'$email',time()+365*24*60*60);
    	setcookie("pass",'$pass',time()+365*24*60*60);	
}

$_SESSION['email']=$email;
header('location:home.php');
}  
else{
echo "<script>alert('Email or password not correct')</script>";	
}
?>