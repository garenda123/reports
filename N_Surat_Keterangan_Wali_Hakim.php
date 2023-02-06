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
LEFT OUTER JOIN surat_keterangan_wali_hakim c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_kecamatan f ON d.kec_id = f.kec_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";
//print  $hasil ; 
$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);
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
-->
</style>
</head>

<body>



<div id="body">

<div id="section_header">
</div>

<?php
	for ($i=1; $i<=2;$i++)
	{
?>
</table>
<table width="100%" border="0">
  <tr>
    <td width="31%">KANTOR DESA/KELURAHAN</td>
    <td width="1%">:</td>
    <td width="68%"><?php echo $hasil['desa']; ?></td>
  </tr>
  <tr>
    <td>KECAMATAN</td>
    <td>:</td>
    <td><?php echo $hasil['kec']; ?></td>
  </tr>
  <tr>
    <td>KABUPATEN / KOTA</td>
    <td>:</td>
    <td>Purworejo</td>
  </tr>
</table>
<table style="width: 100%;" class="header" border=1>
</table>
<table border=0 class="header" style="width: 100%;">
    <tr>
<td><p align="center"><span class="style1"><u>SURAT KETERANGAN WALI  HAKIM<br>
</u></span>Nomor : <?php echo $hasil['nomor_surat']; ?></p>
  </td>
<tr>
</table>
<?php
$query2 = "
SELECT b.* 
FROM surat_keterangan_wali_hakim as a
LEFT OUTER JOIN m_penduduk b ON a.nik_calon_istri = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

$hasil2 = mysql_fetch_array($tampil2);
?>
<table width="100%" border="0">
  <tr>
    <td><p>Yang bertanda tangan di bawah ini kami Kepala Desa Gebang Kecamatan Gebang Kabupaten Purworejo Provinsi Jawa Tengah,  menerangkan bahwa :</p></td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td>&nbsp;</td>
    <td>Nama lengkap atau alias </td>
    <td>:</td>
    <td width="60%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_calon'] ; } ?></td>
  </tr>
  
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">Binti</td>
    <td width="1%">:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_ayah']; }  else {echo $hasil['nama_ayah_calon'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Umur</td>
    <td>:</td>
    <td><?php echo $hasil['umur_calon_istri']; ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Agama</td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['agama']; }  else {echo $hasil['agama_calon'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['pekerjaan_calon'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">Tempat Tinggal </td>
    <td width="1%">:</td>
    <td colspan="2"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['alamat_calon'] ; } ?></td>
    <td width="3%">RT:</td>
    <td width="7%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['rt_calon'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="17%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['rw_calon'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="44%">akan melangsungkan pernikahan besok pada hari <?php echo $hasil['hari_nikah']; ?> tanggal  <?php echo $hasil['tanggal_nikah']; ?> dengan seorang laki-laki :</td>
  </tr>
</table>
<?php
$query3 = "
SELECT b.* 
FROM surat_keterangan_wali_hakim as a
LEFT OUTER JOIN m_penduduk b ON a.nik_calon_suami = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil3 = mysql_query($query3, $koneksi) or die ("Gagal Query".mysql_error());

$hasil3 = mysql_fetch_array($tampil3);
?>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>Nama lengkap atau alias </td>
    <td>:</td>
    <td width="60%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['nama_calon'] ; } ?></td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">Bin</td>
    <td width="1%">:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_ayah']; }  else {echo $hasil['nama_ayah_calon'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Umur</td>
    <td>:</td>
    <td><?php echo $hasil['umur_calon_suami']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Agama</td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['agama']; }  else {echo $hasil['agama_calon'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['pekerjaan']; }  else {echo $hasil['pekerjaan_calon'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">Tempat Tinggal </td>
    <td width="1%">:</td>
    <td colspan="2"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['alamat_calon'] ; } ?></td>
    <td width="3%">RT:</td>
    <td width="7%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rt']; }  else {echo $hasil['rt_calon'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="17%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rw']; }  else {echo $hasil['rw_calon'] ; } ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td>Dengan wali hakim dikarenakan / disebabkan :</td>
  </tr>
  <tr>
    <td><?php echo $hasil['sebab_wali_hakim']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="96%"><?php echo $hasil['alasan_wali']; ?></td>
  </tr>
</table>
<p>Demikian Surat Keterangan ini dibuat untuk menjadikan periksa dan dapat dipergunakan seperlunya.</p>
<table width="100%"  border="0">
  
  <tr>
    <td width="42%" bordercolor="#000000"><p align="center">&nbsp;</p>
      <p align="center">Mempelai Perempuan </p>
      <p align="center">&nbsp;</p>
    <p align="center"><u>(
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_calon'] ; } ?>
      )</u></p></td>
    <td width="16%" bordercolor="#000000">&nbsp;</td>
    <td width="42%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
      <p align="center">Kepala Desa/Lurah </p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(...........................................)</u><br>
    </p></td>
  </tr>
</table>
<p>&nbsp;</p>

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