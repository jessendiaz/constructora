// utf-8 script áéççÁ

$(document).ready(function(){

	// OPTIONS HOVER EFFECT
	$('#options-bar ul').hover( function(){
		$('.inactive', this).show();
		$(this).addClass('hover');
	},
	function() {
		$('.inactive', this).hide();
		$(this).removeClass('hover');
	});

	// MENU HOVER EFFECT
	// preloads images
	$('span.menuItem img').each( function(){
		preloadedImg = $(this).attr('src');
		preloadedImg = preloadedImg.replace('.gif','_hover.gif');
		// alert(preloadedImg)
		jQuery("<img>").attr("src", preloadedImg);
	});

	// images hover effect
	$("#mainNavigation ul li a").hover( function() {
		upImg = $('span.menuItem img', this).attr('src');
		hoverImg = upImg.replace('.gif','_hover.gif');
		$("span.menuItem img", this).attr('src',hoverImg); 
	}, function() {
		hoverImg = $('span.menuItem img',this).attr('src');
		upImg = hoverImg.replace('_hover.gif','.gif');
		$("span.menuItem img", this).attr('src',upImg); 
	});
	// ----> end MENU HOVER EFFECT

	// expand & collapse Contact message field
	$("#contactExpand").click( function() {
		$('#contact textArea').animate({ height: 250}, 300 );
		$("#contactExpand").hide();
		$("#contactCollapse").show();
		return false;
	});
	
	$("#contactCollapse").click( function() {
		$('#contact textArea').animate({ height: 100}, 300 );
		$("#contactCollapse").hide();
		$("#contactExpand").show();
		return false;
	});

});