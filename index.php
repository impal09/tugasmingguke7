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
			<a class="selected" href="index.php">Home</a>
			<a href="testimonial.php">Testimonial</a>
		</div>

		<div id="sidebar">
			<div class="title">&raquo; Keranjang Belanja Anda</div>
			<div class="body">
				<?php cart(); ?> <!-- panggil method cart yg kan menuju file cart.php -->
			</div>

			<div class="title">&raquo; Tentang</div>
			<div class="body">
				SPO3 ONline.<br>
				Toko Online yang menyediakan motor dan sparepart.<br>
			</div>
		</div>

		<div id="content">
			<div class="title">&raquo; Produk Kami</div>
			<?php produk(); ?> <!-- panggil method produk -->
		</div>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy; 2013 TUTORIALWEB.NET<br>Thanks to phpacademy.org
		</div>

	</div>

</body>
</html>