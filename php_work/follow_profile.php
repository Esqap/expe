<?php
if(isset($_POST['task']) && $_POST['task']=="follow"){
	include('../Includes/php/connection.php');
	$user_id = $_POST['user_id'];
	$id = $_POST['id'];

	$sel="Insert into user_followers(user_id,follower_id) values ('$user_id','$id')";
	$result_insert=mysqli_query($con,$sel);	
}
?>