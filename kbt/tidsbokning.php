<!DOCTYPE html>
<!--Structured by Stickheadz32-->
<html>
<head>
<title>Start - KBT-tjänst</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="kbt.css"/>
<link rel="stylesheet" tyoe="text/css" href="bokning.css"/>
<meta name="canonical" content="http://stickheadz32.github.io/kbt/tidsbokning/"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</head>
<body>
<header></header>
<ul class="menu">
    <li><a href=".">Start</a>
    </li><li><a href="omkbt.html">KBT/DBT</a>
    </li><li><a href="om_mig.html">Om terapeuten</a>
    </li><li id="menuSelected">Tidsbokning
    </li><li><a href="kontakt.html">Kontakt</a>
</li></ul>
<div class="content">
<h1>Tidsbokning</h1>
<p>Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. Test paragraf osv. </p>
<h2>Om KBT</h2>
<div class="bokning">
    BOKNING
    <div id="bkCalendar">
        <?php
        $conn = fopen("kbt_db.sql","r") or die("Unable to open file!");
        fclose($conn);
        /* draws a calendar */
function draw_calendar($month,$year){

    /* draw table */
    $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

    /* table headings */
    $headings = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
    $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

    /* days and weeks vars now ... */
    $running_day = date('w',mktime(0,0,0,$month,1,$year));
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();

    /* row for week one */
    $calendar.= '<tr class="calendar-row">';

    /* print "blank" days until the first of the current week */
    for($x = 0; $x < $running_day; $x++){
        $calendar.= '<td class="calendar-day-np"> </td>';
        $days_in_this_week++;
    }
    /* keep going with days.... */
    for($list_day = 1; $list_day <= $days_in_month; $list_day++){
        $calendar.= '<td class="calendar-day">';
            /* add in the day number */
            $calendar.= '<div class="day-number">'.$list_day.'</div>';

            /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
            $calendar.= str_repeat('<p> </p>',2);
            
        $calendar.= '</td>';
        if($running_day == 6){
            $calendar.= '</tr>';
            if(($day_counter+1) != $days_in_month)
                $calendar.= '<tr class="calendar-row">';
            $running_day = -1;
            $days_in_this_week = 0;
        }
        $days_in_this_week++; $running_day++; $day_counter++;
    }

    /* finish the rest of the days in the week */
    if($days_in_this_week < 8){
        for($x = 1; $x <= (8 - $days_in_this_week); $x++){
            $calendar.= '<td class="calendar-day-np"> </td>';
        }
    }

    /* final row */
    $calendar.= '</tr>';

    /* end the table */
    $calendar.= '</table>';
    
    /* all done, return result */
    return $calendar;
}

/* sample usages */
echo '<h2>Tidsbokning</h2>';
echo draw_calendar(date('d'),date('Y'));
    
    ?>
    </div>
</div>
</div>
<footer>
<p>KONTAKT - Gatagatagata 00 - 00000 ort - 000-00 00 00 - Tillgängligt 0000 - 0000</p>
</footer>    
<script src="js/kbtMain.js"></script>
</body>
</html>