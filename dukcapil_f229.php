<?php
ob_start();
?>

<?php
include "koneksi.php";

$penduduk_detail_id = $_GET['penduduk_detail_id'];
//print $penduduk_detail_id;

$query = "
SELECT * 
FROM m_penduduk_detail as a
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN t_dukcapil_f229 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_kecamatan f ON d.kec_id = f.kec_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);
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
.style3 {font-size: small}
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
    <td width="69%">&nbsp;</td>
    <td width="13%"> <div align="center">
      <table width="100%"  border="1">
        <tr>
          <td bordercolor="#000000"><div align="center"><strong>F-2.29</strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
<td><p align="center" class="style1">&nbsp;</p>
  </td>
<tr>
</table>

<table style="width: 100%;" class="header" border=1>
<tr>
</table>

<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="42%" bordercolor="#000000">PEMERINTAH DESA/KELURAHAN</td>
    <td width="2%" bordercolor="#000000">:</td>
    <td width="56%" bordercolor="#000000"><?php echo $hasil['desa']; ?></td>
  <tr>
    <td bordercolor="#000000">KECAMATAN</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000"><?php echo $hasil['kec']; ?></td>
  <tr>
    <td bordercolor="#000000">KABUPATEN/KOTA</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000">Purworejo</td>
  <tr>
    <td bordercolor="#000000">KODE WILAYAH </td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000"><?php echo $hasil['des_id']; ?></td>
</table>
<table width="100%" border="0">
  <tr>
    <td width="100%" colspan="2"><p align="center"><span class="style1">SURAT KETERANGAN KEMATIAN<br>
      WARGA NEGARA INDONESIA<br>
      </span><span class="style3">No.<?php echo $hasil['nomor_surat']; ?></span></p>
    </td>
  </tr>
</table>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="26%" bordercolor="#000000">Nomor Kartu Keluarga </td>
    <td width="1%" bordercolor="#000000">:</td>
    <td width="73%" bordercolor="#000000"><?php echo $hasil['nomor_kk']; ?></td>
  <tr>
    <td bordercolor="#000000">Nama Kepala Keluarga </td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000"><?php echo $hasil['nama_kepala_keluarga']; ?></td>
</table>
<?php
$query7 = "
SELECT b.* 
FROM t_dukcapil_f229 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_jenazah = b.nik 
WHERE penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil7 = mysql_query($query7, $koneksi) or die ("Gagal Query".mysql_error());

