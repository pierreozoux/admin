$(document).ready(function () {
    $(window).scroll(function() {
        if ($(window).width() > 1024) {
            if ($(window).scrollTop() > 20) {
                if ($("#top-bar-container").css('border-bottom') != '3px solid #222') {
                    $("#top-bar-container").css('border-bottom', '3px solid #222');
                }
            } else {
                if ($("#top-bar-container").css('border-bottom') != 'none') {
                    $("#top-bar-container").css('border-bottom', 'none');
                }
            }
        }
    });
    $(window).resize(function() {
        if ($(window).width() < 1024) {
            if ($("#top-bar-container").css('border-bottom') != '3px solid #222') {
                $("#top-bar-container").css('border-bottom', '3px solid #222');
            }
        } else {
            if ($("#top-bar-container").css('border-bottom') != 'none') {
                $("#top-bar-container").css('border-bottom', 'none');
            }
        }
    });
});
