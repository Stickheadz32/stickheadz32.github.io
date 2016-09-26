var autoHTML=1;
function htmlPic(){
	if(autoHTML){
	    var a=window.screen.height,
	    //bildfilsuffix anpassad efter skärmupplösning
	    //parantes efter kolon för att ställa en ny ?: fråga
	    b=a<719?4:
	    (a<1079?3:
	    (a<2169?2:
	    (a<4351?1:0)));
	    var v=document.getElementsByTagName("html")[0],
		r=v.id,
		//bildprefix
		img=["beach","coast","stone"],
		s=r.length>0?r.slice(0,-1):img[2];
		//bildsuffix
		ir=["_4K","_2K","_1080p","_720p","_480p"],
		//byter bild, se variabel img
		r=(!r||s==img[2])?img[0]:(s==img[0]?img[1]:img[2]);
		var pre=new Image(),i;
		for(i=0;i<3;i++)
		//bildprefix + suffix
		pre.src="img/"+img[i]+ir[b]+".jpg";
		v.id=r+b;
	}
}
for(var i=0;i<4;i++)htmlPic();
setInterval(htmlPic,5e3);
var menu = document.getElementsByClassName("menu")[0];
menu.addEventListener("click",function(){
	menu.id=menu.id==""?"openMenu":"";
});