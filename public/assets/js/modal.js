
$( document ).ready(function() {
  var elements = $('.modal-overlay, .modal');

$('#boton_modal').click(function(){
    elements.addClass('active');
});
$('#boton_modal1').click(function(){
  elements.addClass('active');
});
$('#boton_modal2').click(function(){
  elements.addClass('active');
});
$('#boton_modal3').click(function(){
  elements.addClass('active');
});
$('#boton_modal4').click(function(){
  elements.addClass('active');
});
$('#boton_modal5').click(function(){
  elements.addClass('active');
});


$('.close-modal').click(function(){
    elements.removeClass('active');
});
});




$('.button_sidebar').hide();

$('.sidebar_hide').click(function () {
	//$('.sidebar_close').hide();
	$('.main-panel').animate({
		width: "+=104px"
	});
	$('.sidebar').animate({
		width: "96px"
	});
	$('.sidebar-wrapper').animate({
		width: "96px"
	});
	$('.sidebar_hide').hide();
	$('.original-menu').addClass('hide-menu');
	$('.mini-menu').removeClass('hide-menu');
	$('.button_sidebar').show();
});
$('.button_sidebar').click(function () {
	//$('.sidebar_close').show();
	$('.main-panel').animate({
		width: "-=104px"
	});
	$('.sidebar').animate({
		width: "200px",
	});
	$('.sidebar-wrapper').animate({
		width: "200px"
	});
	$('.sidebar_hide').show();
	$('.original-menu').removeClass('hide-menu');
	$('.mini-menu').addClass('hide-menu');

	$('.button_sidebar').hide()

});