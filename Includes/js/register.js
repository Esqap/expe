$(document).ready(function() {

    $("#empty_uname").hide();
    $("#empty_email").hide();
    $("#empty_pass").hide();
    $("#empty_occu").hide();
    $("#register_note").hide();

    var username;
    var email;
    var pass;
    var occu;
	var referrer_id = $("#referrer_id").val();


    $("#r_username").focusout(function() {
        username = $("#r_username").val();
        if (username === "") {
            username = false;
            $("#empty_uname").html("Please enter your name");
            $("#empty_uname").show();
        } else {
            username = chek_username(username);
        }
    });
		
    $("#r_email").focusout(function() {
        email = $("#r_email").val();
        if (email === "") {
            email = false;
            $("#empty_email").html("Please enter your E-mail. " +
                "E.g: name@example.com");
            $("#empty_email").show();
        } else {
            email = chek_email(email);
        }
    });

    $("#occupation").blur(function() {
        occu = $("#occupation").val();
        if(occu === 'null'){
            occu = false;
            $("#empty_occu").html("Please select an occupation.");
            $("#empty_occu").show();
        }else{
            occu = $("#occupation").val();
        }
    });


    $("#r_pass").focusout(function() {
        pass = $("#r_pass").val();
        if (pass === "") {
            pass = false;
            $("#empty_pass").html("Please enter your Password. " +
                "Password can only contain alphabets a-z, digits 0-9, periods (.) and spaces"
            );
            $("#empty_pass").show();
        } else if (pass.length < 8) {
            $("#empty_pass").html("Password must be greater than 8 characters. " +
                "Password can only contain alphabets a-z, digits 0-9, periods (.) and spaces"
            );
            $("#empty_pass").show();
        } else {
            pass = chek_pass(pass);
        }
    });
	

    function chek_pass(p) {
        var pattern = new RegExp(/^[a-zA-Z\s\.0-9]+$/);
        if (pattern.test(p)) {
            $("#empty_pass").hide();
            return p;
        } else {
            $("#empty_pass").html("Please enter a valid Password. " +
                "Password can only contain alphabets a-z, digits 0-9, periods (.) and spaces"
            );
            $("#empty_pass").show();
            return false;
        }
    }

    function chek_email(em) {
        var pattern = new RegExp(/^[a-zA-Z][a-zA-Z0-9\.-_]+@[a-zA-Z]+\.[a-zA-Z]+$/);
        if (pattern.test(em)) {
            $("#empty_email").hide();
            return em;
        } else {
            $("#empty_email").html("Please enter a valid E-mail. " +
                "E.g: name@example.com"
            );
            $("#empty_email").show();
            return false;
        }
    }

    function chek_username(user) {
        var pattern = new RegExp(/^[a-zA-Z\s\.]+$/);
        if (pattern.test(user)) {
            $("#empty_uname").hide();
            return user;
        } else {
            $("#empty_uname").html("Please enter a valid name");
            $("#empty_uname").show();
            return false;
        }
    }
	
	

    $("#btn_register").click(function() {
        if (username !== null && email !== null && pass !== null && occu !== null && username !== false && email !== false && pass !== false ) {
            $("#empty_uname").hide();
            $("#empty_email").hide();
            $("#empty_pass").hide();
            $("#empty_occu").hide();
            
            
            $.post("php_work/User_register.php", {
                    task: "register",
                    r_email: email,
                    r_pass: pass,
                    r_username: username,
					referrer_id:referrer_id
					
                },
                function(data) {
                    $("#register_note").html(data);
                    $("#register_note").show();
                });

        } else if (username == null || username == false) {
            $("#empty_uname").html("Please enter valid a name");
            $("#empty_uname").show();
        } else if (email == null || email == false) {
            $("#empty_email").html("Please enter an E-mail. " +
                "E.g: name@example.com"
            );
            $("#empty_email").show();
        } else if (pass == null || pass == false) {
            $("#empty_pass").html("Please enter a Password. " +
                "Password can only contain alphabets a-z, digits 0-9, periods (.) and spaces"
            );
            $("#empty_pass").show();
        }
        
    })

});