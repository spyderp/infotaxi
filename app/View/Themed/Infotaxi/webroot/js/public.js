$('.pag').on('click',function(){
	var url =$(this).attr('href');
	var article=$('#contenido article');
	var contenido=$('#contenido');
	contenido.load(url);
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



