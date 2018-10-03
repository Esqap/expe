<?php 
require('Includes/php/header.php');  
?>
    <section> 
        <div class="container">
            <div class="row">
                <!----Left Sidebars Start -->
                <?php include("Includes/php/left-sidebars.php"); ?>
                <!----Left Sidebars End -->

                <div class="col-sm-6">
                    <div id="post_append"></div>
                    <?php include("php_work/view_experiences.php"); ?>	
                </div>
				
                
                <!----Right Sidebars Start -->
                <?php include("Includes/php/right-sidebars.php"); ?>
                <!----Right Sidebars End -->
            </div>
        </div>
    </section>
	<?php if(isset($user_email)){?>
		<input type="hidden" id="p_useremail" value="<?php echo $user_email; ?>">
	<?php } ?>
</body>
</html>