<?php include("Includes/php/header.php"); ?>
<?php 
$id_query = "SELECT u_id,expert_verify from users where email='$user_email'";
$result = mysqli_query($con,$id_query);
$row = mysqli_fetch_array($result);
$uid = $row['u_id'];
if($row['expert_verify'] == 2){
?>
	<div class="container">
	<div class="row alert alert-info">
		Your request for verification has been already sent.
	</div>
	</div>
<?php
}else{
?>


<div class="container" id="success-mesg" style="display: none;">
	<div class="row alert alert-info">
		Your request for verification has been sent.
	</div>
</div>

<div class="container" id="verify-box">
<input type="hidden" id="u_id" value="<?= $uid ?>">
<div class="container">
<div class="row">

<!--Multi Step Account Verification -->
<div class="page-header" style="border-color:rgb(200,200,200);"><h3>Account Verification</h3></div>
<br>
<form class="form-horizontal verify-form" action="do_verify.php" method="post">
	<div class="row">
		<div class="col-md-3" >
			<div class="panel panel-default">
				<ul class="list-group">
					<li class="list-group-item" id="nextli" style="font-weight:bold">Personal Details</li>
					<li class="list-group-item">Social Media</li>
					<li class="list-group-item">Additional Details</li>
				</ul>
			</div>
		</div>
		
		<!--Personal Details -->
		<div class="col-md-6" id="p-details">
			<div class="panel panel-default">
				<span style="padding:10px; padding-bottom:0; display:block; font-size:110%;">Your Personal Details</span>
				<hr>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">First Name: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " id="f_name" type="text" name="f_name" placeholder="First Name" />
					</div>
					<div class="col-md-3" id="err_fn" style="display:none; color:#FF4C4C" >Please enter a valid Name</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Last Name: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="text" id="l_name" placeholder="Last Name" />
					</div>
					<div class="col-md-3" id="err_ln" style = "color:#FF4C4C; display:none" >Please enter a valid Name</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Date of Birth: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="date" id="dob" placeholder="Twitter" />
					</div>
				</div>
				
				<!-- <div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Mobile No: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="text" name="twitter" placeholder="e.g +9230XXXX" />
					</div>
				</div> -->
				
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Bio: </label>
					<div class="col-md-5">
						<textarea class="form-control" id="bio"></textarea>
					</div>
					<div class="col-md-3" id="err_bio" style = "color:#FF4C4C; display:none" >Please enter a valid Information</div>					
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">
						<button class="btn btn-primary" id="btn_pd" type="button"  >Next</button>
					</div>
				</div>
				<input type="hidden" id="hid_details" value="p-details">
			</div>
		</div>
		
		
		<!--Social Media Links -->
		<div class="col-md-6" id="s-media" style="display:none">
			<div class="panel panel-default">
				<span style="padding:10px; padding-bottom:0; display:block; font-size:110%;">Social Media Links</span>
				<hr>			
				<div class="alert alert-info text-center">Enter your social media URLs here. At least one URL is needed.</div>
				<div id="err_link" style="display:none" class="alert alert-danger text-center">Please enter the corret format of URL <strong>i.e https://www.abc.com</strong></div>			
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Facebook: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="url" id="fb" placeholder="Facebook" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Twiter: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="url" id="twitter" placeholder="Twitter" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Linkden: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="url" id="linkedin" placeholder="Linkden" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">
						<button class="btn btn-primary" type="button" id="btn_sm_n" >Next</button>
						<button class="btn btn-primary" type="button" id="btn_sm_p" >Previous</button>

					</div>
				</div>
				<input type="hidden" id="hid_media" value="s-media">
			</div>
		</div>
		
		
		
		<!--Additional Details -->
		<div class="col-md-6" id="a-details" style="display:none">
			<div class="panel panel-default">
				<span style="padding:10px; padding-bottom:0; display:block; font-size:110%;">Additional Details</span>
				<hr>
				
				<!-- <div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">NIC: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="number" name="twitter" placeholder="e.g 42501XXXX" />
					</div>
				</div>
				 -->
				<div class="form-group">
					<label  class="control-label col-md-3" style="font-weight:normal; ">Reason To Verify Your Account: </label>
					<div class="col-md-5">
						<textarea class="form-control" id="reason"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">						
						<button class="btn btn-primary" type="button" id="btn_ad_n" >Submit</button>
						<button class="btn btn-primary" type="button" id="btn_ad_p" >Previous</button>

					</div>
				</div>
				<input type="hidden" id="hid_add" value="a-details">
			</div>
		</div>
	</div>
</form>


													
</div>
</div>
<?php } ?>
<script>
function next_toggle(a){
	
	$("#" + a).toggle();
	$("#" + a).next().toggle();
	
	$("#nextli").css("font-weight","normal");
	$("#nextli").next().css("font-weight","bold");
	$("#nextli").next().attr( "id", "nextli");
	$("#nextli").attr( "id", "");
	

}

