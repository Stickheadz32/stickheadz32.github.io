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
        ÅR
        <?php for($w=0;$w<4;$w++){
        	echo '<div class="calWeek">';
        	for($d=0;$d<7;$d++)echo '<div class="calDay"></div>';
        	echo '</div>';}
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