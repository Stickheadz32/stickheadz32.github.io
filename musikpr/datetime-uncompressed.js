function uT(){

	var a = new Date(),
	
		b = a.getMinutes(),
		c = a.getSeconds(),
		
		d = a.getDate(),
		
		e = ["January","February","March","April","May","June","July","August","September","October","November","December"],
		
		f = d % 10,
		g = d % 100;
	
	/* 0:00:00 format */
	document.getElementById('dateNow_clock').innerHTML = a.getHours() + ":" +
		(b > 9 ? b : "0"+b) + ":" +
		(c > 9 ? c : "0"+c);
	
	document.getElementById('dateNow_dayMonth').innerHTML = e[a.getMonth()]+" "+
	/* 1st 2nd 3rd 4th... 11th 12th 13th 14th... 21st 22nd 23rd 24th...	*/
		(f === 1 && g !== 11 ? d+"st" :
		 f === 2 && g !== 12 ? d+"nd" :
		 f === 3 && g !== 13 ? d+"rd" :
			d+"th");
	
	document.getElementById('dateNow_year').innerHTML = a.getFullYear();
}
uT();
setInterval(uT,1e3);