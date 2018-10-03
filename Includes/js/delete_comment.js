$(document).ready(function(){
	$(".delete_comment").each(function(){
		var del = this;
		$(del).click(function(){
			$("#modal_del" + del.id).dialog({
				resizable: false,
				height: "auto",
				width: 400,
				modal: true,
				buttons: {
					  "Delete all items": function() {
						$.ajax({
							url : "php_work/delete_comment.php",
							method : "POST",
							data : {del_id : del.id, task: "delete_com"}
						}).done(function(data){
							$('#hide_comm' + del.id).hide();
							$( "#modal_del" + del.id ).dialog( "close" );
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
