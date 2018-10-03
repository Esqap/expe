$(document).ready(function() {
    $("#btn_unfollow").click(function() {
        var userid = $("#user_id").val();
        var followid = $("#follow_id").val();

        $.post("php_work/Unfollow_profile.php", {
            task: "unfollow",
            user_id: userid,
            id: followid
        });
        unfollow();
    });

    $("#btn_follow").click(function() {
        var userid = $("#user_id").val();
        var followid = $("#follow_id").val();

        $.post("php_work/follow_profile.php", {
            task: "follow",
            user_id: userid,
            id: followid
        });
        follow();
    });

    function follow() {
        $("#div_follow").css("display", "none");
        $("#div_unfollow").css("display", "inline");
    }

    function unfollow() {
        $("#div_follow").css("display", "inline");
        $("#div_unfollow").css("display", "none");
    }
});