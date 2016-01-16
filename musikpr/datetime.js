function uT(){
var _ = new Date(),

	h = _.getHours(),
	m = _.getMinutes(),
	s = _.getSeconds(),

	y = _.getFullYear(),
	b = _.getDate(),

	/* Months */ /* IE5.5 gives warning about variable n */
	n = ["January","February","March","April","May","June","July","August","September","October","November","December"],

	k = b%10,
	l = b%100;

	/* 0:00:00 time format */
	if (m < 10) m = "0"+m;
	if (s < 10) s = "0"+s;

	/* Later browsers subtract getYear by 1900. */
	if (y < 1900) y += 1900;

	/* 1st 2nd 3th 4th... 11th 12th 13th 14th... 21st 22nd 23rd 24th... */
	if (k === 1 && l !== 11) b = b+"st";
	else if (k === 2 && l !== 12) b = b+"nd";
	else if (k === 3 && l !== 13) b = b+"rd";
	else b = b+"th";

	document.getElementById('dateNow_clock').innerHTML = h +":"+ m +":"+ s;
	document.getElementById('dateNow_dayMonth').innerHTML = n[_.getMonth()] +" "+ b;
	document.getElementById('dateNow_year').innerHTML = y;
}
/* call function on load and repeat every 1000 ms */
uT();
setInterval(uT, 1000);