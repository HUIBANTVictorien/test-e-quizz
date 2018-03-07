$(document).ready(function() {
    $('#username').keyup(function() {
        var username = $('#username').val();
        if (username != "") {
            $('.register').removeClass("hidden");
            $('.register').addClass("visible");
            console.log(username);
        } else {
            $('.register').removeClass("visible");
            $('.register').addClass("hidden");
        }
    });
});