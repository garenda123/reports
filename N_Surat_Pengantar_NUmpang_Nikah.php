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
LEFT OUTER JOIN surat_pengantar_numpang_nikah c ON a.penduduk_detail_id = c.penduduk_detail_id
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
.style2 {
	font-size: 24px;
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
    <td><div align="center">PEMERINTAH KABUPATEN<br>
      PURWOREJO KECAMATAN GEBANG<br>
      <span class="style2">DESA MRANTI </span><br>
    JLN PAHLAWAN REVOLUSI NO 3 GEBANG</div></td>
  </tr>
</table>
<table style="width: 100%;" class="header" border=1>
</table>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="12%" bordercolor="#000000">Kode desa </td>
    <td width="1%" bordercolor="#000000">:</td>
    <td width="87%" bordercolor="#000000"><?php echo $hasil['des_id']; ?></td>
</table>

<table border=0 class="header" style="width: 100%;">
    <tr>
<td><p align="center"><span class="style1"><u>PENGANTAR NUMPANG NIKAH<br>
</u></span>Nomor : <?php echo $hasil['nomor_surat']; ?></p>
  </td>
<tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><p>Yang bertanda tangan di bawah ini kami Kepala Desa Mranti Kecamatan Purworejo Kabupaten Purworejo Provinsi Jawa Tengah,  menerangkan bahwa :</p></td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td>&nbsp;</td>
    <td>1. Nama</td>
    <td>:</td>
    <td width="30%"><?php echo $hasil['nama_lengkap']; ?></td>
    <td width="30%">JK : <?php echo $hasil['jenis_kelamin']; ?></td>
  </tr>
  
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">2. Tempat dan tanggal lahir </td>
    <td width="1%">:</td>
    <td colspan="2"><?php echo $hasil['tempat_lahir']; ?>, <?php echo $hasil['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td colspan="2"><?php echo $hasil['warganegara']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. Agama</td>
    <td>:</td>
    <td colspan="2"><?php echo $hasil['agama']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td colspan="2"><?php echo $hasil['pekerjaan']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">6. Tempat Tinggal </td>
    <td width="1%">:</td>
    <td colspan="2"><?php echo $hasil['alamat']; ?></td>
    <td width="3%">RT:</td>
    <td width="6%"><?php echo $hasil['rt']; ?></td>
    <td width="3%">RW:</td>
    <td width="16%"><?php echo $hasil['rw']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">7. Surat bukti diri </td>
    <td width="1%">:</td>
    <td width="60%">No. NIK. <?php echo $hasil['NIK']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>No. KK. <?php echo $hasil['nomor_kk']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>8. Keperluan </td>
    <td>:</td>
    <td>Mohon untuk numpang nikah di <?php echo $hasil['tempat_nikah']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>9. Berlaku </td>
    <td>:</td>
    <td width="18%"><?php echo $hasil['masa_berlaku']; ?></td>
    <td width="42%">s/d selesai </td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="34%">10. Keterangan lain </td>
    <td width="1%">:</td>
    <td colspan="2">Orang tersebut diatas akan melaksanakan pernikahan dengan </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="34%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td colspan="2"><?php echo $hasil['nama_calon']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>Demikian untuk menjadikan maklum bagi yang berkepentingan.</p>
<table width="100%"  border="0">
  
  <tr>
    <td width="42%" bordercolor="#000000"><p align="center">&nbsp;</p>
      <p align="center">Pemohon</p>
      <p align="center">&nbsp;</p>
    <p align="center"><u>(<?php echo $hasil['nama_lengkap']; ?>)</u></p></td>
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