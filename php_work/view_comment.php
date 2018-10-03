

<!--Row For Like and Comment Buttons-->



<div class="row post-reaction">

	<?php if(isset($_SESSION['email'])){?>

	

	<!--Like Button Column -->

	<div class="col-xs-3 reaction like" >

        <?php

            $query_for_check="select exp_id,liked_by from likes where exp_id='$exp_id' and liked_by='$user_email' ";

            $sel_like="select count(exp_id) as total from likes where exp_id='$exp_id'";

            $run_it=mysqli_query($con,$query_for_check);

            $run_like=mysqli_query($con,$sel_like);

            $lik=mysqli_fetch_array($run_like);

            $likes=$lik['total'];

            if(mysqli_num_rows($run_it)==1){

         ?>

        

		<div id="unlike<?php echo $exp_id; ?>">

			<span class="punlike" id="<?php echo $exp_id; ?>" >

				<span class="glyphicon glyphicon-thumbs-down" style="top:5px; font-size:large;"></span> 

				<span class="reactioon-text">

					Unlike

				</span>

			</span>

		</div>





		<div id="like<?php echo $exp_id; ?>"  style="display:none">

			<span class="plike" id="<?php echo $exp_id; ?>">

			   <span class="glyphicon glyphicon-thumbs-up" style="top:5px; font-size:large;"></span>

			   <span class="reactioon-text">

					Like

				</span>



			</span>

		</div>

		<?php }else { ?>

		

		<div id="like<?php echo $exp_id; ?>" >

			<span class="plike" id="<?php echo $exp_id; ?>">            

				<span class="glyphicon glyphicon-thumbs-up" style="top:5px; font-size:large;"></span>

				&nbsp;&nbsp;Like

			</span>

		</div>

		<div id="unlike<?php echo $exp_id; ?>" style="display:none">

			<span class="punlike" id="<?php echo $exp_id; ?>" >

				<span class="glyphicon glyphicon-thumbs-down" style="top:5px; font-size:large;"></span> 

				<span class="reactioon-text">

					Unlike

				</span>

			</span>

		</div>

		<?php } ?>

		

    </div>

	<?php } ?>

	<!--Like Button Close-->

        

	<!--Comment Button Start-->

	<div class="col-xs-3 reaction comment ">    

		<span class="" data-toggle="collapse" data-target="#md<?php echo $exp_id;?>">

			<span class="glyphicon glyphicon-comment icon" style="top:5px; font-size:large;"></span> 

			<span class="reactioon-text">

					Comment

			</span>

		</span>

			



	</div>																			

	<!--Comment Button Close-->	





	<!--Re Express-->



	<!--<div class="col-xs-3 reaction  ReExpress"> -->

	<!--	<div id="ReExpress">-->

	<!--		<span class="punlike">-->

	<!--			<i class="fas fa-forward" style="margin-top:2px; font-size: large;"></i> -->

	<!--			<span class="reactioon-text">-->

	<!--				ReExpress-->

	<!--			</span>-->

	<!--		</span>-->

	<!--	</div>-->

	<!--</div>																-->

</div>

	<?php include("php_work/view_modal_comment.php"); ?>

