<!doctype html>
<html lang="sv">
<head>
<?php include_once("html.php");
title('Start - Glad Rags');
charset();
base('./');
cdn();
meta('description','test');
meta('keywords','glad,rags,gladrags');
canonical('./');
css('css/gladrags-bootstrap.css');
css('fonts/glyph.css');
//defer('js/gladrags.js');?>
<script defer>
	function byId(a){return document.getElementById(a);}
window.onload=function(){
	var menuButton=byId("menuButton");
	menuButton.addEventListener('click',function(){
		menuButton.className=menuButton.className==""?"expand":"";
	});
}
</script>
</head>
<body>
<header>
	<nav>
		<a href="" title="GladRags" class="headerLogo">
			<p>GLAD RAGS</p>
		</a>
		<!--button for responsive menu-->
		<a id="menuButton" href="#"></a>
		<ul>
			<li class="hasContent">
				<a href="rea" title="">Rea</a>
				<span class="subMenuButton"></span>
				<div class="headerDropMenu">
					<aside>
						<img src="" alt="">
						<p>
							
						</p>
					</aside>
					<ul>
						<li><a href="" title="">Veckans erbjudanden</a>
						</li><li><a href="" title="">Uppkommande erbjudanden</a>
						</li><li><a href="" title="">Veckans erbjudanden</a>
						</li>
					</ul>
				</div>
			</li><li>
				<a href="varumarken" title="">Varumärken</a>
			</li><li>
				<a href="nyheter" title="">Nyheter</a>
			</li><li class="hasContent">
				<a href="om-butiken" title="">Om butiken</a>
				<a href="#" class="subMenuButton"></a>
				<div class="headerDropMenu">
					<aside>
						<img src="" alt="">
						<p>
							
						</p>
					</aside>
					<ul>
						<li><a href="" title="">Om Glad Rags</a>
						</li><li><a href="" title="">Vi som jobbar</a>
						</li>
					</ul>
				</div>
			</li><li>
				<a href="kontakt" title="">Kontakt</a>
			</li>
		</ul>
	</nav>
</header>
<main>
	<section>
		<h1>Välkommen till Glad Rags!</h1>
	</section>
	<div class="fullwidth" style="background-image:url(img/ext2.jpg)">
		<div class="aside left">
			<h2>Veckans erbjudande</h2>
			<p>testsetsetsetsetset</p>
			<a href="" title="">erbjudanden</a>
		</div>
	</div>
	<section>
		<h2>Erbjudanden</h2>
		<div class="grid">
			<div class="grid-small" style="background-image:url(img/jeans_hog.jpg)">
				<!--a-tagg med class "content" gör hela objektet klickbart-->
				<div class="content">
					<div class="gridText">
						<h1><span class="big">30-70%</span> vinterrea</h1>
						<h2>Gäller alla plagg</h2>
						<a href="rea"></a>
					</div>
				</div>
			</div><div class="grid-small">
				<a href="" title="" class="content">
					<div class="logo-hovertext">
						<p>Test</p>
					</div>
				</a>
			</div>
		</div>
		<h1>Välkommen!</h1>
		<h2>Välkommen!</h2>
		<h3>Välkommen!</h3>
		<h4>Välkommen!</h4>
		<h5>Välkommen!</h5>
		<h6>Välkommen!</h6>
		<p>Välkommen!</p>
		<ol>
			<p>Test</p>
			<li>Test</li>
			<p>Test</p>
			<li>Test</li>
			<li>Test</li>
		</ol>
		<ul>
			<p>Test</p>
			<li>Test</li>
			<p>Test</p>
			<li>Test</li>
			<li>Test</li>
		</ul>
	</section>
</main>
<footer>
	<nav>
		<aside>
			<h2>Om butiken</h2>
			<p>1</p>
			<p>2</p>
			<p>3</p>
		</aside><aside>
			<h2>Få hjälp</h2>
			<p>1</p>
			<p>2</p>
			<p>3</p>
		</aside><aside>
			<h2>Kundservice</h2>
			<p>1</p>
			<p>2</p>
			<p>3</p>
		</aside><aside>
			<h2>Kontakt</h2>
			<p>XXX-XX XX XX</p>
			<p>Xxxxxxxxx 00</p>
			<p>XXX XX Katrineholm</p>
		</aside>
	</nav>
</footer>
</body>
</html>