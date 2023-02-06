
<?php
include "koneksi.php";
//print $penduduk_detail_id;
$nourut=0;
$query = "
SELECT *
FROM m_penduduk ";
//print $query;

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

//$hasil = mysql_fetch_array($tampil);
//echo $hasil['nama_lengkap'];
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
.style2 {font-size: 9px}
-->
</style>
</head>

<body>



<div id="body">

<div id="section_header">
</div>

<table style="width: 100%;" class="header" border=0>
<tr>
<td><p align="center" class="style3"><strong>DAFTAR PENDUDUK BERDASARKAN GOLONGAN DARAH<br>
KECAMATAN GRABAG<br>
DESA/KELURAHAN KRAJAN WETAN <br>
RT : </strong></p>
  </td>
<tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="5%"><div align="center"><span class="style3"><strong>NO</strong></span><br><br></div></td>
    <td width="16%"><span class="style3"><strong>NO.KK</strong></span><br><span class="style3"><strong>NIK</strong></span></td>
    <td width="28%"><span class="style3"><strong>NAMA</strong></span><br><span class="style3"><strong>ALAMAT</strong></span></td>
    <td width="10%"><span class="style3"><strong>JEN.KEL</strong></span><br><span class="style3"><strong>AGAMA</strong></span></td>
    <td width="21%"><span class="style3"><strong>TEMPAT/TGL/LHR</strong></span><br><span class="style3"><strong>SHDRT</strong></span></td>
    <td width="20%"><span class="style3"><strong>PEKERJAAN</strong></span><br><span class="style3"><strong>STAT.KAWIN</strong></span></td>
  </tr>
  
  <?php
while($hasil=mysql_fetch_array($tampil))
{
 $nourut++;
  ?>
  <tr>
    <td><div align="center"><span class="style3"><?php echo $nourut; ?></span></div></td>
    <td><span class="style3"><?php echo $hasil['nomor_kk']; ?></span><br><span class="style3"><?php echo $hasil['NIK']; ?></span></td>
    <td><span class="style3"><?php echo $hasil['nama_lengkap']; ?></span><br><span class="style3"><?php echo $hasil['alamat']; ?>, RT: <?php echo $hasil['rt']; ?>, RW: <?php echo $hasil['rw']; ?></span></td>
    <td><span class="style3"><?php echo $hasil['jenis_kelamin']; ?></span><br><span class="style3"><?php echo $hasil['agama']; ?></span></td>
    <td><span class="style3"><?php echo $hasil['tempat_lahir']; ?>/<?php echo $hasil['tanggal_lahir']; ?></span><br><span class="style3"><?php echo $hasil['status_hubungan_keluarga']; ?></span></td>
    <td><span class="style3"><?php echo $hasil['pekerjaan']; ?></span><br><span class="style3"><?php echo $hasil['status_kawin']; ?></span></td>
  </tr>
<?php } ?>
</table>

</body>
</html>
