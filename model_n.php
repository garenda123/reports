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
LEFT OUTER JOIN t_model_n c ON a.penduduk_detail_id = c.penduduk_detail_id
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
	font-size: xx-small;
	font-weight: bold;
}
.style3 {font-size: xx-small}

-->
</style>
</head>
<body class="style3">
<div id="body">
<br/>
</table>
<table width="100%" border="1">
  <tr>
    <td width="48%"><table width="95%" border=0 class="header" style="width: 100%;">
      <tr>
        <td bordercolor="#000000" class="style3">&nbsp;</td>
        <td bordercolor="#000000" class="style3">&nbsp;</td>
        <td bordercolor="#000000" class="style3"><p align="right">Lampiran PMA : No. 11 Tahun 2007<br>
          -Pasal 5 ayat (2)<br>
          <strong>Model N - 1</strong> </p></td>
      <tr>
        <td  bordercolor="#000000" class="style3">KANTOR DESA/KELURAHAN</td>
        <td  bordercolor="#000000" class="style3">:</td>
        <td  bordercolor="#000000" class="style3"><?php echo $hasil['desa']; ?></td>
      <tr>
        <td bordercolor="#000000" class="style3">KECAMATAN</td>
        <td bordercolor="#000000" class="style3">:</td>
        <td bordercolor="#000000" class="style3"><?php echo $hasil['kec']; ?></td>
      <tr>
        <td bordercolor="#000000" class="style3">KABUPATEN/KOTA</td>
        <td bordercolor="#000000" class="style3">:</td>
        <td bordercolor="#000000" class="style3">Purworejo</td>
      </table>
      <table border=0 class="header" style="width: 100%;">
        <tr>
          <td><p align="center"><span class="style1"><u>SURAT KETERANGAN UNTUK NIKAH<br>
          </u></span>Nomor :<?php echo $hasil['nomor_surat']; ?></p></td>
        <tr>
      </table>
      <table  border="0">
        <tr>
          <td class="style3">Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa :</td>
        </tr>
      </table>
      <table  border="0">
        <tr>
          <td class="style3">1. Nama Lengkap dan Alias</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['nama_lengkap']; ?></td>
        </tr>
        <tr>
          <td class="style3">2. Jenis Kelamin</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['jenis_kelamin']; ?></td>
        </tr>
        <tr>
          <td  class="style3">3. Tempat dan Tanggal Lahir </td>
          <td  class="style3">:</td>
          <td width="66%" class="style3"><?php echo $hasil['tempat_lahir']; ?>, <?php echo $hasil['tanggal_lahir']; ?></td>
        </tr>
        <tr>
          <td class="style3">4. Warganegara </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
        </tr>
        <tr>
          <td class="style3">5. Agama</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['agama']; ?></td>
        </tr>
        <tr>
          <td class="style3">6. Pekerjaan </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['pekerjaan']; ?></td>
        </tr>
        <tr>
          <td class="style3">7. Tempat Tinggal </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['alamat']; ?></td>
        </tr>
        <tr>
          <td class="style3">8. BIn/Binti </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['nama_ayah']; ?></td>
        </tr>
        <tr>
          <td class="style3">9. Status Perkawinan</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_status_perkawinan']; ?></td>
        </tr>
        <tr>
          <td class="style3"><blockquote>Keterangan</blockquote></td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_keterangan']; ?></td>
        </tr>
        <tr>
          <td class="style3">10. Nama Istri/Suami Terdahulu </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_nama_istri_suami_terdahulu']; ?></td>
        </tr>
      </table>
      <p><br>
        Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sepenuhnya.</p>
      <p>&nbsp;</p>
      <p>&nbsp; </p>
      <table   border="0">
        <tr>
          <td width="60%" bordercolor="#000000" class="style3">&nbsp;</td>
          <td width="40%" bordercolor="#000000" class="style3"><p align="center"><?php echo $hasil['desa']; ?>,  ....................20....</p>
              <p align="center">Kepala Desa/Lurah </p>
            <p align="center">&nbsp;</p>
            <p align="center"><u>(...........................................)</u><br>
            </p></td>
        </tr>
      </table></td>
    <td width="4%">&nbsp;</td>
    <td width="48%">
