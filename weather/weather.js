var appid='ac15a03db87914aadb8e7d3ce9ea8388';
function updateByCityName(name){
	var url;
	if(name.indexOf(",")<0)
	url="http://api.openweathermap.org/data/2.5/weather?q="+name+"&appid="+appid;
	else url="http://api.openweathermap.org/data/2.5/group?q="+name+"&appid="+appid;
	sendRequest(url);
}
function updateByZip(zip){
	var url="http://api.openweathermap.org/data/2.5/weather?q="+zip+"&appid="+appid;
	sendRequest(url);
}
function updateByGeo(lat,lon){
	var url="http://api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+lon+"&appid="+appid;
	sendRequest(url);
}
function sendRequest(url){
	return new Promise(function(resolve,reject){
		var x=new XMLHttpRequest();
		x.onreadystatechange=function(){
			if(x.readyState===4){
				if(x.status===200){
					update(JSON.parse(x.response));
					resolve(x.response);
				}
				else reject("Error getting weather information. "+x.responseText);
			}
		};
		x.open("GET",url,true);
		x.send();
	});
}
function degreesToDirection(deg){
	var range=360/16,low=360-range/2,high=(low+range)%360,angles=["N","NNE","NE","ENE","E","ESE","SE","SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"];
	for(var i in angles){
		if(deg>=low&&deg<high){return angles[i];}
		low=(low+range)%360;
		high=(high+range)%360;
	}
	return "N";
}
function k2c(kelv){return Math.round(kelv-273.15);}
function k2f(kelv){return Math.round(kelv*(9/5)-459.67);}
function mph2ms(mph){return Math.round(10*mph/0.621371192237334/3.6)/10;}
function byId(id){return document.getElementById(id);}
function byClasses(name){return document.getElementsByClassName(name);}
function update(data){
	var a={},out="";
	/*print out data*/
	if(data.cnt){
		var count=data.cnt,i=0;
		for(;i<count;i++){
			var item=data.list[i];
			a.icon=item.weather[0].id;
			a.humidity=item.main.humidity;
			a.wind=mph2ms(item.wind.speed);
			a.direction=degreesToDirection(item.wind.deg);
			a.location=item.name;
			a.temp=k2c(item.main.temp);
			out+="<div class=\"cityinfo\">";
			out+="<p>"+a.humidity+"</p>";
			out+="<p>"+a.wind+"</p>";
			out+="<p>"+a.direction+"</p>";
			out+="<p>"+a.location+"</p>";
			out+="<p>"+a.temp+"</p>";
			out+="</div>";
		}
	}else{
		a.icon=data.weather[0].id;
		a.humidity=data.main.humidity;
		a.wind=mph2ms(data.wind.speed);
		a.direction=degreesToDirection(data.wind.deg);
		a.location=data.name;
		a.temp=k2c(data.main.temp);
		out+="<div class=\"cityinfo\">";
		out+="<h2>"+a.location+"</h2>";
		out+="<p>"+a.humidity+"</p>";
		out+="<p>"+a.wind+"</p>";
		out+="<p>"+a.direction+"</p>";
		out+="<p>"+a.temp+"</p>";
		out+="</div>";
	}
	return document.getElementById("weather-app").innerHTML=out;
}
function showPosition(pos){
	updateByGeo(pos.coords.latitude,pos.coords.longtitude);
}
window.onload=function(){
	byId("btnCity").addEventListener('click',function(){
		updateByCityName(byId("inputCity").value);
	});
};