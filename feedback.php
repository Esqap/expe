<?php include("Includes/php/header.php"); ?>

<div class="container">
<div class="row">

<!--Feedback Form -->
<div class="page-header" style="border-color:rgb(200,200,200);"><h3>ESQAP Feedback Form</h3></div>
<br>

<div style="display:none;" class="feedback alert alert-success">
  <strong>Feedback sent Successfully!</strong> <span class="light">Thanks for Your Precious Time</span>
</div>

<form class="form-horizontal verify-form">
	<div class="row">
	
		<!--Personal Details -->
		<div class="col-md-6 col-md-offset-3" id="p-details">
			<div class="panel panel-default">
				<span style="padding:10px; padding-bottom:0; display:block; font-size:110%;">Your Personal Details</span>
				<hr>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Your Name: </label>
					<div class="col-md-5">
						<input class="form-control" class="feedback-in" style="box-shadow:none;" onblur="validate(this)" type="text" id="name" placeholder="Your Name" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Email/Mobile</label>
					<div class="col-md-5">
						<input class="form-control" class="feedback-in" style="box-shadow:none;" onblur="validate(this)" type="text" id="email" placeholder="Email or Mobile No" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Feedback:</label>
					<div class="col-md-5">
						<textarea rows="4" style="box-shadow:none;" id="feedback" class="form-control" onblur="validate(this)" placeholder="Your Feedback"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">
						<button class="btn btn-primary" type="button" onclick="sendFeedback()" >Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


													
</div>
</div>
<script>
	
	function validate(obj){
		if($(obj).val()==""){
			$(obj).css("border","1px solid red");
		}
		else{
			$(obj).css("border","1px solid #ccc");
		}
		
	}
	function sendFeedback(){
	
		$name=$("#name").val();
		$email=$("#email").val();
		$feedback=$("#feedback").val();
		if($name=="" || $email=="" || $feedback==""){
			return false;
		}
		else{
			$.ajax({
				url:"sendfeedback.php",
				type:"POST",
				dataType:"JSON",
				data:{name:$name,email:$email,feedback:$feedback},
				success:function(data){
					$(".feedback.alert").find("strong").html(data.b);
					$(".feedback.alert").find(".light").html(data.a);
					$(".feedback.alert").css("display","block");
					$("#name").val("");
					$("#email").val("");
					$("#feedback").val("");
				}
			});

			
		}
	}
</script>
</body>
</html>
