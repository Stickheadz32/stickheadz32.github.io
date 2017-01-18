<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>Weather</title>
<script type="text/javascript">
var appid='<?php include_once "appid.php";echo $APPID;?>',temp,loc,icon,humidity,wind,direction;
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
	var x=new XMLHttpRequest();
	x.onreadystatechange=function(){
		if(x.readyState==4&&x.status==200){
			var data=JSON.parse(x.response),a={};
			a.icon=data.weather[0].id;
			a.humidity=data.main.humidity;
			a.wind=data.wind.speed;
			a.direction=degreesToDirection(data.wind.deg);
			a.location=data.name;
			a.temp=k2c(data.main.temp);
			console.log(a);
			update(a);
		}
	};
	x.open("GET",url,true);
	x.send();
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
function byId(id){return document.getElementById(id);}
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
	temp=byId("temperature");
	loc=byId("location");
	icon=byId("icon");
	humidity=byId("humidity");
	wind=byId("wind");
	direction=byId("direction");
	var weather={};
	weather.wind=3.5;
	weather.direction="N";
	weather.humidity=35
	weather.loc="Boston";
	weather.temp="45"
	weather.icon=200;
	updateByCityName("Norrköping");
}
</script>
</head>
<body>
<div class="weather-app">
	<div class="left">
		<div class="temperature">
			<span id="temperature">0</span>&deg;C
		</div>
		<div class="location">
			<span id="location">Unknown</span>
		</div>
	</div>
	<div class="right">
		<div class="top">
		<span id="icon"></span>
		</div>
		<div class="bottom">
			<div class="humidity">
				<span id="humidity">0</span>%
			</div>
			<div class="wind">
				<span id="wind">0</span> mph <span id="direction">N</span>
			</div>
		</div>
	</div>
</div>
City <textarea id="insertCityName"></textarea>
<button type="submit" onclick="updateByCityName(byId('insertCityName').value)">Update city name</button><br>
Zip <textarea id="insertZip"></textarea>
<button type="submit" onclick="updateByZip(byId('insertZip').value)">Update zip</button><br>
Lat <textarea id="insertLat"></textarea><br>
Long <textarea id="insertLon"></textarea>
<button type="submit" onclick="updateByGeo(byId('insertLat').value,byId('insertLon').value)">Update geo</button>
</body>
</html>