$hasil7 = mysql_fetch_array($tampil7);
?>
<table width="100%" border="0">
  <tr>
    <td>JENAZAH</td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td width="26%">1. NIK </td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil7['NIK']; ?></td>
  </tr>
  <tr>
    <td>2. Nama</td>
    <td>:</td>
    <td><?php echo $hasil7['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td>3. Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $hasil7['jenis_kelamin']; ?></td>
  </tr>
  <tr>
    <td>4. Tanggal Lahir/Umur</td>
    <td>:</td>
    <td><?php echo $hasil7['tanggal_lahir']; ?> / <?php echo $hasil['umur_jenazah']; ?></td>
  </tr>
  <tr>
    <td>5. Tempat Lahir </td>
    <td>:</td>
    <td><?php echo $hasil7['tempat_lahir']; ?></td>
  </tr>
  <tr>
    <td>6. Agama </td>
    <td>:</td>
    <td><?php echo $hasil7['agama']; ?></td>
  </tr>
  <tr>
    <td>7. Pekerjaan </td>
    <td>:</td>
    <td><?php echo $hasil7['pekerjaan']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">8. Alamat </td>
    <td width="1%">:</td>
    <td colspan="2"><?php echo $hasil7['alamat']; ?></td>
    <td width="4%">RT:</td>
    <td width="15%"><?php echo $hasil7['rt']; ?></td>
    <td width="3%">RW:</td>
    <td width="22%"><?php echo $hasil7['rw']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td>9. Anak Ke </td>
    <td>:</td>
    <td><?php echo $hasil['jenazah_anak_ke']; ?></td>
  </tr>
  <tr>
    <td width="26%">10. Tanggal Kematian </td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['tanggal_kematian']; ?></td>
  </tr>
  <tr>
    <td>11. Pukul </td>
    <td>:</td>
    <td><?php echo $hasil['jam_kematian']; ?></td>
  </tr>
  <tr>
    <td>12. Sebab Kematian </td>
    <td>:</td>
    <td><?php echo $hasil['sebab_kematian']; ?></td>
  </tr>
  <tr>
    <td>13. Tempat Kematian </td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['tempat_kematian']; ?></td>
  </tr>
  <tr>
    <td>14. Yang Menerangkan </td>
    <td>:</td>
    <td><?php echo $hasil['yang_menerangkan']; ?></td>
  </tr>
</table>

  <?php
$query2 = "
SELECT b.* 
FROM t_dukcapil_f229 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_ibu = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

$hasil2 = mysql_fetch_array($tampil2);
?>

<table width="100%" border="0">
  <tr>
    <td colspan="3">IBU</td>
  </tr>
  <tr>
    <td width="26%">1. NIK </td>
    <td width="1%">:</td>
    <td width="73%"><?php if ($hasil2['NIK'] <> '' ) { echo $hasil2['NIK']; }  else {echo $hasil['nik_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td>2. Nama Lengkap </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_lengkap_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td>3. Tanggal Lahir/Umur </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tanggal_lahir']; }  else {echo $hasil['tanggal_lahir_umur_orang_tua'] ; } ?>
      /<?php echo $hasil['umur_ibu']; ?></td>
  </tr>
  <tr>
    <td>4. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['pekerjaan_orang_tua'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>5. Alamat </td>
    <td>:</td>
    <td colspan="2"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['alamat_orang_tua'] ; } ?></td>
    <td>RT:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['rt_orang_tua'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="17%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['rw_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td width="26%" rowspan="4">&nbsp;</td>
    <td width="1%" rowspan="4">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5">:
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['alamat_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%">:
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil['desa']; }  else {echo $hasil['desa_orang_tua'] ; } ?></td>
    <td width="3%">&nbsp;</td>
    <td width="14%">b. Kecamatan</td>
    <td colspan="2">;
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil['kec']; }  else {echo $hasil['kecamatan_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td>: Purworejo</td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2">: Jawa Tengah </td>
  </tr>
  <tr>
    <td>Kode Pos</td>
    <td>:
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil['kode_pos']; }  else {echo $hasil['kode_pos_orang_tua'] ; } ?></td>
    <td>&nbsp;</td>
    <td>Telepon</td>
    <td colspan="2">:
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil['telp']; }  else {echo $hasil['telp_orang_tua'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">6.Kewarganegaraan</td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['warganegara']; ?></td>
  </tr>
  <tr>
    <td>7.Kebangsaan</td>
    <td>:</td>
    <td><?php echo $hasil['kebangsaan']; ?></td>
  </tr>
  <tr>
    <td>8. Tanggal Pencatatan Pernikahan </td>
    <td>:</td>
    <td><?php echo $hasil['tanggal_pencatatan_pernikahan']; ?></td>
  </tr>
</table>
<?php
$query3 = "
SELECT b.* 
FROM t_dukcapil_f229 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_ayah = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil3 = mysql_query($query3, $koneksi) or die ("Gagal Query".mysql_error());

$hasil3 = mysql_fetch_array($tampil3);
?>
<table width="100%" border="0">
  <tr>
    <td>AYAH</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="26%">1. NIK</td>
    <td width="1%">:</td>
    <td width="73%"><?php if ($hasil3['NIK'] <> '' ) { echo $hasil3['NIK']; }  else {echo $hasil['nik_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td>2. Nama Lengkap </td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['nama_lengkap_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td>3. Tanggal Lahir/Umur </td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tanggal_lahir']; }  else {echo $hasil['tanggal_lahir_umur_orang_tua'] ; } ?>
      /<?php echo $hasil['umur_ayah']; ?></td>
  </tr>
  <tr>
    <td>4. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['pekerjaan']; }  else {echo $hasil['pekerjaan_orang_tua'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>5. Alamat </td>
    <td>:</td>
    <td colspan="2"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['alamat_orang_tua'] ; } ?></td>
    <td>RT:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rt']; }  else {echo $hasil['rt_orang_tua'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="17%"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rw']; }  else {echo $hasil['rw_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td width="26%" rowspan="4">&nbsp;</td>
    <td width="1%" rowspan="4">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5">:
      <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['alamat_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%">:
      <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil['desa']; }  else {echo $hasil['desa_orang_tua'] ; } ?></td>
    <td width="3%">&nbsp;</td>
    <td width="14%">b. Kecamatan</td>
    <td colspan="2">:
      <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil['kec']; }  else {echo $hasil['kecamatan_orang_tua'] ; } ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td>: Purworejo</td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2">: Jawa Tengah </td>
  </tr>
  <tr>
    <td>Kode Pos</td>
    <td>:
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil['kode_pos']; }  else {echo $hasil['kode_pos_orang_tua'] ; } ?></td>
    <td>&nbsp;</td>
    <td>Telepon</td>
    <td colspan="2">:
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil['telp']; }  else {echo $hasil['telp_orang_tua'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">6.Kewarganegaraan</td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['warganegara']; ?></td>
  </tr>
  <tr>
    <td>7.Kebangsaan</td>
    <td>:</td>
    <td><?php echo $hasil['kebangsaan']; ?></td>
  </tr>
</table>
<?php
$query4 = "
SELECT b.* 
FROM t_dukcapil_f229 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_pelapor = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil4 = mysql_query($query4, $koneksi) or die ("Gagal Query".mysql_error());

$hasil4 = mysql_fetch_array($tampil4);
?>
<table width="100%" border="0">
  <tr>
    <td>PELAPOR</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">1. NIK</td>
    <td width="1%">:</td>
    <td width="73%"><?php if ($hasil4['NIK'] <> '' ) { echo $hasil4['NIK']; }  else {echo $hasil['NIK_pelapor1'] ; } ?></td>
  </tr>
  <tr>
    <td>2. Nama Lengkap </td>
    <td>:</td>
    <td><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['nama_lengkap']; }  else {echo $hasil['nama_lengkap_pelapor'] ; } ?></td>
  </tr>
  <tr>
    <td>3. Umur </td>
    <td>:</td>
    <td><?php echo $hasil['umur_pelapor']; ?></td>
  </tr>
  <tr>
    <td>4. Jenis Kelamin </td>
    <td>:</td>
    <td><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['jenis_kelamin']; }  else {echo $hasil['jenis_kelamin_pelapor'] ; } ?></td>
  </tr>
  <tr>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['pekerjaan']; }  else {echo $hasil['pekerjaan_pelapor'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>6. Alamat </td>
    <td>:</td>
    <td colspan="2"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['alamat']; }  else {echo $hasil['alamat_pelapor'] ; } ?></td>
    <td>RT:</td>
    <td><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['rt']; }  else {echo $hasil['rt_pelapor'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="17%"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['rw']; }  else {echo $hasil['rw_pelapor'] ; } ?></td>
  </tr>
  <tr>
    <td width="26%" rowspan="3">&nbsp;</td>
    <td width="1%" rowspan="3">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5">:
      <?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['alamat']; }  else {echo $hasil['alamat_pelapor'] ; } ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%">:
      <?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil['desa']; }  else {echo $hasil['desa_pelapor'] ; } ?></td>
    <td width="3%">&nbsp;</td>
    <td width="14%">b. Kecamatan</td>
    <td colspan="2">:
      <?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil['kec']; }  else {echo $hasil['kecamatan_pelapor'] ; } ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td>: Purworejo </td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2">: Jawa Tengah </td>
  </tr>
