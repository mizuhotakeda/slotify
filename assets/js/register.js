$(document).ready(function() {
    console.log("document is ready");
    $("#hideLogin").click(function() { //$オブジェクト
        $("#loginForm").hide();
        $("#registerForm").show();
    });

    $("#hideRegister").click(function() {
        $("#loginForm").show();
        $("#registerForm").hide();
    });

});
