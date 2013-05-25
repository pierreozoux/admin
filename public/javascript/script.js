$(document).foundation();

function showModal(template, url) {
    var html = $('#'+template).html();
    $('#modal').html('<div class="loader"></div>');
    if (typeof url === "string") {
        $.getJSON(url, function(data) {
            console.log(data);
            $('#modal').html(Mustache.to_html(html, data));
        });
    } else {
        $('#modal').html(html);
    }
    $('#modal').foundation('reveal', 'open');
}

$(document).ready(function () {
    // Pun gestion
    if ($(".tab.active").length == 1) {
        var position = $(".tab.active a").position().left + $(".tab.active a").width()/2 - 17;
        $("#poc").css('left', position).show();
    }
    $(window).resize(function() {
        if ($(".tab.active").length == 1) {
            var position = $(".tab.active a").position().left + $(".tab.active a").width()/2 - 17;
            $("#poc").css('left', position).show();
        }
    });
});
