$(document).ready(function(){
    $(".menu-titulo").click(function() {
      var nextId      = $(this).next('div').attr('id');
      $(".menu-itens").each(function() {
        $(this).fadeOut(500);
      }).promise().done(function () {
        $("#"+nextId).fadeIn(500);
      });
    });
});
