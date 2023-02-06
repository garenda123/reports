<?php
ob_start();
?>

<?php
include "koneksi.php";
 
$penduduk_detail_id = $_GET['penduduk_detail_id'];

$query = "
SELECT * 
FROM m_penduduk_detail as a
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN t_dukcapil_f121 c ON a.penduduk_detail_id = c.penduduk_detail_id
WHERE a.penduduk_detail_id = '$penduduk_detai_id' "; 
print $query;

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$result=mysql_fetch_array($tampil);

?>


<html>
<head>
<link rel="STYLESHEET" href="css/print_static.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style2 {font-size: 18}
-->
</style>
</head>

<body>



<div id="body">

<div id="section_header">
</div>

<table style="width: 100%;" class="header" border="0">  
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="74%">&nbsp;</td>
    <td width="8%"> <div align="center">
      <table width="100%"  border="1">
        <tr>
          <td bordercolor="#000000"><div align="center"><strong>F-1.21 </strong></div></td>
        </tr>
      </table>
      </div></td>
  </tr>
</table>

<?php
	for ($i=1; $i<=2;$i++)
	{
?>
<table style="width: 100%;" class="header" border=0>
<tr>
<td><p align="center" class="style1">FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA </p></td>
<tr>
</table>

<table style="width: 100%;" class="header" border=1>
<tr>
<td bordercolor="#000000"> 
<p><strong>Perhatian :</strong><br>
  1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br>
  2 Untuk kolom pilihan, harap memberi tanda silang (X) pada kotak pilihan.      <br>
    3 Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan<br>
  </td>
<tr>
</table>

<p>&nbsp;</p>

<table style="width: 100%;" class="header" border=0>
<tr>
  <td width="22%" bordercolor="#000000"><strong>PEMERINTAH PROPINSI</strong></td>
  <td width="2%" bordercolor="#000000">:</td>
  <td width="9%" bordercolor="#000000">&nbsp;</td>
<td width="67%" bordercolor="#000000"> 
<p><br>
  </td>
<tr>
  <td bordercolor="#000000"><strong>PEMERINTAH KABUPATEN/KOTA</strong></td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">&nbsp;</td>
<tr>
  <td bordercolor="#000000"><strong>KECAMATAN</strong></td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">&nbsp;</td>
<tr>
  <td bordercolor="#000000"><strong>KELURAHAN/DESA</strong></td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">&nbsp;</td>
<tr>
  <td bordercolor="#000000"><strong>PERMOHONAN KTP </strong></td>
  <td bordercolor="#000000">:</td>
  <td colspan="2" bordercolor="#000000">
  
  <table width="118" border="1">
    <tr>
      <td width="4">&nbsp;</td>
      <td width="98">A. Baru </td>
    </tr>
  </table>

  <table width="118" border="1">
    <tr>
      <td width="4">&nbsp;</td>
      <td width="98">B. Perpanjangan </td>
    </tr>
  </table>

  <table width="118" border="1">
    <tr>
      <td width="4">&nbsp;</td>
      <td width="98">C. Penggantian </td>
    </tr>
  </table>  </td>
</table>
    
</p>
<p>&nbsp;</p>

<table style="width: 100%;" class="header" border=0>
<tr>
  <td width="22%" bordercolor="#000000">1. Nama Lengkap</td>
  <td width="2%" bordercolor="#000000">:</td>
  <td  bordercolor="#000000">&nbsp;<?php echo $result['nama_lengkap']; ?></td>
<tr>
  <td bordercolor="#000000">2. No. KK</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000">&nbsp;</td>
<tr>
  <td bordercolor="#000000">3. NIK </td>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">&nbsp;</td>
<tr>
  <td bordercolor="#000000">4. Alamat </td>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">&nbsp;</td>
<tr>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">RT. ... RW. ... Kode Pos</td>
<tr>
</table>



<p>
  <script type="text/php">

if ( isset($pdf) ) {

  $font = Font_Metrics::get_font("verdana");
  // If verdana isn't available, we'll use sans-serif.
  if (!isset($font)) { Font_Metrics::get_font("sans-serif"); }
  $size = 6;
  $color = array(0,0,0);
  $text_height = Font_Metrics::get_font_height($font, $size);

  $foot = $pdf->open_object();
  
  $w = $pdf->get_width();
  $h = $pdf->get_height();

  // Draw a line along the bottom
  $y = $h - 2 * $text_height - 24;
  $pdf->line(16, $y, $w - 16, $y, $color, 1);

  $y += $text_height;

  $text = "Job: 132-003";
  $pdf->text(16, $y, $text, $font, $size, $color);

  $pdf->close_object();
  $pdf->add_object($foot, "all");

  global $initials;
  $initials = $pdf->open_object();
  
  // Add an initals box
  $text = "Initials:";
  $width = Font_Metrics::get_text_width($text, $font, $size);
  $pdf->text($w - 16 - $width - 38, $y, $text, $font, $size, $color);
  $pdf->rectangle($w - 16 - 36, $y - 2, 36, $text_height + 4, array(0.5,0.5,0.5), 0.5);
    

  $pdf->close_object();
  $pdf->add_object($initials);
 
  // Mark the document as a duplicate
/*
  $pdf->text(110, $h - 240, "DUPLICATE", Font_Metrics::get_font("verdana", "bold"),
             110, array(0.85, 0.85, 0.85), 0, 0, -52);
*/

  $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  

  // Center the text
  $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);
  
}
</script>
</p>
<table width="100%"  border="0">
  <tr>
    <td width="46%" bordercolor="#000000"><table width="100%"  border="1" bordercolor="#000000">
      <tr>
        <td> <div align="center">Pas Photo (2 x 3) </div></td>
        <td> <div align="center">Cap Jempol </div></td>
        <td> <div align="center">Specimen Tanda Tangan </div></td>
      </tr>
      <tr>
        <td><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>      
    <div align="center"><span class="style2"></span>	Ket : Cap Jempol/Tanda Tangan</div></td>
    <td width="12%" bordercolor="#000000"><span class="style2"></span></td>
    <td width="42%" bordercolor="#000000"><p align="center" class="style2">......................,...........................<br>
        Pemohon</p>
      <p align="center" class="style2">&nbsp;</p>
      <p align="center" class="style2"><br>
          
  </p>
    <p align="center">(..................................)</p></td>
  </tr>
  <tr>
    <td bordercolor="#000000"><span class="style2"></span></td>
    <td bordercolor="#000000">Mengetahui,</td>
    <td bordercolor="#000000"><span class="style2"></span></td>
  </tr>
  <tr>
    <td bordercolor="#000000"><p>Camat..............</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>(.................................................................)<br>
  NIP.</p></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000"><p>Kepala Desa/Lurah..............</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>(.................................................................)<br>
      NIP. 
    </p>    </td>
  </tr>
</table>
<p>&nbsp;
</p>

<?php
	}
?>


</body>
</html>


<?php
$html = ob_get_clean();
 
// require_once("../dompdf_config.inc.php");
require_once("dompdf/dompdf_config.inc.php");
/* 
$html =
  '<html><body>'.
  '<h1>Halo, berikut alamat Anda : </h1>'.
  '<p>Alamat lengkap Anda adalah : </p>'.
  '</body></html>';
*/
 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
//$dompdf->stream('coba.pdf');
$dompdf->stream('coba.pdf',array('Attachment' => 0));
//$dompdf->stream('my.pdf',array('Attachment'=>0));.
 
?>