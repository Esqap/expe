<?php
if(isset($_POST['task']) && $_POST['task']=="unfollow"){
	include('../Includes/php/connection.php');
	$user_id = $_POST['user_id'];
	$id = $_POST['id'];

	$sel="Delete from user_followers where user_id='$user_id' AND follower_id='$id'";
	$result_insert=mysqli_query($con,$sel);	
}		
?>





