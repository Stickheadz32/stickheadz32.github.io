<!doctype html>
<html lang="sv">
<head>
<?php include_once("html.php");
title('Start - Glad Rags');
charset();
base('./');
cdn();
description('test');
keywords('glad,rags,gladrags');
cacheControl('private;max_age=600');
canonical('./');
css('css/gladrags-bootstrap.css');
css('fonts/glyph.css');
defer('js/gladrags.js');?>
</head>
<body>
<header>
	<nav>
		<a href="" title="GladRags" class="headerLogo">
			<p>GLAD RAGS</p>
		</a>
		<!--button for responsive menu-->
		<span id="menuButton"></span>
		<span class="menuOverlay"></span>
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
				<span class="subMenuButton"></span>
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
	<div class="social-media-icons"><a href="https://www.facebook.com/GLADRAGS2" class="fb-link-icon" title="GladRags på Facebook"></a></div>
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
			</div><div class="grid-small" style="background-image:url(img/jeans_hog.jpg)">
				<div class="content">
					<div class="gridText">
						<h1>Senaste nytt</h1>
						<h2>Lyle &amp; Scott</h2>
						<a href="rea"></a>
					</div>
				</div>
			</div>
		</div>
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
			<h2>Följ Gladrags</h2>
			<p><a href="https://www.facebook.com/GLADRAGS2" target="_blank">Facebook</a></p>
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