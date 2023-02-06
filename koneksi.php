<?php 
$koneksi = new mysqli ('103.100.27.56','root','dr.soon23','simdes');
if ($koneksi->connect_errno) {
	die('kesalahan saat membuat koneksi ke database. <br>'.$mysqli->error);
}	
?>

