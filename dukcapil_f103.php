<?php
ob_start();
?>

<?php
include "koneksi.php";

//$penduduk_detail_id = $_GET['penduduk_detail_id'];
//print $penduduk_detail_id;

$query = "
SELECT *
-- ,
-- tanggal(tanggal_lahir) as tanggal_lahir_cetak,
-- tanggal(tanggal) as tanggal_cetak
FROM m_penduduk_detail as a
-- LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN t_f101 c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
-- WHERE a.penduduk_detail_id = $penduduk_detail_id  "; 
//print $query;

//$tampil = mysqli_query($query, $koneksi) or die ("Gagal Query".mysql_error());

//$hasil = mysqli_fetch_array($tampil);
//echo $hasil['nama_lengkap'];

?>


<html>
<head>
<link rel="STYLESHEET" href="cetak.css" type="text/css" />
</head>

<body>



<div id="body">

<div id="section_header">
</div>

<table style="width: 100%;" class="header" border="0">  
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="69%">&nbsp;</td>
    <td width="13%"> <div align="center">
      <table width="100%"  border="1">
        <tr>
          <td bordercolor="#000000"><div align="center"><strong>F-1.03</strong></div></td>
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
<td><p align="center" class="style1">SURAT KUASA PENGISIAN BIODATA PENDUDUK<br>
  WARGA NEGARA INDONESIA  </p>
  </td>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
<td bordercolor="#000000"> 
  <blockquote>
    <p align="left"> Yang bertanda tangan di bawah ini : <br>
    </p>
  </blockquote></td>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
  <td width="23%" bordercolor="#000000">Nama Lengkap</td>
  <td width="1%" bordercolor="#000000">:</td>
  <td width="76%" bordercolor="#000000"><?php echo $hasil['nama_lengkap']; ?></td>
<tr>
  <td bordercolor="#000000">Tempat/tgl lahir/usia</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php echo $hasil['tempat_lahir']; ?>/<?php echo $hasil['tanggal_lahir_cetak'] ;  ?>/<?php echo $hasil['usia_pemberi_kuasa']; ?></td>
<tr>
  <td bordercolor="#000000">Pekerjaan</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php echo $hasil['pekerjaan']; ?></td>
<tr>
  <td bordercolor="#000000">Alamat</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php echo $hasil['alamat']; ?></td>
<tr>
  <td height="55" colspan="3" bordercolor="#000000">Memberikan kuasa kepada :</td>
  <tr>
  <?php
/* $query2 = "
SELECT b.* ,
tanggal(b.tanggal_lahir) as tanggal_lahir_cetak
FROM t_dukcapil_f103 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_diberi_kuasa = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' "; */

//print  $hasil ; 
//$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

$hasil2 = mysql_fetch_array($tampil2);
?>

  <td bordercolor="#000000">Nama Lengkap</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_diberi_kuasa'] ; } ?></td>
<tr>
  <td bordercolor="#000000">Tempat/tgl lahir/usia </td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tempat_lahir']; }  else {echo $hasil['tempat_lahir_diberi_kuasa'] ; } ?>/
    <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tanggal_lahir_cetak']; }  else {echo $hasil['tanggal_lahir_diberi_kuasa'] ; } ?>/    <?php echo $hasil['usia_diberi_kuasa']; ?></td>
<tr>
  <td bordercolor="#000000">Pekerjaan</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['pekerjaan_diberi_kuasa'] ; } ?></td>
<tr>
  <td bordercolor="#000000">Alamat</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['alamat_diberi_kuasa'] ; } ?></td>
</table>
<p>&nbsp;</p>

<table style="width: 100%;" class="header" border=0>
<tr>
  <td bordercolor="#000000">Untuk mengisi biodata sesuai keterangan yang saya berikan seperti keadaan yang sebenarnya dikarenakan kondisi saya dalam keadaan sakit/buta huruf/lainnya*). </td>
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
    <td width="46%" bordercolor="#000000"><p align="center">Yang diberi kuasa,</p>
      <p><br>
        <br>
        <br>
      </p>
      <p align="center">(
        <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_diberi_kuasa'] ; } ?>)<br>
      </p></td>
    <td width="17%" bordercolor="#000000">&nbsp;</td>
    <td width="37%" bordercolor="#000000"><div align="center"><?php echo $hasil['desa']; ?>, <?php echo $hasil['tanggal_cetak']; ?><br>
      Yang memberi kuasa, </div>
      <table width="47" border="0">
          <tr>
            <td width="37"><p class="kotak">materai<br>
              Rp.6.000</p>          </td>
          </tr>
      </table>
        <p align="center">(<?php echo $hasil['nama_lengkap']; ?>)<br>
  </p>    </td></tr>
</table>
<p>*) coret yang tidak sesuai 
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