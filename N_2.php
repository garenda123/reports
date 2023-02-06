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
LEFT OUTER JOIN model_n2 c ON a.penduduk_detail_id = c.penduduk_detail_id
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
.style2 {font-size: 18px}
-->
</style>
</head>

<body>



<div id="body">

<div id="section_header">
</div>

<table style="width: 100%;" class="header" border="0">  
  
  <tr>
    <td><p align="right">Lampiran PMA : No. 11 Tahun 2007<br>
    -Pasal 5 ayat (2)</p></td>
  </tr>
  
  <tr>
    <td width="15%"> <div align="center">
      <table width="100%"  border="0">
        <tr>
          <td bordercolor="#000000"><div align="right"><strong>Model N - 2 </strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

<?php
	for ($i=1; $i<=2;$i++)
	{
?>
</table>

<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="34%" bordercolor="#000000">KANTOR DESA/KELURAHAN</td>
    <td width="1%" bordercolor="#000000">:</td>
    <td width="65%" bordercolor="#000000"><?php echo $hasil['desa']; ?></td>
  <tr>
    <td bordercolor="#000000">KECAMATAN</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000"><?php echo $hasil['kec']; ?></td>
  <tr>
    <td bordercolor="#000000">KABUPATEN/KOTA</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000">Purworejo</td>
</table>

<table border=0 class="header" style="width: 100%;">
    <tr>
<td><p align="center"><span class="style1"><u>SURAT KETERANGAN UNTUK NIKAH<br>
</u></span>Nomor : <?php echo $hasil['nomor_surat']; ?> </p>
  </td>
<tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa :</td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td>I.</td>
    <td>1. Nama Lengkap dan Alias</td>
    <td>:</td>
    <td><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="33%">2. Tempat dan Tanggal Lahir </td>
    <td width="1%">:</td>
    <td width="63%"><?php echo $hasil['tempat_lahir']; ?>, <?php echo $hasil['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td><?php echo $hasil['warganegara']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. Agama</td>
    <td>:</td>
    <td><?php echo $hasil['agama']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php echo $hasil['pekerjaan']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="33%">6. Tempat Tinggal </td>
    <td width="1%">:</td>
    <td colspan="2"><?php echo $hasil['alamat']; ?></td>
    <td width="3%">RT:</td>
    <td width="8%"><?php echo $hasil['rt']; ?></td>
    <td width="3%">RW:</td>
    <td width="19%"><?php echo $hasil['rw']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%">adalah benar anak kandung dari pernikahan seorang pria : </td>
  </tr>
</table>
<?php
$query2 = "
SELECT b.* 
FROM model_n2 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_ayah = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id'" ;
//print  $hasil ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

$hasil2 = mysql_fetch_array($tampil2);
?>

<table width="100%" border="0">
  <tr>
    <td>II.</td>
    <td>1. Nama Lengkap dan Alias</td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="33%">2. Tempat dan Tanggal Lahir </td>
    <td width="1%">:</td>
    <td width="63%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tempat_lahir']; }  else {echo $hasil['tempat_lahir_ayah'] ; } ?>, 
    <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tanggal_lahir']; }  else {echo $hasil['tanggal_lahir_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td><?php echo $hasil['warganegara']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. Agama</td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['agama']; }  else {echo $hasil['agama_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['pekerjaan_ayah'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="33%">6. Tempat Tinggal </td>
    <td width="1%">:</td>
    <td colspan="2"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['alamat_ayah'] ; } ?></td>
    <td width="3%">RT:</td>
    <td width="8%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['rt_ayah'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="19%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['rw_ayah'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%">dengan seorang wanita : </td>
  </tr>
</table>
<?php
$query3 = "
SELECT b.* 
FROM model_n2 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_ibu = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil3 = mysql_query($query3, $koneksi) or die ("Gagal Query".mysql_error());

$hasil3 = mysql_fetch_array($tampil3);
?>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>1. Nama Lengkap dan Alias</td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['nama_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="33%">2. Tempat dan Tanggal Lahir </td>
    <td width="1%">:</td>
    <td width="63%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tempat_lahir']; }  else {echo $hasil['tempat_lahir_ibu'] ; } ?>, 
    <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tanggal_lahir']; }  else {echo $hasil['tanggal_lahir_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td><?php echo $hasil['warganegara']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. Agama</td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['agama']; }  else {echo $hasil['agama_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['pekerjaan']; }  else {echo $hasil['pekerjaan_ibu'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="33%">6. Tempat Tinggal </td>
    <td width="1%">:</td>
    <td colspan="2"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['alamat_ibu'] ; } ?></td>
    <td width="3%">RT:</td>
    <td width="8%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rt']; }  else {echo $hasil['rt_ibu'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="19%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rw']; }  else {echo $hasil['rw_ibu'] ; } ?></td>
  </tr>
</table>
Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sepenuhnya.
<table width="100%"  border="0">
  <tr>
    <td width="64%" bordercolor="#000000">&nbsp;</td>
    <td width="36%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
      <p align="center">Kepala Desa/Lurah   </p>
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