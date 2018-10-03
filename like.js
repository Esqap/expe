$(document).ready(function() {
    function like(data, id) {
        $('#like' + id).css('display', 'none');
        $('#unlike' + id).css('display', 'block');
        $('#show' + id).html(data.likes);
    }

    function unlike(data, id) {
        $('#like' + id).css('display', 'block');
        $('#unlike' + id).css('display', 'none');
        $('#show' + id).html(data.likes);
    }

    $(".plike").each(function() {
        var link = this;
        $(link).click(function() {
            var expid = $("#expid" + link.id).val();
            var lemail = $("#email" + link.id).val();
            var user_email = $("#useremail" + link.id).val();
            $.post("liked.php", {
                    task: "like",
                    exp_id: expid,
                    email: lemail,
                    useremail: user_email
                },
                function(data) {
                    like(jQuery.parseJSON(data), link.id);
                }

            );
        });
    });

    $(".punlike").each(function() {
        var link = this;
        $(link).click(function() {
            var expid = $("#expid" + link.id).val();
            var lemail = $("#email" + link.id).val();
            var user_email = $("#useremail" + link.id).val();
            $.post("unlike.php", {
                    task: "unlike",
                    exp_id: expid,
                    email: lemail,
                    useremail: user_email
                },
                function(data) {
                    unlike(jQuery.parseJSON(data), link.id);
                }

            );
        });
    });

});