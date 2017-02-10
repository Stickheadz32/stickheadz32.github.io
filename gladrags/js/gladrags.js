function byId(a){return document.getELementById(a);}
window.onload=function(){
	byId('menuButton').click(function(){
		byId('menuButton').toggleClass('expand');
	});
	})
}
