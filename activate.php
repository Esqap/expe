<?php

if(isset($_GET['u'])){
    include("Includes/php/connection.php");

    $u=$_GET['u'];
    $update_verify="UPDATE users set verified=1 where email='$u'";
    $run_query=mysqli_query($con,$update_verify);
    echo "Account Has Been Verfied, Go to Main Page<a href='http://www.esqap.com/home.php'>click here</a>";
}

?>