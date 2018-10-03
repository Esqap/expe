<?php

if(isset($_GET['u'])){
    Include_once ("Includes/php/connection.php");

    $u=$_GET['u'];
    $update_verify="UPDATE users set expert_verify=1 where u_id='$u'";
    $run_query=mysqli_query($con,$update_verify);

}

?>