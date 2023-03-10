<?php session_start(); ?> 


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE" /> -->
		<title>SAV</title>
		<link rel='stylesheet' type='text/css' href='../style/template.css'>
	</head>
	<body>
		<header>
      <img src="../images/Menuiz Man.png">
			<nav>
				<ul>
					<li><a href="../index.php">Login</a></li>
					<li><a href="expedition.php">Expedition</a></li>
					<li><a href="diagnostic.php">Diagnostic</a></li>
					<li><a href="finalises.php">Finalises</a></li>
				</ul>
			</nav>
		</header>
      <body>

		<?= $content?>
      
      <footer>
			<div>
				<p> © 2023 Copyright: <br /> <a href="#">Beware the data<a></p>
			</div>
		</footer>
	</body>
</html>