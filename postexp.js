$(document).ready(function() {
    $('#p_btn').click(function() {
        var user_email = $('#p_useremail').val();
        var exp = $('#p_exp').val();
        var related = $('#p_related').val();
        var conclusion = $('#p_con').val();

        if (exp != "") {

            $('#p_exp').css('border', '1px solid #D3D3D3');
            $('#p_con').css('border', '1px solid #D3D3D3');

            $.post("php_work/postexpe.php", {
                task: "posts",
                useremail: user_email,
                expe: exp,
                rel: related,
                con: conclusion,

            }, function(data) {
                // var result = jQuery.parseJSON(data)
                // alert(result.name)

                // var row_div = document.createElement('div');
                // row_div.setAttribute('class','row');

                // var div_col12 = document.createElement('div');
                // div_col12.setAttribute('class','col-sm-12');

                // var div_panel = document.createElement('div');
                // div_panel.setAttribute('class','panel panel-default view_exp_post_box');

                // var div_panel_body = document.createElement('div');
                // div_panel_body.setAttribute('class','panel-body post');

                // var div_postexp = document.createElement('div');
                // div_postexp.setAttribute('class','panel-body post');
                
                // var div_col_xs_1 = document.createElement('div');
                // div_col_xs_1.setAttribute('class','col-xs-1');

                // var img = document.createElement('img');
                // img.setAttribute('src',"./"+data.image)
                // img.setAttribute('width',42)
                // img.setAttribute('height',42)

                // div_col_xs_1.appendChild(img)
                // div_postexp.appendChild(div_col_xs_1)
                // div_panel_body.appendChild(div_postexp)
                // div_panel.appendChild(div_panel_body)
                // div_col12.appendChild(div_panel)
                // row_div.appendChild(div_col12)

                // $('#post_append').prepend(row_div);

                show_post(data)
                
            });

        } else {
            $('#p_exp').css('border', '1px solid #ff0000');
        }


        $('#p_exp').val("");
        $('#p_con').val("");
    });

    function show_post(data) {
        if (data == jQuery.trim('<script>loadScript("insertcomm.js?t=<?php echo time(); ?>"); loadScript("like.js?t=<?php echo time(); ?>");</script>')) {
            $('#p_exp').css('border', '1px solid #ff0000');
        } else {
            $('#post_append').prepend(data);
        }
    }
});