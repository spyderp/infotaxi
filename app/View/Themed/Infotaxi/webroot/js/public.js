$('.pag').on('click',function(){
	var url =$(this).attr('href');
	//$('#contenido').fadeOut(300).delay(800).fadeIn(900).load(url);
	var article=$('#contenido article');
	var height=article.css('height');
	var contenido=$('#contenido');
	article.fadeOut(3000);
	contenido.css('min-height', height).delay(1000).fadeIn(900).load(url);
	contenido.removeAttr('style');
	history.pushState('', 'INFOTAXI::: url', url);
	return false;
});
$(".ancla").on("click",function(){
	elementClick = $(this).attr("href")
	destination = $('#ancla-'+elementClick).offset().top;
	$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 1100 );
	return false;
}); 
 window.onpopstate = function(event) {
console.log("pathname: "+location.pathname);
$('#contenido').fadeOut().delay(100).slideDown().load(location.pathname);
};



