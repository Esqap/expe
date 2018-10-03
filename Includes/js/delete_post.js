$(document).ready(function(){
    $(".delete_post").each(function(){
        var del = this;
        $(this).click(function(){
            $("#modal_del_exp"+del.id).dialog({
                resizable: false,
				height: "auto",
				width: 400,
				modal: true,
				buttons: {
					  "Delete all items": function() {
						$.ajax({
							url : "php_work/delete_post.php",
							method : "POST",
							data : {del_id : del.id, task: "delete_post"}
						}).done(function(data){
                            $( "#modal_del_exp" + del.id ).dialog( "close" );
                            $("#hide_exp"+ del.id).fadeOut();
						})
					  },
					  Cancel: function() {
						$( this ).dialog( "close" );
					  }
				}
            });
        })
    })
})