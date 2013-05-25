$(document).foundation();

function showModal(template, url) {
    var html = $('#'+template).html();
    $('#modal').html('<br /><br /><br />'); // Reset the HTML of the modal (in case of lagging)
    if (typeof url === "string") {
        $.getJSON(url, function(data) {
            $('#modal').html(Mustache.to_html(html, data));
        });
    } else {
        $('#modal').html(html);
    }
    $('#modal').foundation('reveal', 'open');
}

$(document).ready(function () {
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
    $("#deleteWarningDisplay").click(function() {
      notTwice=true;
      $("#userToDelete").replaceWith('<span class="upperStrong" id="userToDelete">'+user+'</span>');
      $("#userDeleteWarning").foundation('reveal', 'open');
    });

    $("#deleteUser").click(function(){
      $.ajax({
        type: 'DELETE',
        url: '/user/delete',
        data: {donnee: 'nom'},
        dataType: 'json',
        success: function(data){
          console.log(data.myMsg);
        }
      });
    });
});
