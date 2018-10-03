<?php 

include('../Includes/php/connection.php');
if(isset($_POST['task']) && $_POST['task']=="morecomments"){
    $exp_id=$_POST['exp_id'];
    $comment_id=$_POST['comment_id'];
    $result="";
    $select_comment_query="SELECT * from comments c JOIN users u ON u.email= c.comment_by where (c.exp_id='$exp_id' and c.comment_id<'$comment_id') order by dated desc";
    $run_qurey=mysqli_query($con,$select_comment_query);
    while($row=mysqli_fetch_array($run_qurey)){

        $comment_by_id=$row['u_id'];
        $target_path=$row['image'];
        $comment_by_name=$row['Name'];
        $comment=$row['comment'];


        $result.='<hr/>
    
        <div class="row">
        
            <div class="col-xs-1" >
                <img src="'.$target_path.'" width="30" height="30">
            </div>
            <div class="col-xs-10 text-left comment-by"  >
                <span style="font-size:95%"><b><a href="experience.php?id='.$comment_by_id.'">'.$comment_by_name.'</b></a>
                '.$comment.'
            </div>
        </div>';

    }

    echo $result;
}

?>