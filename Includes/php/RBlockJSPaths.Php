<!-----This Code Will Load Below JS Files After The Page Has Been Loaded Suscesfully --->


<script type="text/javascript">
function loadScript(src) {
     var element = document.createElement("script");
     element.src = src;
     document.body.appendChild(element);
}


// Add a script element as a child of the body
function downloadJSAtOnload() {
    
    
 


    loadScript("Includes/js/jquery.min.js?t=<?php echo time(); ?>");
    loadScript("Includes/js/bootstrap.min.js?t=<?php echo time(); ?>");
            loadScript("Includes/js/jqueryui/jquery-ui.min.js?t=<?php echo time(); ?>");

    loadScript("insertcomm.js?t=<?php echo time(); ?>");
    loadScript("like.js?t=<?php echo time(); ?>");
    loadScript("postexp.js?t=<?php echo time(); ?>");
    loadScript("Includes/js/morecomm.js?t=<?php echo time(); ?>");
    loadScript("Includes/js/follow.js?t=<?php echo time(); ?>");
    loadScript("Includes/js/delete_comment.js?t=<?php echo time(); ?>");
    loadScript("Includes/js/delete_post.js?t=<?php echo time(); ?>");

    
    
	
  
}

 // Check for browser support of event handling capability
 if (window.addEventListener)
     window.addEventListener("load", downloadJSAtOnload, false);
 else if (window.attachEvent)
     window.attachEvent("onload", downloadJSAtOnload);
 else window.onload = downloadJSAtOnload;
</script>