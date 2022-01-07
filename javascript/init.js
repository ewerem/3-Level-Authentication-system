//initializing my matrial design plugins

$(document).ready(function(){
    
    $('.button-collapse').sideNav();


//slider
$('.slider').slider();

//modal
$('.modal').modal({
  opacity:.1
});

$('#modal2').modal({
  opacity:.8,
});
$('#modal2').modal('open');

//collapse
 $('.collapsible').collapsible();

});

//parallax
    $('.parallax').parallax();
