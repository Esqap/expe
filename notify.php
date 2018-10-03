<?php


ob_start();
require('Includes/php/header.php');

if(!isset($user_email))
{
	header('location:https://www.latestexperience.com');
	die();
}


$sel_verify="SELECT verified from users where email='$user_email'";
	$run_verify_query=mysqli_query($con,$sel_verify);
	$row=mysqli_fetch_array($run_verify_query);
	$verify=$row['verified'];
	if($verify!=1){
		echo "<div class='alert alert-danger'>Your account is not verified. Please go to your mail and verify your account</div>";
	}else{ 

if(!isset($user_email))
{
	header('location:index.php');
	die();
}

?>


<div class="col-sm-6 col-sm-offset-3">

							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">Unchecked Notifications</span>
								</div>
								<div class="panel-body">
									<ul class="list-group text-center">

<?php

$select_noti="select msg,exp_id from notification where (email='$user_email' and checked=0) order by noti_id desc";
$run_noti=mysqli_query($con,$select_noti);

echo mysqli_error($con);
if(mysqli_num_rows($run_noti)!=0){
while($row=mysqli_fetch_array($run_noti)){
$msg=$row['msg'];
$expid=$row['exp_id'];
?>




										
									<li class="list-group-item">
											<div class="row">
												
												<div class="col-md-12 " >
												<a href="exp.php?id=<?php echo $expid; ?>&user=<?php echo $user_email;?>"><div><?php echo $msg; ?></div></a>
												
												</div>
												
											</div>
									</li>
										
										
									

<?php
}

}else{
?>
<li class="list-group-item">
											<div class="row">
												
												<div class="col-md-12 " >
													<h4>No New Notifications.</h4>											
												</div>
												
											</div>
									</li>

<?php } ?>

									</ul>
								</div>
							</div>
						</div>





<div class="col-sm-6 col-sm-offset-3">

							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">Checked Notifications</span>
								</div>
								<div class="panel-body">
									<ul class="list-group text-center">

<?php

$select_noti="select msg,exp_id from notification where (email='$user_email' and checked=1) order by noti_id desc";
$run_noti=mysqli_query($con,$select_noti);
if(mysqli_num_rows($run_noti)>=1){
while($row=mysqli_fetch_array($run_noti)){
$msg=$row['msg'];
$expid=$row['exp_id'];
?>




										
									<li class="list-group-item">
											<div class="row">
												
												<div class="col-md-12 " >
												<a href="exp.php?id=<?php echo $expid; ?>&user=<?php echo $user_email;?>"><div><?php echo $msg; ?></div></a>
												
												</div>
												
											</div>
									</li>
										
										
									

<?php
}

}else{
?>
<li class="list-group-item">
											<div class="row">
												
												<div class="col-md-12 " >
													<h4>Nothing to Show.</h4>											
												</div>
												
											</div>
									</li>

<?php } 


}?>

									</ul>
								</div>
							</div>
						</div>