<?php

if(isset($user_email))
{
    
    $select_noti="select msg,exp_id from notification where (email='$user_email' and checked=0) order by noti_id desc";
    $run_noti=mysqli_query($con,$select_noti);
	 if(mysqli_num_rows($run_noti)!=0){
	$count=mysqli_num_rows($run_noti); }
	else
	{$count="";
	}
	
$user_login=
		array(
		array("filename"=>"home.php", "text"=>"Home"),
		array("filename"=>"experience.php?id=$id" , "text"=>"Profile"),
		array("filename"=>"notify.php?noti" , "text"=>"Notification <span class='badge badge-primary'>$count</span>"),
		array("filename"=>"questions" , "text"=>"Discussion"),
		
		array("filename"=>"setting.php", "text"=>"Setting"),
		array("filename"=>"verify.php", "text"=>"Verify Account"),
		array("filename"=>"logout.php" , "text"=>"Logout"),
		
		);
}
		
$user_not_login=
		array(
		array("filename"=>"experiences.php", "text"=>"Experiences"),
		array("filename"=>"questions" , "text"=>"Discussion"),
		array("filename"=>"index.php" , "text"=>"Login/SignUp")		
		);





?>