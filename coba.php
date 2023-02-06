<?php

//include "koneksi.php";

$host = "localhost"; $user = "postgres"; $pass = "zeromind"; $db = "simdes_purworejo"; 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass")    or die ("Could not connect to server\n"); 


$query = "SELECT * FROM l_cetak  where cetak_id = 1 "; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
$row = pg_fetch_row($rs) ;

/* while ($row = pg_fetch_row($rs)) {  echo "$row[0] $row[1] $row[2]\n"; $hasil = $row[2] ;} */
pg_close($con); 

//$nama = str_replace(" ", "_", strtolower($_POST['nama']));
//$alamat = $_POST['alamat'];
 

 require_once("../dompdf_config.inc.php");
 
$html = $row[2] ;
//echo $html;
//$html;
/*
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('coba5.pdf');
*/

include "sisip.php" ;
?>


