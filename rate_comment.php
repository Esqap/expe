
				<div class="row ">		
					<div class="col-xs-12" >			
						<?php for($a=0; $a<5; $a++)
						{
						?>
							<div class=" stars empty-stars">
							
							</div>
						
						<?php 
						} 
						?>
						<span class="">
							<div id="show"></div>
						</span>		
						<span class="">
							<div id="show"></div>
						</span>		
					</div>											
				</div>
				<hr>
						
				<div class="row comment-box">
					<div class="col-xs-1" >
						<img src="" width="40" height="40">
					</div>
					<div class="col-xs-10 " >
						<textarea  rows="3" name="comments" id="comments" cols="2" placeholder="Review Comments (Optional)"></textarea>		
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-3" >
						<button name="btncomment" id="btncomment" class="btn btn-primary ">Rate It</button>
					</div>
				</div>

				<div id="append">
				</div>
				<hr/>
				<!---
				<div class="row">
					<div class="col-xs-1" >
						<img src="<?php echo "../".$target_path; ?> " width="30" height="30">
					</div>
					<div class="col-xs-10 text-left comment-by"  >
						<span style="font-size:95%"><b><a href=""></b></a>
					</div>
				</div>
				-->
				<hr/>
			