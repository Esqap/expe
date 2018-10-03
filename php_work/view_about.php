

 <div class="col-sm-6">


                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
                            <span class="user-about-heading">About</span>
                        </div>
                        <div class="panel-body">

                            <form method="POST" class="form-horizontal about-form" style="background:ornge">

                                <div class="page-header info">
                                    <b>General</b>
                                </div>
                                <!--<div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Name: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_name" class="form-control " placeholder="<?php echo $name; ?>">
                                    </div>

                                </div>-->

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Country: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_country" class="form-control" />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">City: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_city" class="form-control" />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Language: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_language" class="form-control" />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Interest: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_interest" class="form-control" />
                                    </div>

                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">About: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <textarea name="a_about" class="form-control">
													
												</textarea>
                                    </div>

                                </div>

                                <div class="page-header info ed-info">
                                    <b>Education</b>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">School: </label>
                                    <div class="col-md-5" style="background:ed;">
                                        <input type="text" name="a_school" class="form-control" />
                                    </div>
                                    <div class="col-md-2 add-more">
                                        <a href="#">Add More</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">College: </label>
                                    <div class="col-md-5" style="background:ed;">
                                        <input type="text" name="a_college" class="form-control" />
                                    </div>
                                    <div class="col-md-2 add-more">
                                        <a href="#">Add More</a>
                                    </div>
                                </div>

                                <div class="page-header info ed-info">
                                    <b>Skills</b>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Skills: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_skills" class="form-control" />
                                    </div>

                                </div>

                                <div class="page-header info ed-info">
                                    <b>Contact Info</b>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Mobile: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_mobile" class="form-control" />
                                    </div>

                                </div>

                                <!--<div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Email: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="email" name="a_email" class="form-control" />
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <label class="control-label col-md-3" style="background:gry;">Website: </label>
                                    <div class="col-md-6" style="background:ed;">
                                        <input type="text" name="a_website" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
							<div class="  text-center">
								<button class="btn btn-primary btn-lg" name="submit">Submit</button>
							</div>
						</div> 

                            </form>
                        </div>
                    </div>


                </div>

<?php
$con=mysqli_connect("localhost","root","","expe") or die("data base error");
$id=$_GET['id'];
if(isset($_POST['submit'])){
	$country=$_POST['a_country'];
	$city=$_POST['a_city'];
	$language=$_POST['a_language'];
	$interest=$_POST['a_interest'];
	$about=$_POST['a_about'];
	$school=$_POST['a_school'];
	$college=$_POST['a_college'];
	$skills=$_POST['a_skills'];
	$mobile=$_POST['a_mobile'];
	$website=$_POST['a_website'];

    $check_about="select u_id from about where u_id='$id'";
    $run_check=mysqli_query($con,$check_about);
    if($row=mysqli_num_rows($run_check)==1){
	$ins_query="UPDATE about set country='$country', city='$city', language='$language', interest='$interest', about='$about', school='$school', college='$college', skills='$skills', mobile='$mobile', website='$website' where u_id='$id' ";
	$exe_ins_query=mysqli_query($con,$ins_query);
	if($exe_ins_query){
		echo "<script>window.open('/expe/about.php?id=$id','_self')</script>";
	}
    }else{
        $ins_query="INSERT into about(u_id,country,city,language,interest,about,school,college,skills,mobile,website)
            values('$id','$country','$city','$language','$interest','$about','$school','$college','$skills','$mobile','$website')";
	$exe_ins_query=mysqli_query($con,$ins_query);
	if($exe_ins_query){
		echo "<script>window.open('/expe/about.php?id=$id','_self')</script>";
	}

    }
}
?>