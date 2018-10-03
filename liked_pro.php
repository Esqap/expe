<?php
$con=mysqli_connect("localhost","root","","expe");
if(isset($_GET['exp_id'])){
$user_email=$_GET['user'];
$exp_id=$_GET['exp_id'];
$email=$_GET['email'];
if($email!=$user_email && $email!=null){
    $msg=$user_email." "."liked your experience.";
    $update_noti="UPDATE users set notify='1' where email='$email'";
    $run_update=mysqli_query($con,$update_noti);
    $insert_noti="INSERT into notification(email,msg,exp_id,action_by) values('$email','$msg','$exp_id','$user_email')";
    $run_insert=mysqli_query($con,$insert_noti);
}

$insert_like="INSERT into likes(exp_id,liked_by,liked_date) values('$exp_id','$user_email',NOW())";
$run_like=mysqli_query($con,$insert_like);
echo "<script>window.open('/expe/home.php','_self')</script>";
}
?>