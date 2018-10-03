<?php
// $con=mysqli_connect("localhost","root","","expe");
Include ("Includes/php/connection.php");
if(isset($_POST['task']) && $_POST['task']=="unlike"){
$exp_id=$_POST['exp_id'];
$email=$_POST['email'];
$user_email=$_POST['useremail'];

$insert_like="DELETE from likes where exp_id='$exp_id' and liked_by='$user_email'";
$run_like=mysqli_query($con,$insert_like);

$sel_like="select count(exp_id) as total from likes where exp_id='$exp_id'";
$run_like=mysqli_query($con,$sel_like);
$lik=mysqli_fetch_array($run_like);
$likes=$lik['total'];

$std = new stdClass();
$std->likes=$likes;
echo json_encode($std);

}
?>