function prev_toggle(a){
	
	$("#" + a).toggle();
	$("#" + a).prev().toggle();
	
	$("#nextli").css("font-weight","normal");
	$("#nextli").prev().css("font-weight","bold");
	$("#nextli").prev().attr( "id", "nextli");
	$("#nextli").attr( "id", "");

}

$(document).ready(function(){

	var uid, f_name, l_name, bio,flag1,flag2,fb_link = false;
	var t_link = false;
	var li_link = false;
	var name_pattern = /^[a-zA-Z ]+$/;
	var patter = /^[a-z A-Z0-9\'\"\?\!\-]+$/;
	var URL_pat =  /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;

	$("#btn_pd").click(function(){
		flag1 = false;
		if($("#f_name").val() == ''){
			$("#f_name").css('border-color','#FF4C4C');
			f_name = false;
		}else{
			if(name_pattern.test($("#f_name").val())){
				$("#err_fn").hide();
				$("#f_name").css('border-color','#d3d3d3');				
				f_name = true;
				
			}else{
				$("#f_name").css('border-color','#FF4C4C');
				$("#err_fn").show();
				f_name = false;
			}
		}

		if($("#l_name").val() == ''){
			$("#l_name").css('border-color','#FF4C4C');
			l_name = false;
		}else{
			if(name_pattern.test($("#l_name").val())){
				$("#err_ln").hide();
				$("#l_name").css('border-color','#d3d3d3');				
				l_name = true;
			}else{
				$("#l_name").css('border-color','#FF4C4C');
				$("#err_ln").show();
				l_name = false;
			}
		}
		if(patter.test($("#bio").val()) || $("#bio").val() == ''){
			$("#err_bio").hide();
			bio = true;
		}else{
			$("#err_bio").show();
			bio = false;
		}

		if(f_name && l_name && bio){
			var li = $("#hid_details").val();
			flag1 = true;
			next_toggle(li);
		}
	});

	$("#fb").blur(function(){
		if($(this).val() != ''){
			if(check_link($(this).val()) == true){
				$("#err_link").hide();
				$(this).css('border-color','#d3d3d3');
				fb_link = true;
			}else{
				$("#err_link").show();
				$(this).css('border-color','#FF4C4C');
				fb_link = false;
			}
		}else{
			$("#err_link").hide();
			$(this).css('border-color','#d3d3d3');
		}
	});

	$("#twitter").blur(function(){
		if($(this).val() != ''){
			if(check_link($(this).val()) == true){
				$("#err_link").hide();
				$(this).css('border-color','#d3d3d3');
				t_link = true;
			}else{
				$("#err_link").show();
				$(this).css('border-color','#FF4C4C');
				t_link = false;
			}
		}else{
			$("#err_link").hide();
			$(this).css('border-color','#d3d3d3');
		}
	});

	$("#linkedin").blur(function(){
		if($(this).val() != ''){
			if(check_link($(this).val()) == true){
				$("#err_link").hide();
				$(this).css('border-color','#d3d3d3');
				li_link = true;
			}else{
				$("#err_link").show();
				$(this).css('border-color','#FF4C4C');
				li_link = false;
			}
		}else{
			$("#err_link").hide();
			$(this).css('border-color','#d3d3d3');
		}
	});

	$("#btn_sm_n").click(function(){
		flag2 = false;
		if(fb_link == true || t_link == true || li_link == true){
			flag2 = true;
			$("#err_link").hide();
			var li = $("#hid_media").val();
			next_toggle(li);
		}else{
			$("#err_link").show();
		}
	});

	function check_link(link){
		if(URL_pat.test(link) ){
			return true;
		}else{
			return false;
		}
	}

	$("#btn_sm_p").click(function(){
		var li = $("#hid_media").val();
		prev_toggle(li);
	})

	$("#btn_ad_n").click(function(){
		// var li = $("#hid_add").val();
		// next_toggle(li);
		if(flag1 == true && flag2 == true){
			var id = $("#u_id").val();
			var val_fn = $("#f_name").val();
			var val_ln = $("#l_name").val();
			var val_dob = $("#dob").val();
			var val_bio = $("#bio").val();
			var val_fb = $("#fb").val();
			var val_t = $("#twitter").val();
			var val_li = $("#linkedin").val();
			var val_reason = $("#reason").val();

			$.ajax({
				url: "do_verify.php",
				method: "post",
				data : {
					task: "e_email_verify",
					email : "<?= $user_email ?>",
					id : id,
					f_name : val_fn,
					l_name : val_ln,
					dob : val_dob,
					bio : val_bio,
					fb : val_fb,
					twi : val_t,
					li : val_li,
					reason : val_reason
				},
				success:function(){
					$("#success-mesg").css("display","block");
					$("#verify-box").css("display","none");
				}
			});
		}
	});

	$("#btn_ad_p").click(function(){
		var li = $("#hid_add").val();
		prev_toggle(li);
	})
})
</script>
</body>
</html>