<table border="0" class="header" style="width: 100%;">
  <tr>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="style3"><div align="right">Lampiran PMA : No. 11 Tahun 2007<br />
      -Pasal 5 ayat (2)<br />
      <strong>Model N - 2 </strong></div></td>
  </tr>
  <tr>
    <td  bordercolor="#000000" class="style3">KANTOR DESA/KELURAHAN</td>
    <td  bordercolor="#000000">:</td>
    <td  bordercolor="#000000" class="style3"><?php echo $hasil['desa']; ?></td>
  </tr>
  <tr>
    <td bordercolor="#000000" class="style3">KECAMATAN</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="style3"><?php echo $hasil['kec']; ?></td>
  </tr>
  <tr>
    <td bordercolor="#000000" class="style3">KABUPATEN/KOTA</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="style3">Purworejo</td>
  </tr>
</table>
<table border="0" class="header" >
  <tr>
    <td><p align="center"><span class="style1"><u>SURAT KETERANGAN UNTUK NIKAH<br />
    </u></span>Nomor : <?php echo $hasil['nomor_surat']; ?> </p></td>
  </tr>
  <tr> </tr>
</table>
<table  border="0">
  <tr>
    <td>Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa :</td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td>I.</td>
    <td>1. Nama Lengkap dan Alias</td>
    <td>:</td>
    <td><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >2. Tempat dan Tanggal Lahir </td>
    <td >:</td>
    <td ><?php echo $hasil['tempat_lahir']; ?>, <?php echo $hasil['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td><?php echo $hasil['N1_warganegara']; ?></td>
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
<table  border="0">
  <tr>
    <td >&nbsp;</td>
    <td>6. Tempat Tinggal </td>
    <td >:</td>
    <td colspan="2"><?php echo $hasil['alamat']; ?></td>
    <td>RT:</td>
    <td><?php echo $hasil['rt']; ?></td>
    <td>RW:</td>
    <td><?php echo $hasil['rw']; ?></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td>&nbsp;</td>
    <td >adalah benar anak kandung dari pernikahan seorang pria : </td>
  </tr>
</table>
<?php
$query2 = "
SELECT b.* 
FROM t_model_n as a
LEFT OUTER JOIN m_penduduk b ON a.N2_nik_ayah = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id'" ;
//print  $hasil ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

$hasil2 = mysql_fetch_array($tampil2);
?>
<table  border="0">
  <tr>
    <td>II.</td>
    <td>1. Nama Lengkap dan Alias</td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['N2_nama_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td >2. Tempat dan Tanggal Lahir </td>
    <td >:</td>
    <td width="63%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tempat_lahir']; }  else {echo $hasil['N2_tempat_lahir_ayah'] ; } ?>
      ,
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tanggal_lahir']; }  else {echo $hasil['N2_tanggal_lahir_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td><?php echo $hasil['N1_warganegara']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. Agama</td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['agama']; }  else {echo $hasil['N2_agama_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['N2_pekerjaan_ayah'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td >&nbsp;</td>
    <td >6. Tempat Tinggal </td>
    <td >:</td>
    <td colspan="2"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['N2_alamat_ayah'] ; } ?></td>
    <td >RT:</td>
    <td ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['N2_rt_ayah'] ; } ?></td>
    <td >RW:</td>
    <td ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['N2_rw_ayah'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td >&nbsp;</td>
    <td >dengan seorang wanita : </td>
  </tr>
</table>
<?php
$query3 = "
SELECT b.* 
FROM t_model_n as a
LEFT OUTER JOIN m_penduduk b ON a.N2_nik_ibu = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil3 = mysql_query($query3, $koneksi) or die ("Gagal Query".mysql_error());

$hasil3 = mysql_fetch_array($tampil3);
?>
<table  border="0">
  <tr>
    <td>&nbsp;</td>
    <td>1. Nama Lengkap dan Alias</td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['N2_nama_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td >2. Tempat dan Tanggal Lahir </td>
    <td >:</td>
    <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tempat_lahir']; }  else {echo $hasil['N2_tempat_lahir_ibu'] ; } ?>
      ,
      <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tanggal_lahir']; }  else {echo $hasil['N2_tanggal_lahir_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3. Warganegara </td>
    <td>:</td>
    <td><?php echo $hasil['N1_warganegara']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4. Agama</td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['agama']; }  else {echo $hasil['N2_agama_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['pekerjaan']; }  else {echo $hasil['N2_pekerjaan_ibu'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td >&nbsp;</td>
    <td >6. Tempat Tinggal </td>
    <td >:</td>
    <td colspan="2"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['N2_alamat_ibu'] ; } ?></td>
    <td >RT:</td>
    <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rt']; }  else {echo $hasil['N2_rt_ibu'] ; } ?></td>
    <td >RW:</td>
    <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rw']; }  else {echo $hasil['N2_rw_ibu'] ; } ?></td>
  </tr>
</table>
Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sepenuhnya.
<table   border="0">
  <tr>
    <td width="64%" bordercolor="#000000">&nbsp;</td>
    <td width="36%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
        <p align="center">Kepala Desa/Lurah </p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(...........................................)</u><br />
      </p></td>
  </tr>
</table>
</td>
</tr>
</table>

</td>
</table>
      <table width="100%" border="1">
        <tr>
          <td width="48%"><table border=0 class="header" style="width: 100%;">
            <tr>
              <td  bordercolor="#000000">&nbsp;</td>
              <td  bordercolor="#000000">&nbsp;</td>
              <td  bordercolor="#000000" class="style3"><div align="right">Lampiran PMA : No. 11 Tahun 2007<br>
                -Pasal 5 ayat (2)<br>
                <strong>Model N - 3 </strong></div></td>
            <tr>
              <td  bordercolor="#000000" class="style3">KANTOR DESA/KELURAHAN</td>
              <td  bordercolor="#000000">:</td>
              <td  bordercolor="#000000" class="style3"><?php echo $hasil['desa']; ?></td>
            <tr>
              <td bordercolor="#000000" class="style3">KECAMATAN</td>
              <td bordercolor="#000000">:</td>
              <td bordercolor="#000000" class="style3"><?php echo $hasil['kec']; ?></td>
            <tr>
              <td bordercolor="#000000" class="style3">KABUPATEN/KOTA</td>
              <td bordercolor="#000000">:</td>
              <td bordercolor="#000000" class="style3">Purworejo</td>
            </table>
            <table border=0 class="header" style="width: 100%;">
              <tr>
                <td><p align="center"><span class="style1"><u>SURAT PERSETUJUAN MEMPELAI<br>
                </u></span>Nomor : <?php echo $hasil['nomor_surat']; ?></p></td>
              <tr>
            </table>
            <table  border="0">
              <tr>
                <td class="style3">Yang bertanda tangan dibawah ini  :</td>
              </tr>
            </table>
            <?php
$query4 = "
SELECT b.* 
FROM t_model_n as a
LEFT OUTER JOIN m_penduduk b ON a.N3_nik_calon_suami_istri = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil4 = mysql_query($query4, $koneksi) or die ("Gagal Query".mysql_error());

$hasil4 = mysql_fetch_array($tampil4);
?>
            <table  border="0">
              <tr>
                <td class="style3">I.</td>
                <td class="style3">Calon Suami </td>
                <td class="style3">&nbsp;</td>
                <td class="style3">&nbsp;</td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">1. Nama Lengkap dan Alias</td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['nama_lengkap']; }  else {echo $hasil['N3_nama_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">2. Bin</td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['nama_ayah']; }  else {echo $hasil['N3_nama_ayah_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3" >&nbsp;</td>
                <td width="31%" class="style3">3. Tempat dan Tanggal Lahir </td>
                <td class="style3" >:</td>
                <td class="style3" ><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['tempat_lahir']; }  else {echo $hasil['N3_tempat_lahir_calon'] ; } ?>
                  ,
                  <?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['tanggal_lahir']; }  else {echo $hasil['N3_tanggal_lahir_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">4. Warganegara </td>
                <td class="style3">:</td>
                <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">5. Agama</td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['agama']; }  else {echo $hasil['N3_agama_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">6. Pekerjaan </td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['pekerjaan']; }  else {echo $hasil['N3_pekerjaan_calon'] ; } ?></td>
              </tr>
            </table>
            <table  border="0">
              <tr>
                <td class="style3" >&nbsp;</td>
                <td width="31%" class="style3">7. Tempat Tinggal </td>
                <td class="style3" >:</td>
                <td colspan="2" class="style3"><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['alamat']; }  else {echo $hasil['N3_alamat_calon'] ; } ?></td>
                <td class="style3" >RT:</td>
                <td class="style3" ><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['rt']; }  else {echo $hasil['N3_rt_calon'] ; } ?></td>
                <td class="style3" >RW:</td>
                <td class="style3" ><?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['rw']; }  else {echo $hasil['N3_rw_calon'] ; } ?></td>
              </tr>
            </table>
            <?php
