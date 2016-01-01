function uT(){
var _ = new Date(),
	h = _.getHours(),
	m = _.getMinutes(),
	s = _.getSeconds(),
	y = _.getFullYear(),
	b = _.getDate(),
	n = new Array();

	//0:00:00 time format
	if (m < 10) m = "0"+m;
	if (s < 10) s = "0"+s;

	//Later browsers subtract getYear by 1900.
	if(y<1900)y+1900;
	
	//Months
	n[0]="January";
	n[1]="February";
	n[2]="March";
	n[3]="April";
	n[4]="May";
	n[5]="June";
	n[6]="July";
	n[7]="August";
	n[8]="September";
	n[9]="October";
	n[10]="November";
	n[11]="December";
	
	//1st 2nd 3th 4th... 11th 12th 13th 14th... 21st 22nd 23rd 24th...
	if (b%10 === 1 && b%100 !== 11 ) b = b+"st";
	else if (b%10 === 2 && b%100 !== 12 ) b = b+"nd";
	else if (b%10 === 3 && b%100 !== 13 ) b = b+"rd";
	else b = b+"th";
	document.getElementById('dateNow_clock').innerHTML = h +":"+ m +":"+ s;
	document.getElementById('dateNow_dayMonth').innerHTML = n[_.getMonth()] +" "+ b;
	document.getElementById('dateNow_year').innerHTML = y;
}
//call function on load and repeat every 1000 ms
uT();
setInterval(uT, 1000);