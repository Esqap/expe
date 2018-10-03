$(document).ready(function() {

    $('.insert-comment').each(function() {
        var btn = this;
        $(btn).click(function() {            
            var tempid = btn.id;
            var comment = $('#comments' + tempid).val();
            var expid = $('#expid' + tempid).val();
            var email = $('#email' + tempid).val();
            var user_email = $('#useremail' + tempid).val();
            if (comment != "") {
                $('#comments' + tempid).css('border', '1px solid grey');
                var patt = /^[a-zA-Z0-9\?\!\'\s\"]/
                var check = patt.test(comment);
                if(check == true){
                    $("#err_comment"+tempid).hide();
                    $.ajax({
                        method: "POST",
                        url:"insertcomm.php",
                        async: false,
                        data : {
                            task: "comment",
                            exp_id: expid,
                            email: email,
                            useremail: user_email,
                            comm: comment
                        }
                    }).done(function(data){
                        var res = jQuery.parseJSON(data);
                        add_comment_box(res,tempid); 
                    }) 

                }else{
                    $('#comments' + tempid).css('border', '1px solid #ff0000');
                    $("#err_comment"+tempid).show();   
                }

            } else {
                $('#comments' + tempid).css('border', '1px solid #ff0000');
            }
            $('#comments' + tempid).val("");
        });

    });

    function showcomment(data, tempid) {
            var show = "";
            show += '<hr>';
            show += '<div class="row">';
            show += '<div class="col-xs-1" >';
            show += '<img class="img-circle" src="' + data.image + '" width="35" height="35">';
            show += '</div>';
            show += '<div class="col-xs-10 text-left comment-by"  >';
            show += '<span style="font-size:95%"><b><a href="experience.php?id=' + data.id + '">' + data.name + '</b></a>';
            // show += '<br/> <span style="font-size:90%; color:grey"></span>';
            // show += '</span>';
            // show += '<div class="col-xs-9 " >' + data.comment + '</div>';
            show += " " + data.comment;
            show += '</div>';
            show += '<div class="col-xs text-left delete_comment" id="'+ data.comment_id +'"><span class="ui-icon ui-icon-trash"></span></div>';
            show += '</div>';
			
            

            $('#append' + tempid).prepend(show);

    }

    function add_comment_box(data,tempid){
        var main_div = create('div');

        var hr = create('hr');
        main_div.appendChild(hr);

        var div_row = create('div');
        div_row.setAttribute('class','row');

        // code for image
        var div_col_xs_1 = create('div')
        div_col_xs_1.setAttribute('class','col-xs-1');

        var img = create('img');
        img.setAttribute('class','img-circle');
        img.setAttribute('src',data.image);
        img.setAttribute('width','35');
        img.setAttribute('height','35');
        div_col_xs_1.appendChild(img);

        // code for comment
        var div_col_xs_10 = create('div');
        div_col_xs_10.setAttribute('class','col-xs-10 text-left comment-by');

        var span = create('span');
        span.setAttribute('style','font-size:95%');
        var b = create('b');
        var link = create('a');
        link.setAttribute('href','experience.php?id='+data.id);
        var link_text = document.createTextNode(data.name);
        link.appendChild(link_text);
        b.appendChild(link)
        span.appendChild(b);
        div_col_xs_10.appendChild(span);
        var text_comment = document.createTextNode(data.comment);
        div_col_xs_10.appendChild(text_comment);

        // code for dialog delete

        var div_dialog = create('div');
        div_dialog.setAttribute('title','Comment Delete.');
        div_dialog.setAttribute('style','display:none');
        var span_alert = create('span');
        span_alert.setAttribute('class','ui-icon ui-icon-alert');
        span_alert.setAttribute('style','float:left; margin:12px 12px 20px 0;')
        var text_dialog = document.createTextNode("These items will be permanently deleted and cannot be recovered. Are you sure?")
        div_dialog.appendChild(span_alert);
        div_dialog.appendChild(text_dialog);

        // code for delete
        var div_col_xs_1_2 = create('div');
        div_col_xs_1_2.setAttribute('class','col-xs text-left');

        var span_del = create('span');
        span_del.setAttribute('class','ui-icon ui-icon-trash');
        span_del.onclick = function(){
            $(div_dialog).dialog({
                resizable: false,
				height: "auto",
				width: 400,
                modal: true,
                buttons: {
                    "Delete all items": function() {
                      $.ajax({
                          url : "php_work/delete_comment.php",
                          method : "POST",
                          data : {del_id : data.comment_id, task: "delete_com"}
                      }).done(function(data){
                          $(main_div).hide();
                          $( div_dialog ).dialog( "close" );
                      })
                    },
                    Cancel: function() {
                      $( this ).dialog( "close" );
                    }
              }
            });
        }
        div_col_xs_1_2.appendChild(span_del);

        div_row.appendChild(div_col_xs_1);
        div_row.appendChild(div_col_xs_10);
        div_row.appendChild(div_dialog);
        div_row.appendChild(div_col_xs_1_2);
        main_div.appendChild(div_row);
        $('#append' + tempid).prepend(main_div);
        $("#hide_empty" + tempid).hide();
    }

    function create(param) {
        return document.createElement(param);
    }
});