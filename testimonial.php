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
			<a class="selected" href="testimonial.php">Testimonial</a>
		</div>

		<div id="sidebar">
			<div class="title">&raquo; Keranjang Belanja Anda</div>
			<div class="body">
				<?php cart(); ?>
			</div>

			<div class="title">&raquo; Tentang</div>
			<div class="body">
				SPO3 ONline.<br>
				Toko Online yang menyediakan motor dan sparepart.<br>
			</div>
		</div>

		<div id="content">
			<div class="title">&raquo; Testimonial</div>
			Tulis Testimonial Anda di bawah ini:
			<form action="" method="post">
				<p><input type="text" name="nama" placeholder="Nama Lengkap" required></p>
				<p><input type="text" name="mail" placeholder="Email Valid" required></p>
				<p><textarea name="pesan" rows="5" cols="40" placeholder="Testimonial Anda" required></textarea></p>
				<p><input type="submit" name="submit" value="Proses"></p>
			</form>
		</div>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy; 2013 TUTORIALWEB.NET<br>Thanks to phpacademy.org
		</div>

	</div>

</body>
</html>