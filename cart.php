<?php
require_once("config.php");

if(isset($_GET['add'])){
	$id = mysql_real_escape_string((int)$_GET['add']);
	$qt = mysql_query("SELECT idSpr, qtySpr FROM sparepart WHERE idSpr='$id'");
	while($qt_row = mysql_fetch_assoc($qt)){
		if($qt_row['qtySpr'] != $_SESSION['cart_'.$_GET['add']] && $qt_row['qtySpr'] > 0){
			$_SESSION['cart_'.$_GET['add']]+='1';
			header("Location: index.php");
		} else {
			echo '<script language="javascript">alert("Stok produk tidak mencukupi!"); document.location="index.php";</script>';
		}
	}

}

function cart(){
	foreach($_SESSION as $name => $value){
		if($value > 0){
			if(substr($name, 0, 5) == 'cart_'){
				$id = substr($name, 5, (strlen($name)-5));
				$get = mysql_query("SELECT * FROM sparepart WHERE idSpr='$id'");
				while($get_row = mysql_fetch_assoc($get)){
					$sub = $get_row['priceSpr'] * $value;
					echo '<div style="font-size:11px; margin-bottom:-10px">&raquo; '.$get_row['nmSpr'].' @ Rp. '.$get_row['priceSpr'].' X '.$value.' = Rp. '.$sub.'</div><br>';
				}
			}
			$total += $sub;
		}
	}
	if($total == 0){
		echo 'Keranjang Belanja Kosong!';
	} else {
		echo '<div style="text-align:right; font-size:11px;"><a href="detail.php">&raquo; Detail &laquo;</a></div>';
	}
}

function produk(){
	$sql = mysql_query("SELECT * FROM sparepart ORDER BY idSpr DESC");
	if(mysql_num_rows($sql) == 0){
		echo "Tidak ada produk!";
	}else{
		while($row = mysql_fetch_assoc($sql)){
			echo '
			<div class="item">
				<b>'.$row['nmSpr'].'</b>
				<p>'.$row['ketSpr'].'</p>
				<b>Harga: '.$row['priceSpr'].' &bull; Jumlah: '.$row['qtySpr'].' &bull; <a href="index.php?add='.$row['idSpr'].'">Beli</a></b>
			</div>
			';
		}
	}
}
?>