<?php require_once("config.php"); ?>
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
			<div class="title">&raquo; Tentang</div>
			<div class="body">
				SPO3 ONline.<br>
				Toko Online yang menyediakan motor dan sparepart.<br>
			</div>
		</div>

		<div id="content">
			<div class="title">&raquo; Detail Keranjang Belanja</div>
			<table border="0" width="100%" cellspacing="0" cellpadding="3">
				<tr style="background-color: #DDD;">
					<th>No.</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga Satuan</th>
					<th>Sub Total</th>
					<th>Opsi</th>
				</tr>
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
				$no = 1;
				foreach($_SESSION as $name => $value){
					if($value > 0){
						if(substr($name, 0, 5) == 'cart_'){
							$id = substr($name, 5, (strlen($name)-5));
							$get = mysql_query('SELECT * FROM sparepart WHERE idSpr='.mysql_real_escape_string((int)$id));
							
							while($get_row = mysql_fetch_assoc($get)){
								if($no % 2 == 0){
									$warna = "#EAEAEA";
								} else {
									$warna = "#F4F4F4";
								}
								$sub = $get_row['priceSpr'] * $value;
								echo '
								<tr bgcolor="'.$warna.'">
									<td align="center">'.$no.'</td>
									<td align="center">'.$get_row['nmSpr'].'</td>
									<td align="center">'.$value.'</td>
									<td align="right">Rp. '.$get_row['priceSpr'].'</td>
									<td align="right">Rp. '.$sub.'</td>
									<td align="center">
										<a href="detail.php?remove='.$id.'">[-]</a> 
										<a href="detail.php?add='.$id.'">[+]</a> 
										<a href="detail.php?delete='.$id.'" onclick="return confirm(\'Anda Yakin?\');">[x]</a><br>
									</td>
								</tr>							
								';
								$no++;
							}
							$total += $sub;
						}
					}
				}
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Keranjang belanja masih kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="index.php"><button>&laquo; Lanjutkan Belanja</button></a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.$total.'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="index.php"><button>&laquo; Lanjutkan Belanja</button></a>
						<a href="checkout.php?total='.$total.'"><button>Checkout &raquo;</button></a>
						</div></p>
					';
				}
				?>
			
				<?php
				//PROSES TAMBAH JUMLAH PRODUK//
				if(isset($_GET['add'])){
					$qt = mysql_query('SELECT idSpr, qtySpr FROM sparepart WHERE idSpr='.mysql_real_escape_string((int)$_GET['add']));
					while($qt_row = mysql_fetch_assoc($qt)){
						if($qt_row['qtySpr'] != $_SESSION['cart_'.$_GET['add']]){
							$_SESSION['cart_'.$_GET['add']]+='1';
							header("Location: detail.php");
						} else {
							echo '<script language="javascript">alert("Stok barang tidak mencukupi"); document.location="detail.php";</script>';
						}
					}
				}
				
				//PROSES HAPUS 1 ITEM PRODUK//
				if(isset($_GET['remove'])){
					$_SESSION['cart_'.$_GET['remove']]--;
					header("Location: detail.php");
				}
				
				//PROSES HAPUS SEMUA ITEM PRODUK//
				if(isset($_GET['delete'])){
					$_SESSION['cart_'.$_GET['delete']]='0';
					header("Location: detail.php");
				}
				?>
			</table>
		</div>

		<div class="clear"></div>

		<div id="footer">
			Copyright &copy; 2013 TUTORIALWEB.NET<br>Thanks to phpacademy.org
		</div>

	</div>

</body>
</html>