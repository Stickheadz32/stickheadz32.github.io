<?php if(!isset($_GET['id']))header("Location: .");?>
<!doctype html>
<html lang="sv">
<head>
<?php include_once("../html.php");
title('404 - Glad Rags');
charset();
base('../');
cdn();
description('test');
keywords('glad,rags,gladrags');
cacheControl('private;max_age=600');
canonical('./');
css('css/gladrags-bootstrap.css');
css('fonts/glyph.css');
defer('js/gladrags.js');
?>
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
	</nav>
</header>
<?php
	include_once '../connect.php';
	$conn = new mysqli($hostname,$username,$password,$dbname);
	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	$conn->query("SET character_set_results = 'utf8';");
	$sql="SELECT * FROM nyheter WHERE artikel_id=".$_GET['id']." LIMIT 1;";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	if ($result->num_rows == 0){
		header('Location: ../404');
		exit();
	}
?>
<ul class="breadcrumbs">
	<li><a href="">Start</a></li>
	<li><a href="nyheter">Nyheter</a></li>
	<li class="selected"><?php echo $row['rubrik'];?></li>
</ul>
<main>
	<section>
		<div class="article">
			<?php echo '<h1>'.$row["rubrik"].'</h1><span class="published-date">'.$row["publicerad_datum"].'</span><p>'.$row["text"].'</p>';
			?>
		</div>
	</section>
	<?php $conn->close();?>
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