<?php

include('../Includes/php/connection.php');

if(isset($_POST['task']) AND $_POST['task'] == 'delete_ques'){
    $del_id = $_POST['del_id'];
    
    $query = "DELETE from user_questions where q_id='$del_id'";
    $res = mysqli_query($con,$query);

    echo $res;
}

?>