<?php


include('../Includes/php/connection.php');

if(isset($_POST['task']) AND $_POST['task'] == 'delete_ans'){
   $del_id = $_POST['del_id'];
    
    $query = "DELETE from user_answers where answer_id='$del_id'";
    $res = mysqli_query($con,$query);

    echo $res;
}

?>