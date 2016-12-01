var x=new XMLHttpRequest(),url="outsmart_sarif.txt",a,line=0,
	persons=[],
	conditions,
	currentCond="",
	selectedRespond="",
	hasResponded=false,
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
	getLine();
});
function getLine(){
	var notResponse=false;
	if(!hasResponded){
		
	}
	if(selectedRespond.length>0){
		if(a.conversation[line].condition.indexOf(currentCond+">"+selectedRespond)<0&&currentCond==""){
			line++;
			notResponse=true;
			getLine();
		}
		else{
			hasResponded=true;
			currentCond=conditions[Math.floor(Math.random()*3)];
		}
	}
	var d=a.conversation[line],out="";
	if(!notResponse){
		if(d.type=="speech")
		{
			out+='<div class="speech _'+d.person;
			if(d.condition){
				if(d.condition.indexOf(currentCond+">"+selectedRespond)>=0){
					out+=" response";
				}
				else if(d.condition.indexOf("+")>=0){
					out+=" positive"
				}
				else if(d.condition.indexOf("-")>=0){
					out+=" negative"
				}
			}
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
		document.getElementById("conv").innerHTML+=out;
		document.getElementById("conv").scrollTop=document.getElementById("conv").scrollHeight;
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