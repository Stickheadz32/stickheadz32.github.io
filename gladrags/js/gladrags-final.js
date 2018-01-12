window.onload=function(){
	var btnSub=".subMenuButton",
		ulMenu="header>nav>ul",
		btnMenu="#menuButton",
		open='expand';
	function click(a,b){return $(a).click(b);}
	function addSub(){$(ulMenu).addClass('sub');}
	function resetSub(){$(ulMenu).removeClass();}
	function hasExpand(query){return $(query).hasClass(open);}
	function containsExpand(query){return $(query+'.'+open).length;}
	function closeThis(){$(this).removeClass(open);}
	function toggleOpen(query){$(query).toggleClass(open);}
	function closeSubs(){$(btnSub).each(closeThis);}

	function resetMenu(){
		resetSub();
		if(containsExpand(btnSub))
			closeSubs();
	}
	click(btnMenu,function(){
		if(containsExpand(btnMenu))
			resetMenu();
		toggleOpen(btnMenu);
	});
	click('.menuOverlay',function(){
		$(btnMenu).removeClass();
		resetMenu();
	});
	$(btnSub).each(function(){
		click(this,function(){
			if(containsExpand(btnSub))
				if(!hasExpand(this))
					closeSubs();
			toggleOpen(this);
			if(containsExpand(btnSub))
				addSub();
			else resetSub();
		});
	});
};