<?php include("Includes/php/header.php"); ?>

<div class="container">
<div class="row">

<!--Multi Step Account Verification -->
<div class="page-header" style="border-color:rgb(200,200,200);"><h3>Account Verification</h3></div>
<br>
<form class="form-horizontal verify-form">
	<div class="row">
		<div class="col-md-3" style="width:20%">
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
						<input class="form-control" style="box-shadow:none;  " type="text" name="twitter" placeholder="First Name" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Last Name: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="text" name="twitter" placeholder="Last Name" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Date of Birth: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="date" name="twitter" placeholder="Twitter" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Mobile No: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="text" name="twitter" placeholder="e.g +9230XXXX" />
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Bio: </label>
					<div class="col-md-5">
						<textarea class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">
						<button class="btn btn-primary" type="button" onclick="next_toggle('p-details')" >Next</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<!--Social Media Links -->
		<div class="col-md-6" id="s-media" style="display:none">
			<div class="panel panel-default">
				<span style="padding:10px; padding-bottom:0; display:block; font-size:110%;">Social Media Links</span>
				<hr>			
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Facebook: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="url" name="twitter" placeholder="Facebook" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Twiter: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="url" name="twitter" placeholder="Twitter" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">Linkden: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="url" name="twitter" placeholder="Linkden" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">
						<button class="btn btn-primary" type="button" onclick="next_toggle('s-media')" >Next</button>
						<button class="btn btn-primary" type="button" onclick="prev_toggle('s-media')" >Previous</button>

					</div>
				</div>
			</div>
		</div>
		
		
		
		<!--Additional Details -->
		<div class="col-md-6" id="a-details" style="display:none">
			<div class="panel panel-default">
				<span style="padding:10px; padding-bottom:0; display:block; font-size:110%;">Additional Details</span>
				<hr>
				
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;">NIC: </label>
					<div class="col-md-5">
						<input class="form-control" style="box-shadow:none;  " type="number" name="twitter" placeholder="e.g 42501XXXX" />
					</div>
				</div>
				
				<div class="form-group">
					<label  class="control-label col-md-3" style="font-weight:normal; ">Reason To Verify Your Account: </label>
					<div class="col-md-5">
						<textarea class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" style="font-weight:normal;"></label>
					<div class="col-md-5">
						<button class="btn btn-primary" type="button" onclick="next_toggle('a-details')" >Submit</button>
						<button class="btn btn-primary" type="button" onclick="prev_toggle('a-details')" >Previous</button>

					</div>
				</div>
			</div>
		</div>
	</div>
</form>


													
</div>
</div>
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
</script>
</body>
</html>
