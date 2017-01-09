/*Tar upp mindre kod att deklarera variabel för ett DOM-objekt eller funktion som används mer än en gång; drar mindre prestanda på så sätt*/
var doc=document;
function byId(a){return doc.getElementById(a);}
function byClass(a){return doc.getElementsByClassName(a);}
function byTag(a){return doc.getElementsByTagName(a);}
function query(a){return doc.querySelector(a);}
/*attachEvent för tillgänglighet i IE5-IE8*/
function event(a,event,b){
    if(event=="click")
    a.addEventListener?a.addEventListener("click",b):a.attachEvent&&a.attachEvent("onclick",b);
    else a.addEventListener?a.addEventListener(event,b):a.attachEvent&&a.attachEvent(event,b);
}
/*srcElement för tillgänglighet i IE5-IE8*/
function target(e){return e.target?e.target:e.srcElement;}
event(byId("mainExpand"),"click",function(){
    /*hämtar headern*/
    var a=query("header");
    /*växlar id beroende på responsiv menyöppningsknapp*/
    a.id=a.id=="mainOn"?"":"mainOn";
});
/*hämtar alla details-taggar*/
var detail = doc.querySelectorAll('details'),i;
/*lägger till funktion för alla details-taggar*/
for(i=0;i<detail.length;i++)
    /*häntar summary-tagg per details-tagg*/
    event(detail[i].querySelector("summary"),"click",function(e){
        /*byt class-attribut mellan "open" och "", detta menas öppnad och stängd/ihopfälld details-tagg*/
        target(e).parentNode.classList.toggle('open');
    });
/*använder slidern som variabel*/
var slider = byId("slider"),slide=0,slideSwitch=false;
/*omräknar vilken slide man skrollar till*/
function calcSlide(){
    slide=slider.scrollLeft/slider.clientWidth;
}
event(slider,"scroll",calcSlide);
/*mjuk automatisk skroll*/
function smoothScroll(a,b){
    if(slideSwitch){
        /*end betraktas som keyframe*/
        var end=0,fps=60;
        /*sätt timer som variabel för att göra den temporär*/
        var timer = setInterval(function(){
            /*ändrar skrollposition*/
            /*Använder -cos(time*pi)/2+0.5 för en mjuk start och mjuk slut.
            Graf av mattefunktionen ovan:
                https://www.google.se/#q=-cos(x*pi)%2F2%2B.5
            */
            a.scrollLeft=a.clientWidth*slide+(b-a.clientWidth*slide)*(-Math.cos(end*Math.PI)/2+.5);
            /*ökar keyframevärde med 1/60 varje 1/60 millisekunder*/
            end=Math.round(end*fps+1)/fps;
            if(end>1){
                /*stoppa timern för skroll-animeringen*/
                clearInterval(timer);
                slideSwitch=false;
            }
        /*uppdaterar varje 60 millisekunder. 1000/60 = 16.67 Hz*/
        },1000/fps);
    }
}
function slideShow(){
    if(byClass("slide")[slide+1]){
        if(slider.scrollLeft<byClass("slide")[slide+1].offsetLeft){
            slideSwitch=true;
            /*skroll-animering till nästa slide*/
            smoothScroll(slider,byClass("slide")[slide+1].offsetLeft);
        }
    }else{
        slideSwitch=true;
        /*skroll-animering till första sliden*/
        smoothScroll(slider,0);
    }
    /*räkna om vilken slide som visas*/
    calcSlide();
}
/*byter automatiskt bild varje 5000 millisekunder*/
setInterval(slideShow,5000);