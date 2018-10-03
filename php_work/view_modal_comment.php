<div id="md<?php echo $exp_id; ?>" class="collapse">
	<div class="card card-body" >
		<div class="row">
			<div class="col-sm-12">
													
		
		<div id="append<?php echo $exp_id; ?>"></div>
<?php 
			$comment_query="select * from comments where exp_id='$exp_id' order by dated desc limit 2";
			$run_comment_query=mysqli_query($con,$comment_query);
			if(mysqli_num_rows($run_comment_query) <= 0){?>
				<hr>
				<div id="hide_empty<?= $exp_id; ?>">No comments yet.</div>
			<?php }else{
			while($rows=mysqli_fetch_array($run_comment_query)){
			$comment=$rows['comment'];
			$by=$rows['comment_by'];
			$q="select * from users where email='$by'";
			
			$result=mysqli_query($con,$q);
			$result=mysqli_fetch_assoc($result);
			$target_path=$result['image'];
			$comment_by_name=$result['Name'];
			$comment_by_id=$result['u_id'];
			$comment_id=$rows['comment_id'];
			?>
<hr/>
		<div class="row" id="hide_comm<?= $comment_id ?>">
			<div class="col-xs-1" >
				<img class="img-circle" src="<?php echo $target_path; ?> " width="35" height="35" style="display:inline-block; margin-top:-6px;" >
			</div>
			<div class="col-xs-10 text-left comment-by"  >
				<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $comment_by_id;?>"><?php echo $comment_by_name;?></b></a></span>
				<?php echo $comment; ?>			
			</div>
			<?php
			if($user_email == $by){
			?>
			<div class="col-xs text-left delete_comment" id="<?= $comment_id ?>"><span class="ui-icon ui-icon-trash"></span></div>
			<div style="display: none" title="Comment Delete" id="modal_del<?= $comment_id ?>"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p></div>	
			<?php
			}
			?>
		</div>
		<?php } } ?>
		<div id="more_comments<?php echo $exp_id; ?>"> </div>
		<?php 
			$comment_query_more="select * from comments where exp_id='$exp_id'";
			$run_comment_query_more=mysqli_query($con,$comment_query_more);
			$total_comments= mysqli_num_rows($run_comment_query_more);
			if($total_comments>2){ ?>
			<div class="more-comment-link" id="cmt_link<?php echo $exp_id;?>"><a class="cmt_link" id="<?php echo $exp_id;?>" style="cursor: pointer"><hr/>View more <?php echo ($total_comments - 2);?> comments</a></div>
       <?php }?>
	    <hr/>
		
		<?php if(isset($_SESSION['email'])){?>

    <div class="row comment-box">
            <div class="col-xs-1 comment-box-pic">
                <img class="img-circle" src="<?php echo $target_path; ?> " width="40" height="40">
            </div>
			
			
            <div style="background:rd; padding:0; padding-left:20px; padding-right:20px;" class="col-xs-8 txtarea modal-comment-txtarea">
                <textarea style="width:100%; height:50px; padding:10px; font-size:90%; box-shadow:none; border-radius:100px; resize:none;"  name="comments" id="comments<?php echo $exp_id; ?>" cols="58" placeholder="Your Comment"></textarea>		
            </div>
			<div class="col-xs-1" style="display:none; color:red" id="err_comment<?= $exp_id ?>">In correct format</div>
			<div style="margin-top:6px; padding:0; background:back;" class="col-xs-3" style="margin:0;">
				<button style=" text-align:center; padding: 10px 8px 10px 8px; font-size:85%; margin:0; " name="btncomment" id="<?php echo $exp_id; ?>" value="comment" class="text-center btn btn-primary insert-comment">Post</button>
			</div>	
	</div>
	
		<?php } ?>

       
        
		
        
        
<?php if(isset($_SESSION['email'])){?>
        <input type="hidden" id="expid<?php echo $exp_id;?>" value="<?php echo $exp_id;?>">
        <input type="hidden" id="useremail<?php echo $exp_id;?>" value="<?php echo $user_email;?>">
        <input type="hidden" id="email<?php echo $exp_id;?>" value="<?php echo $email;?>">
        <input type="hidden" id="comment<?php echo $exp_id;?>" value="<?php  if(isset($comment_id)){echo $comment_id; } ?>">
    
<?php } ?>







			</div>
		</div>
	</div>
</div>




