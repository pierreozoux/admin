var user='nobody';
var notTwice= true;

$('#userDetails').foundation('reveal', {
    opened: function () {
      if(notTwice){
        $.getJSON('/user/details?user='+ user, function(data){
            console.log(data.myMsg);
            $('#userDetails > span').append(data.myMsg);
        });
        notTwice=false;
      }
    },
    closed: function () {
    }
});

$(document).foundation();

function showModal() {
  notTwice=true;
  $('#userDetails').foundation('reveal', 'open');          
} 

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
