function updateByCityName(name){
	const appid='ac15a03db87914aadb8e7d3ce9ea8388';
	//send API call to one city
	if(name.indexOf(",")<0)
		sendRequest("http://api.openweathermap.org/data/2.5/weather?q="+name+"&appid="+appid);
	else{
		//several cities
		let n=name.split(","),l=n.length,i=0;
		byId("weather-app").innerHTML="";
		for(;i<l;i++){
			//ex. 'miami ,  stockholm' -> 'miami,stockholm'
			removeRedundantWhiteSpace(n[i]);
			sendRequest("http://api.openweathermap.org/data/2.5/weather?q="+n[i]+"&appid="+appid);
		}
	}
}
function sendRequest(url){
	//begin waiting to get data
	return new Promise(function(resolve,reject){
		//start up new XMLHTTPRequest
		let x=new XMLHttpRequest();
		//function for checking the data's download state
			x.onreadystatechange=function(){
				//readyState 4: DONE
				if(x.readyState===4){
					//HTTP 200: OK
					if(x.status===200){
						//prints out data
						update(JSON.parse(x.response));
						//resolves when successful
						resolve(x.response);
					}
					//shows error message on failure
					else reject("Error getting weather information. "+x.responseText);
				}
			};
		x.open("GET",url,true);
		x.send();
	});
}
function degreesToDirection(deg){
	let range=360/16,
		low=360-range/2,
		high=(low+range)%360,
		angles=["N","NNE","NE","ENE","E","ESE","SE","SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"];
	for(let i in angles){
		if(deg>=low&&deg<high){return angles[i];}
		low=(low+range)%360;
		high=(high+range)%360;
	}
	return "N";
}
//Kelvin to Celsius
function k2c(kelv){return Math.round(kelv-273.15);}
//Kelvin to Fahrenheit
function k2f(kelv){return Math.round(kelv*(9/5)-459.67);}
//Miles per hours to meters per second
function mph2ms(mph){return Math.round(10*mph/0.621371192237334/3.6)/10;}
//abbreviate DOM element functions
function byId(id){return document.getElementById(id);}
function byClasses(name){return document.getElementsByClassName(name);}
//print out data
function removeRedundantWhiteSpace(query){
	//removes white space at the beginning at the query
	while(query.indexOf(' ')==0){
		query=query.substring(1,query.length);
	}
	//remove white space at the end of the query
	while(query.lastIndexOf(' ')==query.length-1){
		query=query.substring(0,query.length-1);
	}
	return query;
}
function update(data){
	if(typeof data!=='object')return;
	let objWeather={
		/*print out data*/
		icon:data.weather[0].icon,
		weatherMain:data.weather[0].description,
		humidity:data.main.humidity,
		//mph to m/s
		wind:mph2ms(data.wind.speed),
		direction:degreesToDirection(data.wind.deg),
		location:data.name,
		//kelvin to celsius
		temp:k2c(data.main.temp),
		tempMin:k2c(data.main.temp_min),
		tempMax:k2c(data.main.temp_max)
	},
	time=new Date(),
	min=time.getMinutes(),
	sec=time.getSeconds(),
	out='<div class="cityinfo">'+
		`<h2>${objWeather.location}</h2>`+
		`<p><img src="img/w/${objWeather.icon}.png"><b>${objWeather.weatherMain}</b></p>`+
		`<p class="dataTime">${time.getHours()}:${
			//minutes in 00 format
			(min>9?min:"0"+min)}:${
				//seconds in 00 format
				(sec>9?sec:"0"+sec)}</p>`+
		`<p class="temp">${objWeather.temp}&deg;</p>`+
		`<p class="tempMin">${objWeather.tempMin}&deg;</p>`+
		`<p class="tempMax">${objWeather.tempMax}&deg;</p>`+
		`<p>${objWeather.humidity}% humidity</p>`+
		`<p>${objWeather.wind} m/s wind</p>`+
		`<p>${objWeather.direction}</p>`+
	"</div>";
	byId("weather-app").innerHTML+=out;
}
function updateTime(){
	let time=new Date(),
	min=time.getMinutes(),
	sec=time.getSeconds(),
	date=time.getDate(),
	month=["January","February","March","April","May","June","July","August","September","October","November","December"],
	ordinal_10=date%10,
	ordinal_100=date%100;
	byId('dateNow_clock').innerHTML=
		//hours
		`${time.getHours()}:${
			//minutes in 00 format
			(min>9?min:"0"+min)}:${
				//seconds in 00 format
				(sec>9?sec:"0"+sec)}`;
	byId('dateNow_dayMonth').innerHTML=
		`${month[time.getMonth()]} ${
			//1st 11th 21st ...
			(ordinal_10==1&&ordinal_100!==11?date+"st":
			//2nd 11th 22nd ...
			ordinal_10===2&&ordinal_100!==12?date+"nd":
			//3rd 13th 23rd ...
			ordinal_10===3&&ordinal_100!==13?date+"rd":
			//4th 14th 24th ...
			date+"th")
		}`;
	byId('dateNow_year').innerHTML=time.getFullYear();
}
window.onload=function(){
	//update on load
	updateTime();
	//update every second
	setInterval(updateTime,1e3);
	//button for sending API call
	byId("btnAddCity").addEventListener('click',function(){
		updateByCityName(byId("inputCity").value);
	});
	//button for clearing weather overview
	byId("btnClearView").addEventListener('click',function(){
		byId('weather-app').innerHTML="";
	});
	//button for showing in list view
	byId("btnListView").addEventListener('click',function(){
		showListView();
	});
};
//show in list view
function showListView(){
	let app=byId("weather-app"),
	btn=byId("btnListView");
	//toggle ".list"
	app.className=app.className==""?"list":"";
	//switch between list view and card view
	btn.innerHTML=btn.innerHTML=="List view"?"Card view":"List view";
}