</table>
<?php
$query5 = "
SELECT b.* 
FROM t_dukcapil_f229 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_saksi_1 = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil5 = mysql_query($query5, $koneksi) or die ("Gagal Query".mysql_error());

$hasil5 = mysql_fetch_array($tampil5);
?>
<table width="100%" border="0">
  <tr>
    <td>SAKSI 1</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">1. NIK</td>
    <td width="1%">:</td>
    <td width="73%"><?php if ($hasil5['NIK'] <> '' ) { echo $hasil5['NIK']; }  else {echo $hasil['NIK_saksi1'] ; } ?></td>
  </tr>
  <tr>
    <td>2. Nama Lengkap </td>
    <td>:</td>
    <td><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['nama_lengkap']; }  else {echo $hasil['nama_lengkap_saksi1'] ; } ?></td>
  </tr>
  <tr>
    <td>3. Umur </td>
    <td>:</td>
    <td><?php echo $hasil['umur_saksi1']; ?></td>
  </tr>
  <tr>
    <td>4. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['pekerjaan']; }  else {echo $hasil['pekerjaan_saksi1'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>5. Alamat </td>
    <td>:</td>
    <td colspan="2"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['alamat']; }  else {echo $hasil['alamat_saksi1'] ; } ?></td>
    <td>RT:</td>
    <td><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['rt']; }  else {echo $hasil['rt_saksi1'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="16%"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['rw']; }  else {echo $hasil['rw_saksi1'] ; } ?></td>
  </tr>
  <tr>
    <td width="26%" rowspan="3">&nbsp;</td>
    <td width="1%" rowspan="3">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5">:
      <?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['alamat']; }  else {echo $hasil['alamat_saksi1'] ; } ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%">:
      <?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil['desa']; }  else {echo $hasil['desa_saksi1'] ; } ?></td>
    <td width="3%">&nbsp;</td>
    <td width="15%">b. Kecamatan</td>
    <td colspan="2">:
      <?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil['kec']; }  else {echo $hasil['kecamatan_saksi1'] ; } ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td>: Purworejo </td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2">: Jawa Tengah </td>
  </tr>
