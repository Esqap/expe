$(document).ready(function() {

    $(".cmt_link").each(function() {

        var link = this;
        $(link).click(function() {

            var expid = $("#expid" + link.id).val();
            var commentid = $("#comment" + expid).val();
            console.log(commentid);
            $.post("php_work/more_comments.php", {
                    task: "morecomments",
                    exp_id: expid,
                    comment_id: commentid
                },
                function(data) {
                    $('#more_comments' + expid).prepend(data);
                    $('#cmt_link' + expid).css("display", "none");

                }
            );

        });

    });

});