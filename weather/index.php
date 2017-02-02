<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>Weather</title>
<link rel="stylesheet" type="text/css" href="weather.css"/>
<script type="text/javascript" defer>
var appid='<?php include_once "appid.php";echo $APPID;?>',temp,loc,icon,humidity,wind,direction,weatherItems=1;
function updateByCityName(name){
	var url="http://api.openweathermap.org/data/2.5/weather?q="+name+"&appid="+appid;
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
					resolve(x.response);
					var data=JSON.parse(x.response),a={};
					a.icon=data.weather[0].id;
					a.humidity=data.main.humidity;
					a.wind=mph2ms(data.wind.speed);
					a.direction=degreesToDirection(data.wind.deg);
					a.location=data.name;
					a.temp=k2c(data.main.temp);
					update(a);
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
function update(a){
	temp.innerHTML=a.temp;
	loc.innerHTML=a.location;
	icon.innerHTML=a.icon;
	humidity.innerHTML=a.humidity;
	wind.innerHTML=a.wind;
	direction.innerHTML=a.direction;
}
function showPosition(pos){
	updateByGeo(pos.coords.latitude,pos.coords.longtitude);
}
window.onload=function(){
	temp=byId("temperature0");
	loc=byId("location0");
	icon=byId("icon0");
	humidity=byId("humidity0");
	wind=byId("wind0");
	direction=byId("direction0");
	var weather={};
	weather.wind=3.5;
	weather.direction="N";
	weather.humidity=35
	weather.loc="Boston";
	weather.temp="45"
	weather.icon=200;
	updateByCityName("Norrköping");
}
function addCity(){
	if(weatherItems>19){
		document.body.scrollTop=document.body.scrollHeight;
		return byId("warningBox").innerHTML="Reached max limit of locations. Remove one to continue.";
	}
	else if(weatherItems<20){
		byId('warningBox').innerHTML="";
		a='<div class="weather-item" id="weather-app'+weatherItems+'"><div class="left"><div class="temperature"><span id="temperature'+weatherItems+'">0</span>&deg;C</div><div class="location"><span id="location'+weatherItems+'">Unknown</span></div></div><div class="right"><div class="top"><span id="icon'+weatherItems+'"></span></div><div class="bottom"><div class="humidity"><span id="humidity'+weatherItems+'">0</span>%</div><div class="wind"><span id="wind'+weatherItems+'">0</span> m/s <span id="direction'+weatherItems+'">N</span></div></div></div>City <textarea id="insertCityName'+weatherItems+'"></textarea><button type="submit" id="buttonCity'+weatherItems+'" onclick="updateByCityName(byId(\'insertCityName'+weatherItems+'\').value)">Update city name</button><br>Zip <textarea id="insertZip'+weatherItems+'"></textarea><button type="submit" id="buttonZip'+weatherItems+'" onclick="updateByZip(byId(\'insertZip'+weatherItems+'\').value)">Update zip</button><br>Lat <textarea id="insertLat'+weatherItems+'"></textarea><br>Long <textarea id="insertLon'+weatherItems+'"></textarea><button type="submit" id="buttonLatLon'+weatherItems+'" onclick="updateByGeo(byId(\'insertLat'+weatherItems+'\').value,byId(\'insertLon'+weatherItems+'\').value)">Update geo</button><div class="remove" id="buttonRemove'+weatherItems+'" onclick="removeCity('+weatherItems+')"></div></div>';
		weatherItems++;
		byId('weather-app').innerHTML+=a;
	}
}
function removeCity(a){
	var w="weather-app"+a,items=byClasses("weather-item").length-a;
	weatherItems=byClasses("weather-item").length;
	byId(w).outerHTML="";
	if(a>=weatherItems-1){
	}
	else if(a<weatherItems-1){
		for(a++;a<weatherItems;a++){
			var b=a-1;
			byId('weather-app'+a).id='weather-app'+b;
			byId('temperature'+a).id='temperature'+b;
			byId('location'+a).id='location'+b;
			byId('icon'+a).id='icon'+b;
			byId('humidity'+a).id='humidity'+b;
			byId('wind'+a).id='wind'+b;
			byId('direction'+a).id='direction'+b;
			byId('insertCityName'+a).id='insertCityName'+b;
			byId('insertZip'+a).id='insertZip'+b;
			byId('insertLat'+a).id='insertLat'+b;
			byId('insertLon'+a).id='insertLon'+b;
			byId('buttonCity'+a).setAttribute('onclick','updateByCityName(byId(\'insertCityName'+b+'\').value)');
			byId('buttonZip'+a).setAttribute('onclick','updateByZip(byId(\'insertZip'+b+'\').value)');
			byId('buttonLatLon'+a).setAttribute('onclick','updateByGeo(byId(\'insertLat'+b+'\').value,byId(\'insertLon'+b+'\').value)');
			byId('buttonRemove'+a).setAttribute('onclick','removeCity('+b+')');
			byId('buttonCity'+a).id='buttonCity'+b;
			byId('buttonZip'+a).id='buttonZip'+b;
			byId('buttonLatLon'+a).id='buttonLatLon'+b;
			byId('buttonRemove'+a).id='buttonRemove'+b;
		}
	}
	weatherItems=items-1;
}
</script>
</head>
<body>
<div id="weather-app">
	<div class="weather-item" id="weather-app0">
		<div class="left">
			<div class="temperature">
				<span id="temperature0">0</span>&deg;C
			</div>
			<div class="location">
				<span id="location0">Unknown</span>
			</div>
		</div>
		<div class="right">
			<div class="top">
			<span id="icon0"></span>
			</div>
			<div class="bottom">
				<div class="humidity">
					<span id="humidity0">0</span>%
				</div>
				<div class="wind">
					<span id="wind0">0</span> m/s <span id="direction0">N</span>
				</div>
			</div>
		</div>
		City <textarea id="insertCityName0"></textarea>
		<button type="submit" id="buttonCity0" onclick="updateByCityName(byId('insertCityName0').value)">Update city name</button><br>
		Zip <textarea id="insertZip0"></textarea>
		<button type="submit" id="buttonZip0" onclick="updateByZip(byId('insertZip0').value)">Update zip</button><br>
		Lat <textarea id="insertLat0"></textarea><br>
		Long <textarea id="insertLon0"></textarea>
		<button type="submit" id="buttonLatLon0" onclick="updateByGeo(byId('insertLat0').value,byId('insertLon0').value)">Update geo</button>
		<div class="remove" id="buttonRemove0" onclick="removeCity(0)"></div>
	</div>
</div>
	<div class="add" onclick="addCity()"><p>Add city</p></div>
<div id="warningBox"></div>
</body>
</html>