$query5 = "
SELECT b.* 
FROM t_model_n as a
LEFT OUTER JOIN m_penduduk b ON a.N3_nik_calon_suami_istri = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil5 = mysql_query($query5, $koneksi) or die ("Gagal Query".mysql_error());

$hasil5 = mysql_fetch_array($tampil5);
?>
            <table  border="0">
              <tr>
                <td class="style3">II.</td>
                <td class="style3">Calon Istri </td>
                <td class="style3">&nbsp;</td>
                <td class="style3">&nbsp;</td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">1. Nama Lengkap dan Alias</td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['nama_lengkap']; }  else {echo $hasil['N3_nama_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">2. Binti</td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['nama_ayah']; }  else {echo $hasil['N3_nama_ayah_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3" >&nbsp;</td>
                <td width="31%" class="style3">3. Tempat dan Tanggal Lahir </td>
                <td class="style3" >:</td>
                <td class="style3" ><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['tempat_lahir']; }  else {echo $hasil['N3_tempat_lahir_calon'] ; } ?>
                  ,
                  <?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['tanggal_lahir']; }  else {echo $hasil['N3_tanggal_lahir_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">4. Warganegara </td>
                <td class="style3">:</td>
                <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">5. Agama</td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['agama']; }  else {echo $hasil['N3_agama_calon'] ; } ?></td>
              </tr>
              <tr>
                <td class="style3">&nbsp;</td>
                <td class="style3">6. Pekerjaan </td>
                <td class="style3">:</td>
                <td class="style3"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['pekerjaan']; }  else {echo $hasil['N3_pekerjaan_calon'] ; } ?></td>
              </tr>
            </table>
            <table  border="0">
              <tr>
                <td class="style3" >&nbsp;</td>
                <td width="31%" class="style3">7. Tempat Tinggal </td>
                <td class="style3" >:</td>
                <td colspan="2" class="style3"><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['alamat']; }  else {echo $hasil['N3_alamat_calon'] ; } ?></td>
                <td class="style3" >RT:</td>
                <td class="style3" ><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['rt']; }  else {echo $hasil['N3_rt_calon'] ; } ?></td>
                <td class="style3" >RW:</td>
                <td class="style3" ><?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['rw']; }  else {echo $hasil['N3_rw_calon'] ; } ?></td>
              </tr>
            </table>
            <p>menyatakan   dengan   sesungguhnya   bahwa   atas   dasar   sukarela,  dengan  kesadaran  sendiri,  tanpa paksaan dari siapapun juga, untuk melangsungkan pernikahan.<br>
              Demikianlah, surat keterang
              an ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sepenuhnya.</p>
            <table width="100%"   border="0">
              <tr>
                <td width="42%" bordercolor="#000000" class="style3"><p align="center">&nbsp;</p>
                    <p align="center">I. Calon Suami </p>
                  <p align="center">&nbsp;</p>
                  <p align="center"><u>(
                    <?php if ($hasil4['nama_lengkap'] <> '' ) { echo $hasil4['nama_lengkap']; }  else {echo $hasil['N3_nama_calon'] ; } ?>
                    )</u></p></td>
                <td width="16%" bordercolor="#000000" class="style3">&nbsp;</td>
                <td width="42%" bordercolor="#000000" class="style3"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
                    <p align="center">II. Calon Istri </p>
                  <p align="center">&nbsp;</p>
                  <p align="center"><u>(
                    <?php if ($hasil5['nama_lengkap'] <> '' ) { echo $hasil5['nama_lengkap']; }  else {echo $hasil['N3_nama_calon'] ; } ?>
                    )</u><br>
                  </p></td>
              </tr>
            </table></td>
          <td width="4%">&nbsp;</td>
          <td width="48%"><table border=0 class="header" style="width: 100%;">
  <tr>
    <td  bordercolor="#000000">&nbsp;</td>
    <td  bordercolor="#000000">&nbsp;</td>
    <td  bordercolor="#000000" class="style3"><div align="right">Lampiran PMA : No. 11 Tahun 2007<br>
      -Pasal 5 ayat (2)<br>
  <strong>Model N - 4 </strong></div></td>
  <tr>
    <td  bordercolor="#000000" class="style3">KANTOR DESA/KELURAHAN</td>
    <td  bordercolor="#000000">:</td>
    <td  bordercolor="#000000" class="style3"><?php echo $hasil['desa']; ?></td>
  <tr>
    <td bordercolor="#000000" class="style3">KECAMATAN</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="style3"><?php echo $hasil['kec']; ?></td>
  <tr>
    <td bordercolor="#000000" class="style3">KABUPATEN/KOTA</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="style3">Purworejo</td>
