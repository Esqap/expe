<?php

$pattern="/#+([a-zA-Z0-9_]+)/";
$exp=validateString($_POST['experience']);
$conclusion=validateString($_POST['conclusion']);

if(empty($exp))
{
	echo "<script>alert('Please Enter Experience ');</script>";
	die();
}
$rela=validateString($_POST['related']);
preg_match($pattern,$exp,$str);

if($rela=="Experience Related To")
{
	echo "<script>alert('Please Select Experience Related To ');</script>";
	die();
}
$date="date('Y-m-d H:i:s')";

if($str==null){
$insert_query="insert into experiences (experience,posted_by,posted_date,related_to,conclusion) values ('$exp','$user_email','$date','$rela','$conclusion')";
mysqli_query($con,$insert_query);
}else{
    $insert_query="insert into experiences (experience,posted_by,posted_date,related_to,conclusion,hashtag) values ('$exp','$user_email','$date','$rela','$conclusion','$str[0]')";
mysqli_query($con,$insert_query);
}
	

?>

