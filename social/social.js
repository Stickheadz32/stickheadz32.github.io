var x=new XMLHttpRequest(),url="outsmart_sarif.txt",a,line=0,
	persons=[],
	conditions,
	currentCond="",
	selectedRespond="",
	persuasion=0,
	positiveResponse=true;
	buttonNext=true;
x.onreadystatechange=function(){
	if(x.readyState==4&&x.status==200){
	    a=JSON.parse(x.responseText);
	    persons=a.people;
		conditions=a.conditions;
		getLine();
	}
}
x.open("GET", url, true);
x.send();
document.getElementsByClassName("button-next")[0].addEventListener("click",function(){
	if(buttonNext){
		line++;
		getLine();
	}
	if(!a.conversation[line+1]||a.conversation[line].type=="choice"){
		buttonNext=false;
	}else buttonNext=true;
	updateNextButton();
});
document.getElementsByClassName("button-restart")[0].addEventListener("click",function(){
	line=0;
	document.getElementById("conv").innerHTML="";
	currentCond="";
	selectedRespond="";
	persuasion=0,
	positiveResponse=true;
	buttonNext=true;
	updateNextButton();
	getLine();
});
function getPersuasion(){
	for(var i=a.responses,j=0,k=i.length;j<k;j++)
		if(i[j].choose==selectedRespond)
			for(var l=a.conditions,m=0,n=l.length;m<n;m++)
				if(l[m]==currentCond){
					var points=i[j].points[m];
					positiveResponse=points>=0;
					persuasion+=points;
					return;
				}
}
function getLine(){
	var d=a.conversation[line],out="";
		if(d.type=="speech")
		{
			if(d.condition!=undefined)
				currentCond=d.condition;
			out+='<div class="speech _'+d.person;
			out+='">';
			out+='<span class="person">'+persons[d.person]+'</span>';
			out+='<p>';
			out+=d.line+"</p></div>";
		}
		else if(d.type=="choice")
		{
			selectedRespond="";
			out+='<div class="choice">';
			for(var e=0;e<d.option.length;e++){
				var g=d.option[e];
				out+='<div class="choice-option" onclick="respond(\''+g.condition+'\')">';
				out+='<span class="option-title">'+g.condition+"</span>";
				out+='<p class="option-speech">'+g.line+"</p>";
				out+="</div>";
			}
			out+="</div>";
			document.getElementById("conv").innerHTML+=out;out="";
		}
		else if(d.type="response"){
			if(selectedRespond.length){
				if(d.final!=undefined&&d.final==true){
					getPersuasion();
					currentCond=persuasion>=0?"+":"-";
					redirect(currentCond);
				}
				var e=d.outcomes,f=e.length,g=0;
				for(;g<f;g++){
					var h=e[g];
					if(h.type!=undefined){
						if(h.type=="pheromones"){
							for(var i=a.pheromones,j=0,k=i.length;j<k;j++){
								if(a.pheromones[j]==selectedRespond){
									currentCond="";
									redirect(h.redirect);
									break;
								}
							}
						}
					}
					if(h.condition!=currentCond+">"+selectedRespond)
						continue;
					else{
						getPersuasion();
						out+='<div class="speech _1 '+(positiveResponse?"positive":"negative")+'"">';
						out+='<span class="person">'+persons[1]+'</span>';
						out+='<p>';
						out+=h.line+"</p></div>";
						document.getElementById("conv").innerHTML+=out;
						document.getElementById("conv").scrollTop=document.getElementById("conv").scrollHeight;
						currentCond=conditions[Math.floor(Math.random()*3)];
						return;
					}
				}
				if(g==f){
					var responseChar=positiveResponse?"+":"-";
					for(g=0;g<f;g++){
						if(e[g].condition!=responseChar+currentCond)continue;
						else{
							h=e[g];
							break;
						}
					}
				}
						out+='<div class="speech _1">';
				out+='<span class="person">'+persons[1]+'</span>';
				out+='<p>';
				out+=h.line+"</p></div>";
			}
		}
		document.getElementById("conv").innerHTML+=out;
		document.getElementById("conv").scrollTop=document.getElementById("conv").scrollHeight;
}
function redirect(to){
	var ln=a.conversation.length;
	for(;line<ln;line++){
		if(a.conversation[line].condition==to){
			return line--;
		}
	}
}
function getRespond(){
	var d=a.conversation[line],out="";
	if(d.type=="choice"){
		var b=d.option,c=b.length,e=0;
		for(;e<c;e++){
			var f=b[e];
			if(f.condition!=selectedRespond)continue;
			else{
				out='<div class="speech _0"><span class="person">'+persons[0]+'</span><p>'+f.line+'</p></div>';
				break;
			}
		}
	}
	document.getElementById("conv").innerHTML+=out;
	document.getElementById("conv").scrollTop=document.getElementById("conv").scrollHeight;
}
function respond(a){
	document.querySelector(".choice").outerHTML='';
	selectedRespond=a;
	getRespond();
	buttonNext=true;
	updateNextButton();
	return;
}
function updateNextButton(){
	document.getElementsByClassName("button-next")[0].id=buttonNext?"":"disabled";
}