</table>
<?php
$query6 = "
SELECT b.* 
FROM t_dukcapil_f229 as a
LEFT OUTER JOIN m_penduduk b ON a.nik_saksi_2 = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil6 = mysql_query($query6, $koneksi) or die ("Gagal Query".mysql_error());

$hasil6 = mysql_fetch_array($tampil6);
?>
<table width="100%" border="0">
  <tr>
    <td>SAKSI 2 </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">1. NIK</td>
    <td width="1%">:</td>
    <td width="73%"><?php if ($hasil6['NIK'] <> '' ) { echo $hasil6['NIK']; }  else {echo $hasil['NIK_saksi2'] ; } ?></td>
  </tr>
  <tr>
    <td>2. Nama Lengkap </td>
    <td>:</td>
    <td><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['nama_lengkap']; }  else {echo $hasil['nama_lengkap_saksi2'] ; } ?></td>
  </tr>
  <tr>
    <td>3. Umur </td>
    <td>:</td>
    <td><?php echo $hasil['umur_saksi2']; ?></td>
  </tr>
  <tr>
    <td>4. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['pekerjaan']; }  else {echo $hasil['pekerjaan_saksi2'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>5. Alamat </td>
    <td>:</td>
    <td colspan="2"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['alamat']; }  else {echo $hasil['alamat_saksi2'] ; } ?></td>
    <td>RT:</td>
    <td><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['rt']; }  else {echo $hasil['rt_saksi2'] ; } ?></td>
    <td width="3%">RW:</td>
    <td width="15%"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['rw']; }  else {echo $hasil['rw_saksi2'] ; } ?></td>
  </tr>
  <tr>
    <td width="26%" rowspan="3">&nbsp;</td>
    <td width="1%" rowspan="3">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5">:
      <?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['alamat']; }  else {echo $hasil['alamat_saksi2'] ; } ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%">:
      <?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil['desa']; }  else {echo $hasil['desa_saksi2'] ; } ?></td>
    <td width="3%">&nbsp;</td>
    <td width="16%">b. Kecamatan</td>
    <td colspan="2">:
      <?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil['kec']; }  else {echo $hasil['kecamatan_saksi2'] ; } ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td>: Purworejo </td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2">: Jawa Tengah </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%"  border="0">
  
  <tr>
    <td width="60%" bordercolor="#000000">&nbsp;</td>
    <td width="40%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
      <p align="center">Kepala Desa/Lurah   </p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(...........................................)</u><br>
      </p></td>
  </tr>
</table>
<p>&nbsp;</p>


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