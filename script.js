$(document).ready(function () {
  $(document).on('click', '.color_name',function () {
    var color_name = $(this).text();
    var object = $(this);
    $.get('query.php?color=' + color_name).then(function (response) {
      var data = JSON.parse(response);
      var votes = data.votes;
      if(votes){
        object.parent().find('.votes_number').html(votes);  
      } else {
        object.parent().find('.votes_number').html(0);
      }
    }, function (error) {
      console.log(error);
    });
  });

  $(document).on('click', '.total_name',function () {
    var votes_number = $('.votes_number');
    var total = 0;
    for(var i = 0; i <votes_number.length ; i++) {
      if($(".votes_number").eq(i).text()){
        total += parseInt($(".votes_number").eq(i).text());  
      }      
    }

    $(".total_number").html(total);

  });
});