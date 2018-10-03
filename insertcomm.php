<?php
 Include ("Includes/php/connection.php");
 Include ("Includes/php/funtions.php");

if(isset($_POST['task']) && $_POST['task']=="comment"){
    $comment=validateString($_POST['comm']);
    $exp_id=$_POST['exp_id'];
    $email=$_POST['email'];
    $user_email=$_POST['useremail'];

    $select_image="SELECT u_id,image,Name from users where email='$user_email' ";
    $exe_image_query=mysqli_query($con,$select_image);
    $result=mysqli_fetch_array($exe_image_query);
    $image=$result['image'];
    $name=$result['Name'];
    $uid=$result['u_id'];

    $insert_query="INSERT into comments(exp_id,comment,comment_by,dated) values('$exp_id','$comment','$user_email',NOW())";
    $run_insert_query=mysqli_query($con,$insert_query);
    $comment_id = mysqli_insert_id($con);

    if($user_email!=$email){
            $msg=$name." "."commented on your experience.";
            $update_noti="UPDATE users set notify='1' where email='$email'";
            $run_update=mysqli_query($con,$update_noti);
            $insert_noti="INSERT into notification(email,msg,exp_id,action_by,comment_id,noti_type) values('$email','$msg','$exp_id','$user_email','$comment_id','comment')";
            $run_insert=mysqli_query($con,$insert_noti);
        }
    else{
        $check_for_comment="SELECT * from comments where exp_id='$exp_id' group by comment_by";
        $run_check=mysqli_query($con,$check_for_comment);
        while($comm=mysqli_fetch_array($run_check)){
            $check_by=$comm['comment_by'];
            if($check_by!=$user_email){
                $msg1=$name." "."commented on his experience.";			
                $update_noti1="UPDATE users set notify='1' where email='$check_by'";
                $run_update1=mysqli_query($con,$update_noti1);
                $insert_noti1="INSERT into notification(email,msg,exp_id,action_by,comment_id) values('$check_by','$msg1','$exp_id','$user_email','$comment_id')";
                $run_insert1=mysqli_query($con,$insert_noti1);
            }
        }
    }
    
        $std = new stdClass();
        $std->name=$name;
        $std->image=$image;
        $std->comment=" ".$comment;
        $std->user_email=$user_email;
        $std->id=$uid;
        $std->comment_id=$comment_id;
        echo json_encode($std);

} 
?>
