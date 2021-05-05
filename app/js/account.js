const mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/;

$(document).ready(function() {
    $("#login").click(function() {
        var email = $("#email").val().trim();
        var pwd = $("#pwd").val().trim();

        if (email != "" && pwd != "") {
            $.ajax({
                url: 'php/login.php',
                type: 'post',
                data: {
                    email: email,
                    pwd: pwd
                },
                success: function(res) {
                    var msg = "";

                    if (res == 1) {
                        window.location = "index.php";
                    } else {
                        msg = "Invalid username or password";
                    }

                    $("#loginMessage").html(msg);
                }
            })
        }
    });
});

$(document).ready(function() {
    $("#signup").click(function() {
        var email = $("#new_email").val().trim();
        var password = $("#new_pwd").val().trim();
        var repeatPwd = $("#repeat_pwd").val().trim();

        if (email != "" && password != "" && password == repeatPwd) {
            if (email.match(mailFormat)) {
                $.ajax({
                    url: 'php/check.php',
                    type: 'post',
                    data: {
                        email: email,
                    },
                    success: function(res) {
                        var msg = "";

                        if (res == 0) {
                            $.ajax({
                                url: 'php/sign_up.php',
                                type: 'post',
                                data: {
                                    email: email,
                                    username: email.split("@")[0],
                                    password: password,
                                },
                                success: function() {
                                    alert("Account created!");
                                }
                            })
                        } else if (res == 1) {
                            msg = "Email already used";
                        }

                        $("#signupMessage").html(msg);
                    }
                })
            } else {
                $("#signupMessage").html("Give a proper email format ");
            }
        } else if (password != repeatPwd) {
            $("#signupMessage").html("The two password must match");
        }
    });
});

$(document).ready(function() {
    $(".orders").ready(function() {
        $.ajax({
            url: 'php/getUserOrders.php',
            type: 'get',
            data: { user: 'user' }
        });
    });
});