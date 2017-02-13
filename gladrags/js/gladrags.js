function byId(a){return document.getElementById(a);}
function byClasses(a){return document.getElementsByClassName(a);}
window.onload=function(){
	$('#menuButton').click(function(){
		$('#menuButton').toggleClass('expand');
		$('.subMenuButton').each(function(){
			if($(this).hasClass('expand'))
				$(this).toggleClass('expand');
		});
	});
	$('.menuOverlay').click(function(){
		$('#menuButton').removeClass();
	});
	$('.subMenuButton').each(function(){
		$(this).click(function(){
			$(this).toggleClass('expand');
			$('header>nav>ul').toggleClass('sub');
		})
	});
};