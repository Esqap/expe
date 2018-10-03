<?php 
ob_start();


require('Includes/php/header.php'); 
require_once('Includes/php/funtions.php');
require_once('Includes/php/array.php');
	
$id=$_GET['id'];

if(!isset($id))
{
    
header('location:home.php');
exit();
}

if(isset($_GET['id']))
{
	
	$name_email="select name,email,image from users where u_id=$id";
	$result=mysqli_query($con, $name_email);
	if(mysqli_num_rows($result)<1)
	{
		header('location:home.php');
		exit();
	}
	$result=mysqli_fetch_array($result);
	$name=$result['name'];
	$email=$result['email'];
	$target_path=$result['image'];

    $select_about="select * from about where u_id='$id'";
    $run_about_query=mysqli_query($con,$select_about);
    $about=mysqli_fetch_array($run_about_query);
    $acountry=$about['country'];
    
    $alang=$about['language'];
    $ainterest=$about['interest'];
    $aabout=$about['about'];
    $aschool=$about['school'];
    $acollege=$about['college'];
    $askills=$about['skills'];
    $amobile=$about['mobile'];
    $awebsite=$about['website'];
	$occu = $about['occu'];
	
	
	?>
	

<!---Filal ke liye yaha background colr whit diya kuch css me changing krne pare ge wo bad me kaun ga -->

	<section style="background:white; color:black">
        <div class="container">
            <div class="row">
                <!----Left Sidebars Start -->
				<?php include("Includes/php/left-sidebars.php"); ?>
				<!----Left Sidebars End -->

<div class="col-sm-6">


                    <div class="panel panel-default">
                        <h5 class="page-header box-heading">
							<div class="panel-heading about">
								<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
								<span class="user-about-heading">About</span>	
							</div>
						</h5>
                        <div class="panel-body about-body">
                            <form method="POST" class="form-horizontal about-form" style="background:ornge">
                                
								<div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;" >Country: </label>
                                    <div class="col-xs-6"  id="country" >
										<?php if(!empty($acountry)){echo $acountry; } else {echo "<i><span style='color:grey'>Country is Not Set</span></i>";}?>
									</div>
									<?php showEdit("showcount","country","countryEdit"); ?>
									
									 <div class="col-xs-6" id="showcount" style="display:none;"  >
									     
                                        
                                        <select name="a_country" class="form-control" value="<?php if(!empty($acountry)){echo $acountry; }?>">
                                            
                                            <?php foreach($countries  as $country){ ?>
                                            
                                            <option><?php echo $country ?></option>
                                            <?php } ?>
                                            
                                            
                                        </select>
										
										
                                    </div>
                                </div>
                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;" >Langage: </label>

                                    <div class="col-xs-6"  id="lang" >
                                    <?php if(!empty($alang)){echo $alang; } else {echo "<i><span style='color:grey'>Langage is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showlang","lang","lanEdit"); ?>
                                    <div class="col-xs-6" id="showlang" style="display:none;">
                                        <input type="text" name="a_language" class="form-control" 
										value="<?php if(!empty($alang)){echo $alang; }?>"/>
                                    </div>
                                </div>
								
								<div class="form-group about-input">
                                     <label class="control-label col-xs-4" style=" padding-top:1px;">Occupation: </label>
                                    <div class="col-xs-6" id="occu" style="background:ed;">
                                        <?php if(!empty($occu)){echo $occu; } else {echo "<i><span style='color:grey'>Occupation is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showoccu","occu","occuEdit"); ?>
                                    <div class="col-xs-6" id="showoccu" style="background:ed;display:none;">
                                       <select name="occupation"  class="form-control" style="display:inline-block; width:100%; border-none; box-shadow:none;">
            								<option value="null">Occupation</option>
            								<option value="Student">Student</option>
            								<option value="Teacher">Teacher</option>
            								<option value="IT Professional">IT Professional</option>
        							    </select>
                                    </div>
                                </div>

                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;" >Interest: </label>
                                    <div class="col-xs-6" id="interest" style="background:ed;">
                                       <?php if(!empty($ainterest)){echo $ainterest; } else {echo "<i><span style='color:grey'>Interest is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showinterest","interest","interestEdit"); ?>
                                    <div class="col-xs-6" id="showinterest" style="background:ed;display:none">
                                        <input type="text" name="a_interest" class="form-control"
										value="<?php if(!empty($ainterest)){echo $ainterest; }?>"/>
                                    </div>

                                </div>



                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;">Bio: </label>
                                    <div class="col-xs-6" id="about" style="background:ed;">
									<?php if(!empty($aabout)){echo $aabout; } else {echo "<i><span style='color:grey'>Bio is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showabout","about","aboutEdit"); ?>
                                    <div class="col-xs-6" id="showabout" style="background:ed;display:none;">
                                        <textarea name="a_about" class="form-control"
										value="<?php if(!empty($aabout)){echo $aabout; }?>"> 
										</textarea>
                                    </div>

                                </div>

                               
                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;">School: </label>
                                    <div class="col-xs-6" id="school" style="background:ed;">
                                    <?php if(!empty($aschool)){echo $aschool; } else {echo "<i><span style='color:grey'>School is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showschool","school","schoolEdit"); ?>
                                    <div class="col-xs-6 " id="showschool" style="background:ed;display:none;">
                                        <input type="text" name="a_school" class="form-control"
										value="<?php if(!empty($aschool)){echo $aschool; }?>"/>
                                    </div>
                                </div>

                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;">College: </label>
                                    <div class="col-xs-6" id="college" style="background:ed;">
										<?php if(!empty($acollege)){echo $acollege; } else {echo "<i><span style='color:grey'>College is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showcollege","college","collegeEdit"); ?>
                                    <div class="col-xs-6" id="showcollege" style="background:ed;display:none">
                                        <input type="text" name="a_college" class="form-control" 
										value="<?php if(!empty($acollege)){echo $acollege; }?>"/>
										
                                    </div>
                                </div>

                               
                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;">Skills: </label>
                                    <div class="col-xs-6" id="skills" style="background:ed;">
                                        <?php if(!empty($askills)){echo $askills; } else {echo "<i><span style='color:grey'>Skill is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showskills","skills","skillsEdit"); ?>
                                    <div class="col-xs-6" id="showskills" style="background:ed;display:none;">
                                        <input type="text" name="a_skills" class="form-control" 
										value="<?php if(!empty($askills)){echo $askills; }?>"/>
                                    </div>

                                </div>

                                
                                <div class="form-group about-input">
                                    <label class="control-label col-xs-4" style=" padding-top:1px;">Mobile No: </label>
                                    <div class="col-xs-6" id="mobile" style="background:ed;">
                                        <?php if(!empty($amobile)){echo $amobile; } else {echo "<i><span style='color:grey'>Mobile No is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showmobile","mobile","mobileEdit"); ?>
                                    <div class="col-xs-6" id="showmobile" style="background:ed;display:none;">
                                        <input type="text" name="a_mobile" class="form-control" 
										value="<?php if(!empty($amobile)){echo $amobile; }?>"/>
                                    </div>

                                </div>

                                <div class="form-group about-input">
                                     <label class="control-label col-xs-4" style=" padding-top:1px;">Website: </label>
                                    <div class="col-xs-6" id="website" style="background:ed;">
                                        <?php if(!empty($awebsite)){echo $awebsite; } else {echo "<i><span style='color:grey'>Website is Not Set</span></i>";}?>
                                    </div>
									<?php showEdit("showwebsite","website","websiteEdit"); ?>
                                    <div class="col-xs-6" id="showwebsite" style="background:ed;display:none;">
                                        <input type="text" name="a_website" class="form-control" 
										value="<?php if(!empty($awebsite)){echo $awebsite; }?>"/>
                                    </div>
                                </div>
                                <?php
                                if(isset($user_email) AND $user_email==$email){
                                ?>
                                  
                                    <div class="form-group about-input" id="up" style="display:none">
                                        <div class="text-center">
                                            <button class="btn btn-primary" name="submit">Update</button>
							            </div>
                                    </div> 
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>


                </div>

                <!----Right Sidebars Start -->
				<?php include("Includes/php/right-sidebars.php"); ?>
				<!----Right Sidebars End -->





            </div>



        </div>
    </section>



</body>

</html>

<?php
}
if(isset($_POST['submit'])){
    $country=validateString($_POST['a_country']);
	$language=validateString($_POST['a_language']);
	$interest=validateString($_POST['a_interest']);
	$about=validateString($_POST['a_about']);
	$school=validateString($_POST['a_school']);
	$college=validateString($_POST['a_college']);
	$skills=validateString($_POST['a_skills']);
	$mobile=validateString($_POST['a_mobile']);
	$website=validateString($_POST['a_website']);
	$occupation=validateString($_POST['occupation']);
	
	
    $check_about="select u_id from about where u_id='$id'";
    $run_check=mysqli_query($con,$check_about);
	
	
    if($row=mysqli_num_rows($run_check)==1)
	{
	$ins_query="UPDATE about set country='$country', language='$language', interest='$interest', about='$about', school='$school', college='$college', skills='$skills', mobile='$mobile', website='$website', occu='$occupation' where u_id='$id' ";
	$exe_ins_query=mysqli_query($con,$ins_query);
	if($exe_ins_query){
		echo "<script>window.open('about.php?id=$id','_self')</script>";
	}
    }
	
	else{
        $ins_query="INSERT into about(u_id,country,language,interest,about,school,college,skills,mobile,website,occu)
            values('$id','$country','$language','$interest','$about','$school','$college','$skills','$mobile','$website','$occupation')";
	$exe_ins_query=mysqli_query($con,$ins_query);
	if($exe_ins_query){
		echo "<script>window.open('about.php?id=$id','_self')</script>";
	}

    }
}

echo mysqli_error($con);
?>

<script type="text/javascript" >
function show(a,b,c){
document.getElementById(a).style.display="block";
document.getElementById(b).style.display="none";
document.getElementById(c).style.display="none";
document.getElementById('up').style.display="block";



}
</script>