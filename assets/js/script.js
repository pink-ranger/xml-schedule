$(function(){
    $(".dropdown-menu li a").click(function(){
      $(this).parents('.dropdown').find(".btn").html($(this).text() 
        + ' <span class="caret"></span>');
      $(this).parents('.dropdown').find(".btn").val($(this).text());
      $(this).parents('.dropdown').find("input").val($(this).text());
   });
});