</table>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td><p align="center"><span class="style1"><u>SURAT KETERANGAN TENTANG ORANG TUA<br>
        </u></span>Nomor : <?php echo $hasil['nomor_surat']; ?></p></td>
  <tr>
</table>
<table  border="0">
  <tr>
    <td class="style3">Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa   :</td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td class="style3">I.</td>
    <td class="style3">1. Nama Lengkap dan Alias</td>
    <td class="style3">&nbsp;</td>
    <td class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['N2_nama_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td class="style3" >&nbsp;</td>
    <td width="31%" class="style3">2. Tempat dan Tanggal Lahir </td>
    <td class="style3" >:</td>
    <td class="style3" ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tempat_lahir']; }  else {echo $hasil['N2_tempat_lahir_ayah'] ; } ?>
      ,
      <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tanggal_lahir']; }  else {echo $hasil['N2_tanggal_lahir_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">3. Warganegara </td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">4. Agama</td>
    <td class="style3">:</td>
    <td class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['agama']; }  else {echo $hasil['N2_agama_ayah'] ; } ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">5. Pekerjaan </td>
    <td class="style3">:</td>
    <td class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['N2_pekerjaan_ayah'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td  height="21" class="style3">&nbsp;</td>
    <td width="31%" class="style3">6. Tempat Tinggal </td>
    <td class="style3" >:</td>
    <td colspan="2" class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['N2_alamat_ayah'] ; } ?></td>
    <td class="style3" >RT:</td>
    <td class="style3" ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['N2_rt_ayah'] ; } ?></td>
    <td class="style3" >RW:</td>
    <td class="style3" ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['N2_rw_ayah'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td class="style3">II.</td>
    <td class="style3">1. Nama Lengkap dan Alias</td>
    <td class="style3">&nbsp;</td>
    <td class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['N2_nama_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td class="style3" >&nbsp;</td>
    <td width="31%" class="style3">2. Tempat dan Tanggal Lahir </td>
    <td class="style3" >:</td>
    <td class="style3" ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tempat_lahir']; }  else {echo $hasil['N2_tempat_lahir_ibu'] ; } ?>
      ,
      <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tanggal_lahir']; }  else {echo $hasil['N2_tanggal_lahir_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">3. Warganegara </td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">4. Agama</td>
    <td class="style3">:</td>
    <td class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['agama']; }  else {echo $hasil['N2_agama_ibu'] ; } ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">5. Pekerjaan </td>
    <td class="style3">:</td>
    <td class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['pekerjaan']; }  else {echo $hasil['N2_pekerjaan_ibu'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr class="style3">
    <td >&nbsp;</td>
    <td width="31%">6. Tempat Tinggal </td>
    <td >:</td>
    <td colspan="2"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['N2_alamat_ibu'] ; } ?></td>
    <td >RT:</td>
    <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rt']; }  else {echo $hasil['N2_rt_ibu'] ; } ?></td>
    <td >RW:</td>
    <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rw']; }  else {echo $hasil['N2_rw_ibu'] ; } ?></td>
  </tr>
</table>
<table  border="0">
  <tr class="style3">
    <td >&nbsp;</td>
    <td width="97%">adalah benar ayah kandung dan ibu kandung dari seorang  :</td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">1. Nama Lengkap dan Alias</td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td class="style3" >&nbsp;</td>
    <td width="31%" class="style3">2. Tempat dan Tanggal Lahir </td>
    <td class="style3" >:</td>
    <td class="style3" ><?php echo $hasil['tempat_lahir']; ?>, <?php echo $hasil['tanggal_lahir']; ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">3. Warganegara</td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">4. Jenis Kelamin </td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['jenis_kelamin']; ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">5. Agama</td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['agama']; ?></td>
  </tr>
  <tr>
    <td class="style3">&nbsp;</td>
    <td class="style3">6. Pekerjaan </td>
    <td class="style3">:</td>
    <td class="style3"><?php echo $hasil['pekerjaan']; ?></td>
  </tr>
</table>
<table  border="0">
  <tr class="style3">
    <td >&nbsp;</td>
    <td width="31%">7. Tempat Tinggal </td>
    <td >:</td>
    <td colspan="2"><?php echo $hasil['alamat']; ?></td>
    <td >RT:</td>
    <td ><?php echo $hasil['rt']; ?></td>
    <td >RW:</td>
    <td ><?php echo $hasil['rw']; ?></td>
  </tr>
</table>
<p><br>
  Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sepenuhnya.</p>
<table   border="0">
  <tr class="style3">
    <td width="59%" bordercolor="#000000">&nbsp;</td>
    <td width="41%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
      <p align="center">Kepala Desa/Lurah </p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(...........................................)</u><br>
      </p></td>
  </tr>
</table>
<p>&nbsp;</p></td>
        </tr>
      </table>
      <p>&nbsp;</p>

<p>&nbsp;</p>
<!-- N3 -->
</table>
<table width="100%" border="1">
  <tr>
    <td width="48%">
      <!-- N5 -->
      
<p>&nbsp;</p>
<!-- N4 -->
<p>&nbsp;</p>
<!-- N7 -->
<table  border="0">
  <tr>
    <td><p align="right">Lampiran 13 PMA : No. 2 Tahun 1990<br>
        -Pasal 6 ayat (2)-</p></td>
  </tr>
  <tr>
    <td width="15%"><div align="center">
        <table   border="0">
          <tr>
            <td bordercolor="#000000"><div align="right"><strong>Model N - 7 </strong></div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</table>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="20%" bordercolor="#000000">Lampiran</td>
    <td  bordercolor="#000000">:</td>
    <td width="5%" bordercolor="#000000"><?php echo $hasil['N7_lampiran']; ?></td>
    <td width="74%" bordercolor="#000000">Lembar</td>
  <tr>
    <td bordercolor="#000000">Perihal</td>
    <td bordercolor="#000000">:</td>
    <td colspan="2" bordercolor="#000000">Pemberitahuan Kehendak Nikah</td>
</table>
<p>&nbsp;</p>
<table  border="0">
  <tr>
    <td>Assalamu 'alaikum wr.wb.</td>
  </tr>
  <tr>
    <td><div align="center">Dengan ini kami beritahukan bahwa kami bermaksud akan melangsungkan pernikahan antara :</div></td>
  </tr>
  <tr>
    <td><div align="center">= =<?php echo $hasil['nama_lengkap']; ?> <?php echo $hasil['N7_bin_binti1']; ?> <?php echo $hasil['nama_ayah']; ?>= =</div></td>
  </tr>
  <tr>
    <td><div align="center">dengan</div></td>
  </tr>
  <tr>
    <td><div align="center">= =<?php echo $hasil['N7_nama_calon']; ?> <?php echo $hasil['N7_bin_binti2']; ?> <?php echo $hasil['N7_nama_ayah_calon']; ?>= =</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table  border="0">
  <tr>
    <td width="13%">pada hari</td>
    <td width="11%"><?php echo $hasil['N7_hari']; ?></td>
    <td width="7%">tanggal</td>
    <td width="20%"><?php echo $hasil['N7_tanggal_nikah']; ?></td>
    <td width="5%">jam </td>
    <td width="12%"><?php echo $hasil['N7_jam']; ?></td>
    <td width="32%">WIB,</td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td width="20%">dengan maskawin </td>
    <td width="20%"><?php echo $hasil['N7_mas_kawin']; ?></td>
    <td width="60%"><?php echo $hasil['N7_ket']; ?></td>
  </tr>
  <tr>
    <td>bertempat di </td>
    <td colspan="2"><?php echo $hasil['N7_tempat']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table border=0 class="header" style="width: 100%;">
  <tr>
</table>
<table  border="0">
  <tr>
    <td><div align="center">Bersama ini kami lampirkan surat-surat yang diperlukan untuk diperiksa sebagai berikut :</div></td>
  </tr>
</table>
<table  border="0">
  <tr>
    <td>1.  Surat Keterangan Untuk Nikah</td>
    <td>:</td>
    <td>model N1 </td>
  </tr>
  <tr>
    <td>2. Surat Keterangan Asal-Usul </td>
    <td>:</td>
    <td>model N2</td>
  </tr>
  <tr>
    <td width="36%">3. Surat Persetujuan Mempelai</td>
    <td >:</td>
    <td width="63%">model N3 </td>
  </tr>
  <tr>
    <td>4.  Surat Keterangan tentang Orang Tua</td>
    <td>:</td>
    <td>model N4</td>
  </tr>
  <tr>
    <td colspan="3">5. <?php echo $hasil['N7_5']; ?></td>
  </tr>
  <tr>
    <td colspan="3">6. <?php echo $hasil['N7_6']; ?></td>
  </tr>
  <tr>
    <td colspan="3">7. <?php echo $hasil['N7_7']; ?></td>
  </tr>
  <tr>
    <td colspan="3">8. <?php echo $hasil['N7_8']; ?></td>
  </tr>
</table>
<br>
<p>Kiranya dapat dihadiri dan dicatat pelaksanaannya sesuai dengan ketentuan perundang-undangan yang berlaku.</p>
<table   border="0">
  <tr>
    <td width="54%" bordercolor="#000000"><p align="center">Diterima tanggal <?php echo $hasil['N7_tanggal_terima']; ?></p>
      <p align="center">Yang Menerima</p>
      <p align="center">PPN/Pembantu PPN</p>
      <p align="center">&nbsp;</p>
      <p align="center"><?php echo $hasil['N7_nama_penerima']; ?>**) </p></td>
    <td width="54%" bordercolor="#000000">&nbsp;</td>
    <td width="46%" bordercolor="#000000"><p align="center">Wassalam, </p>
      <p align="center">Yang Memberitahukan, </p>
      <p align="center"><?php echo $hasil['N7_pemberitahu']; ?></p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(<?php echo $hasil['N7_nama_pemberitahu']; ?>)</u><br>
      </p></td>
  </tr>
</table>
<p>**) nama terang</p>
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
$dompdf->set_paper("folio", "landscape");
$dompdf->render();
//$dompdf->stream('coba.pdf');
$dompdf->stream('coba.pdf',array('Attachment' => 0));
//$dompdf->stream('my.pdf',array('Attachment'=>0));.
 
?>
