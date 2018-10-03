<?php
    include('../Includes/php/connection.php');
    include('../Includes/php/funtions.php');
if(isset($_POST['task']) && $_POST['task']=="posts"){

        $exp=$_POST['expe'];
        $exp=mysqli_real_escape_string($con,$exp);
        $user_email=$_POST['useremail'];
        $rela=validateString($_POST['rel']);
        $pattern="/#+([a-zA-Z0-9_]+)/";
        preg_match($pattern,$exp,$str);
        
        $select_image="SELECT u_id,image,Name from users where email='$user_email' ";
        $exe_image_query=mysqli_query($con,$select_image);
        $result=mysqli_fetch_array($exe_image_query);
        $image=$result['image'];
        $name=$result['Name'];
        $uid=$result['u_id'];
        $std = new stdClass();
        
        if($str==null){
            $insert_query="insert into experiences (experience,posted_by,posted_date,related_to) values ('$exp','$user_email',NOW(),'$rela')";
            mysqli_query($con,$insert_query);
            $lastid = mysqli_insert_id($con);
            $std->lastid=$lastid;
        }else{
            $insert_query="insert into experiences (experience,posted_by,posted_date,related_to,hashtag) values ('$exp','$user_email',NOW(),'$rela','$str[0]')";
            mysqli_query($con,$insert_query);
            $lastid = mysqli_insert_id($con);
            $std->lastid=$lastid;
        }
        
        $exp=preg_replace("/#+([a-zA-Z0-9_]+)/","<a href='php_work/hashtag.php?tag=$1'>$0</a>",$exp);
        
        $show = '<div class="row">';
        $show.= '<div class="col-sm-12">';
        $show.= '<div class="panel panel-default view_exp_post_box">';
        $show.= '<div class="panel-body post">';
        $show.= '<div class="row post-exp">';
        $show.= '<div class="col-xs-1" >';
        $show.= '<img class="img-circle" style="display:inline-block; margin-top:-3px;" src="./' . $image . '" width="42" height="42">';
        $show.= '</div>';
        $show.= '<div class="col-xs-10 text-left exp-by " >';
        $show.= '<span style="font-size:95%"><b><a href="experience.php?id=' .$uid. '">' .$name. '</b></a>';
        $show.= '<br/> <span style="font-size:90%; color:grey">Just Now</span>';
        $show.= '</span>';
        $show.= '</div>';
        $show.= '</div>';
        $show.= '<hr class="post-divider">';
        $show.= '<div class="row post-exp exp">';
        $show.= '<div class="col-xs-12" style="pa">';
        $show.= '<span class="post-status">' . $exp . '</span>';
        
        $show.= '</div>';
        $show.= '</div>';
        $show.= '<hr class="post-divider">';
        $show.= '</div>';
        $show.= '<div class="panel-footer view_exp_post_box_footer">';

        // $show.='<div class="row post-reaction">';


        // $show.='<div class="col-xs-3 reaction like">';

        // $query_for_check="select exp_id,liked_by from likes where exp_id='$lastid' and liked_by='$user_email' ";

        // $sel_like="select count(exp_id) as total from likes where exp_id='$lastid'";

        // $run_it=mysqli_query($con,$query_for_check);

        // $run_like=mysqli_query($con,$sel_like);

        // $lik=mysqli_fetch_array($run_like);

        // $likes=$lik['total'];

        // if(mysqli_num_rows($run_it)>0){

        //     $show.='<div id="unlike" id="'.$lastid.'">';
        //     $show.='<span class="pulike"'.$lastid.'>';
        //     $show.='<span class="glyphicon glyphicon-thumbs-down" style="top:5px; font-size:large;"></span>';

        //     $show.='<span class="reaction-text">&nbsp;&nbsp;Unlike</span>';
        //     $show.='</span>';
        //     $show.='</div>';

        //     $show.='<div id="like"'.$lastid.' style="display:none">';
        //     $show.='<span class="plike"'.$lastid.'>';
        //     $show.='<span class="glyphicon glyphicon-thumbs-up" style="top:5px; font-size:large;"></span>';
        //     $show.='<span class="reaction-text">&nbsp;&nbsp;Like</span>';
        //     $show.='</span>';
        //     $show.='</div>';
        //     $show.='</div>';
        //     $show.='</div>';

        // }
        // else{
        //     $show.='<div id="unlike"'.$lastid.' style="display:none">';
        //     $show.='<span class="pulike"'.$lastid.'>';
        //     $show.='<span class="glyphicon glyphicon-thumbs-down" style="top:5px; font-size:large;"></span>';
        //     $show.='<span class="reaction-text">&nbsp;&nbsp;Unlike</span>';
        //     $show.='</span>';
        //     $show.='</div>';

        //     $show.='<div id="like"'.$lastid.'>';
        //     $show.='<span class="plike"'.$lastid.'>';
        //     $show.='<span class="glyphicon glyphicon-thumbs-up" style="top:5px; font-size:large;"></span>';
        //     $show.='&nbsp;&nbsp;Like';
        //     $show.='</span>';
        //     $show.='</div>';
        //     $show.='</div>';

        // }

        // $show.='<div class="col-xs-3 reaction comment">';    
        // $show.='<span class="" data-toggle="collapse" data-target="#md'.$lastid.'">';
        // $show.='<span class="glyphicon glyphicon-comment icon" style="top:5px; font-size:large;"></span>'; 
        // $show.='<span class="reaction-text">&nbsp;Comment';
        // $show.='</span>';
        // $show.=' </span>';
        // $show.='</div>';
        // $show.='<div class="col-xs-3 reaction like ReExpress">'; 
        // $show.='<div id="ReExpress">';
        // $show.='<span class="punlike">';
        // $show.='<i class="fas fa-forward" style="margin-top:2px; font-size: large;"></i>'; 
        // $show.='<span class="reaction-text">&nbsp;ReExpress</span>';
        // $show.='</span>';
        // $show.='</div>';
        // $show.='</div>';                                                          
        // $show.='</div>';

        $show.='<div id="md'.$lastid.'" class="collapse">';
        $show.='<div class="card card-body" >';
        $show.='<div class="row">';
        $show.='<div class="col-sm-12">';
        $show.='<hr>';
        $show.='<div class="row comment-box">';
        $show.='<div class="col-xs-1 comment-box-pic">';
        $show.='<img class="img-circle" src="'.$image.'" width="40" height="40">';
        $show.='</div>';
                    
            
        $show.='<div style="background:rd; padding:0; padding-left:20px; padding-right:20px;" class="col-xs-8 txtarea modal-comment-txtarea">';
        $show.='<textarea style="width:100%; height:50px; padding:10px; font-size:90%; box-shadow:none; border-radius:100px; resize:none;"  name="comments" id="comments<?php echo $exp_id; ?>" cols="58" placeholder="Your Comment"></textarea>';
        $show.='</div>';
         
        $show.='<div class="col-xs-1" style="display:none; color:red" id="err_comment<?= $exp_id ?>">In correct format</div>';
        $show.='<div style="margin-top:6px; padding:0; background:back;" class="col-xs-3" style="margin:0;">';
        $show.='<button style=" text-align:center; padding: 10px 8px 10px 8px; font-size:85%; margin:0; " name="btncomment" id="<?php echo $exp_id; ?>" value="comment" class="text-center btn btn-primary insert-comment">Post</button>';
        $show.='</div>';
        $show.='</div>';
        $show.='</div>';
        $show.='</div>';
        $show.='</div>';
        $show.='</div>';
        $show.='</div>';
        $show.='</div>';

        echo $show;
        // $std->image = $image;
        // $std->name = $name;
        // $std->uid = $uid;
        
        
        // echo trim(json_encode($std)); 
}else{
header("location:../home.php");
}
?>

