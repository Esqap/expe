<?php
// $con=mysqli_connect("localhost","root","","expe");
include('Includes/php/connection.php');

if(isset($_POST['task']) && $_POST['task']=="like"){
    $exp_id=$_POST['exp_id'];
    $email=$_POST['email'];
    $user_email=$_POST['useremail'];
    $insert_like="INSERT into likes(exp_id,liked_by,liked_date) values('$exp_id','$user_email',NOW())";
$run_like=mysqli_query($con,$insert_like);
$like_id = mysqli_insert_id($con);
$sel_like="select count(exp_id) as total from likes where exp_id='$exp_id'";
$run_like=mysqli_query($con,$sel_like);
$lik=mysqli_fetch_array($run_like);
$likes=$lik['total'];

$name_query = "SELECT Name from users where email='$user_email'";
$name_res = mysqli_query($con,$name_query);
$fetch_name = mysqli_fetch_array($name_res);
$name= $fetch_name['Name'];

if($email!=$user_email && $email!=null){
    $msg=$name." "."liked your experience.";
    $update_noti="UPDATE users set notify='1' where email='$email'";
    $run_update=mysqli_query($con,$update_noti);
    $insert_noti="INSERT into notification(email,msg,exp_id,action_by,like_id,noti_type) values('$email','$msg','$exp_id','$user_email','$like_id','like')";
    $run_insert=mysqli_query($con,$insert_noti);
}

$std = new stdClass();
$std->likes=$likes;
echo json_encode($std);


}
?>