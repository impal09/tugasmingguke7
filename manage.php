<?php require_once("cart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TOKO SPO3</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="container">

		<div id="header">
			<h1>SPO3 Online</h1>
			<span>Kelompok IMPAL09</span>  
		</div>

		<div id="menu">
			<a href="index.php">Home</a>
			<a class="selected" href="manage.php">Manage</a>
			<a href="testimonial.php">Testimonial</a>
		</div>

		<div id="sidebar">
			<div class="title">&raquo; Keranjang Belanja</div>
			<div class="body">
				<?php cart(); ?>
			</div>

			<div class="title">&raquo; Tentang</div>
			<div class="body">Body</div>
		</div>

		<div id="content">
			<div class="title">&raquo; Manage Produk</div>
			Manage
		</div>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy; 2013 TUTORIALWEB.NET<br>Thanks to phpacademy.org
		</div>

	</div>

</body>
</html>