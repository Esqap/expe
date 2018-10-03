<?php
 Include ("../Includes/php/connection.php");
 Include ("../Includes/php/funtions.php");
if(isset($_POST['task']) && $_POST['task'] == 'delete_com' ){
    
    $id = $_POST['del_id'];
    $query = "DELETE FROM comments where comment_id='$id'";
    mysqli_query($con,$query);
}

?>