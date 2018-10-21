<?php

    
    use PHPMailer\PHPMailer\PHPMailer;

    //Function To Show Random Users On Freinds Suggestion Sidebar When User Is Not Logged In//
    function show_suggested_random_users()
    {
        //In Function I am making the connection variable global beacuse function can't access variables outside of it.//
        global $con;
        $random_user_details=array();
        if(basename($_SERVER['PHP_SELF'])=="view_more.php")
        {
                $q="select * from users";
        }
        else
        {
                $q="select * from users limit 6";
        }
        $result=mysqli_query($con,$q);
        while($row=mysqli_fetch_assoc($result)){
        array_push($random_user_details,$row);

        }
        return $random_user_details;							
    }

    //Function To Show Users Who have Same Interest As the Logged in Users//
    function show_sugested_users_related($userid)
    {
        global $con;
        $related_user_details=array();
        
        $a=0; //Variable "a" used as a check in somewhere at right sidebar.
        if(basename($_SERVER['PHP_SELF'])=="view_more.php")
        {
            $q="select u1.u_id, u2.u_id,u1.interest,u2.interest from about u1 JOIN about u2 on u1.interest=u2.interest where u1.u_id<>u2.u_id AND u1.u_id='$userid'";
        }
        else
        {
            $q="select u1.u_id, u2.u_id,u1.interest,u2.interest from about u1 JOIN about u2 on u1.interest=u2.interest where u1.u_id<>u2.u_id AND u1.u_id='$userid' limit 3"; 			
        }

        $result=mysqli_query($con,$q);
        if(mysqli_num_rows($result)<1)
        {
            $related_user_details=show_suggested_random_users($userid);
            $a=1;
        }

        while($row=mysqli_fetch_assoc($result))
        {
            $uid=$row['u_id'];
            $q="select * from users where u_id='$uid'";
            $result_related_users=mysqli_query($con,$q);
            while($row2=mysqli_fetch_assoc($result_related_users))
            {
                array_push($related_user_details,$row2);
            }
        }

        $array_to_return=array($related_user_details,$a);
        return $array_to_return ;						
    }



    //Function To Show Users Who have not Same Interest As the Logged in Users. 
    //This Function is Used After the Related Function is Being Exceuted..
    function show_suugested_users_unrelated($userid)
    {
        global $con;
        $user_details=array();

        if(basename($_SERVER['PHP_SELF'])=="view_more.php")
        {
            $q="select u1.u_id, u2.u_id,u1.interest,u2.interest from about u1 RIGHT JOIN about u2 on u1.interest<>u2.interest where u1.u_id<>u2.u_id AND u1.u_id='$userid'";
        }
        else
        {
            $q="select u1.u_id, u2.u_id,u1.interest,u2.interest from about u1 JOIN about u2 on u1.interest<>u2.interest where u1.u_id<>u2.u_id AND u1.u_id='$userid' limit 3";
        }
        $result=mysqli_query($con,$q);

        while($row=mysqli_fetch_assoc($result))
        {


        $uid=$row['u_id'];
        if($uid==$userid)
        {
                continue;
        }
        $q="select * from users where u_id='$uid'";
        $result2=mysqli_query($con,$q);
        $row2=mysqli_fetch_assoc($result2);
        array_push($user_details,$row2);


        }

        return $user_details;

    } //END Function

    //Function To validate String For SQL Injection,Cross Site Scripting ETC.
    function validateString($var)
    {

            global $con;
            $data = mysqli_real_escape_string($con,$var);
            $data = strip_tags($var);
            return $var;
    }
    //END
    

    //Function For ABout Section
    function showEdit($a,$b,$c)
    {
            global $user_email;
            global $email;
    ?>
    <div class='col-xs-2 '  id='<?php echo $c; ?>' >	
    <?php if(isset($user_email) AND $email==$user_email){ ?>
    <a style='cursor:pointer;'  onClick="show('<?php echo $a;?>','<?php echo $b;?>','<?php echo $c;?>') "> Edit</a>
    <?php }?>
    </div>

    <?php 
    }
    //END

    function sendMail($to,$subject,$mesg){
        $mail=new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug=0;
        $mail->Host="smtp.gmail.com";
        $mail->SMTPSecure="tls";
        $mail->SMTPAuth = true;
        $mail->SMTPPort="587";
        $mail->Username = "latestexperience123@gmail.com";
        $mail->Password = "pakistanzindabad";
        $mail->setFrom("latestexperience123@gmail.com","ESQAP");
        $mail->msgHTML($mesg);  
        $mail->addReplyTo('info@esqap.com', 'ESQAP');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        if($mail->send()){
            return true;
        }
        $mesg="Mail Not Sent, Try Again";
    }
?>
	
	
