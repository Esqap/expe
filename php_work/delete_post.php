<?php
Include_once ("../Includes/php/connection.php");
if(isset($_POST['task']) && $_POST['task'] == 'delete_post'){

    $id = $_POST['del_id'];
    $query = "DELETE from experiences where exp_id='$id'";
    mysqli_query($con,$query);
}

?>