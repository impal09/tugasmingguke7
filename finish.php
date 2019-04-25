<?php require_once("cart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini Toko Online by TUTORIALWEB.NET</title>
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
			
			<div class="title">&raquo; Tentang</div>
			<div class="body">
				SPO3 ONline.<br>
				Toko Online yang menyediakan motor dan sparepart.<br>
			</div>
		</div>

		<div id="content">
			<div class="title">&raquo; Proses Belanja Selesai</div>
			
			<?php
			if($_POST['finish']){
				session_destroy();
				echo 'Terima kasih Anda sudah berbelanja di Toko Online kami. Dan berikut ini adalah data yang perlu Anda catat.';
				echo '<p>Total biaya untuk pembelian Produk adalah '.$_POST['total'].' dan biaya bisa di kirimkan melalui Rekening Bank BCA cabang Bandung dengan nomor rekening xxxx-xxxx-xxxx atas nama Si Kancil.</p>';
				echo '<p>Dan barang akan kami kirim ke alamat di bawah ini:</p>';
				echo '<p>Nama Lengkap : '.$_POST['nama'].'<br>';
				echo 'Alamat Lengkap : '.$_POST['alamat'].'</p>';

				echo 'Terima Kasih.';
			}else{
				header("Location: index.php");
			}
			?>

		</div>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy; 2013 TUTORIALWEB.NET<br>Thanks to phpacademy.org
		</div>

	</div>

</body>
</html>