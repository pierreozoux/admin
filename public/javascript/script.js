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

    if ($(".tab.active").length == 1) {
        var position = $(".tab.active a").position().left + $(".tab.active a").width()/2 - 17;
        $("#poc").css('left', position).show();
    }
});
