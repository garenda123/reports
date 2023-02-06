<?php
ob_start();
?>

<?php
include "koneksi.php";
$penduduk_detail_id = $_GET['penduduk_detail_id'];
//print $penduduk_detail_id;

$query = "
SELECT *,
tanggal(tanggal) as tanggal_cetak
FROM m_penduduk_detail as a
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN t_dukcapil_f126 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_kecamatan f ON d.kec_id = f.kec_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);
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
          <td bordercolor="#000000"><div align="center"><strong>F-1.26</strong></div></td>
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
<td><p align="center"><span class="style7">PEMERINTAH KABUPATEN PURWOREJO</span><span class="style1"><br>
      <span class="style6">DINAS KEPENDUDUKAN DAN CATATAN SIPIL</span><br>
      </span><span class="style7">JLN TENTARA PELAJAR PURWOREJO</span></p>
  </td>
<tr>
</table>
<hr color="#000000" size="3" width="100%" />
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="35%" bordercolor="#000000">PROPINSI</td>
    <td width="3%" bordercolor="#000000">:</td>
    <td width="8%" bordercolor="#000000" class="kotak"><?php echo $hasil['prop_id']; ?></td>
    <td width="9%" bordercolor="#000000">&nbsp;</td>
    <td width="45%" bordercolor="#000000" class="kotak">JAWA TENGAH </td>
  <tr>
    <td bordercolor="#000000">KABUPATEN/KOTA</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['kab_id']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak">PURWOREJO</td>
  <tr>
    <td bordercolor="#000000">KECAMATAN</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['kec_id']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['kec']; ?></td>
  <tr>
    <td bordercolor="#000000">KELURAHAN/DESA</td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['desa_id']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['desa']; ?></td>
  <tr>
    <td bordercolor="#000000">DUSUN/DUKUH/KAMPUNG</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td colspan="3" bordercolor="#000000" class="kotak"><?php echo $hasil['alamat']; ?></td>
</table>
<table width="100%" border="0">
  <tr>
    <td width="100%" colspan="2"><p align="center"><span class="style1">SURAT KETERANGAN PINDAH WNI <br>
      </span><span class="style5">Antar Desa/Kelurahan Dalam Satu Kecamatan<br>
      No.</span><span class="style1">
    </span><?php echo $hasil['nomor_surat']; ?></p>    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td> DATA DAERAH ASAL </td>
  </tr>
</table>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="27%" bordercolor="#000000">1. Nomor Kartu Keluarga </td>
    <td width="73%" bordercolor="#000000" class="kotak"><?php echo $hasil['nomor_kk']; ?></td>
  <tr>
    <td bordercolor="#000000">2. Nama Kepala Keluarga </td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['nama_lengkap']; ?></td>
</table>
<table width="100%" border="0">
  <tr>
    <td>3. Alamat </td>
    <td colspan="2" class="kotak"><?php echo $hasil['alamat']; ?></td>
    <td>RT:</td>
    <td class="kotak"><?php echo $hasil['rt']; ?></td>
    <td width="3%">RW:</td>
    <td width="17%" class="kotak"><?php echo $hasil['rw']; ?></td>
  </tr>
  <tr>
    <td width="27%" rowspan="4">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5" class="kotak"><?php echo $hasil['alamat']; ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%" class="kotak"><?php echo $hasil['desa']; ?></td>
    <td width="3%">&nbsp;</td>
    <td width="14%">b. Kecamatan</td>
    <td colspan="2" class="kotak"><?php echo $hasil['kec']; ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td class="kotak">Purworejo</td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2" class="kotak">Jawa Tengah </td>
  </tr>
  <tr>
    <td>Kode Pos</td>
    <td class="kotak"><?php echo $hasil['kode_pos']; ?></td>
    <td>&nbsp;</td>
    <td>Telepon</td>
    <td colspan="2" class="kotak">:</td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td width="27%">4.NIK Pemohon</td>
    <td width="73%" class="kotak"><?php echo $hasil['NIK']; ?></td>
  </tr>
  <tr>
    <td>5.Nama Lengkap </td>
    <td class="kotak"><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
</table>
<br>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td colspan="2" bordercolor="#000000">DATA KEPINDAHAN </td>
  <tr>
    <td width="27%" bordercolor="#000000">1. Alasan Pindah </td>
    <td width="73%" bordercolor="#000000" class="kotak"><?php echo $hasil['alasan_pindah']; ?></td>
</table>
<table width="100%" border="0">
  <tr>
    <td>2. Alamat Tujuan Pindah </td>
    <td colspan="2" class="kotak"><?php echo $hasil['dusun_pindah']; ?></td>
    <td>RT:</td>
    <td class="kotak"><?php echo $hasil['rt_pindah']; ?></td>
    <td width="3%">RW:</td>
    <td width="17%" class="kotak"><?php echo $hasil['rw_pindah']; ?></td>
  </tr>
  <tr>
    <td width="27%" rowspan="4">&nbsp;</td>
    <td>Dusun/Dukuh/Kampung</td>
    <td colspan="5" class="kotak"><?php echo $hasil['dusun_pindah']; ?></td>
  </tr>
  <tr>
    <td width="19%">a. Desa/Kelurahan</td>
    <td width="17%" class="kotak">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="14%">b. Kecamatan</td>
    <td colspan="2" class="kotak"><?php echo $hasil['kec']; ?></td>
  </tr>
  <tr>
    <td>c. Kabupaten/Kota</td>
    <td class="kotak">Purworejo</td>
    <td>&nbsp;</td>
    <td>d. Provinsi</td>
    <td colspan="2" class="kotak">Jawa Tengah </td>
  </tr>
  <tr>
    <td>Kode Pos</td>
    <td class="kotak"><?php echo $hasil['kode_pos']; ?></td>
    <td>&nbsp;</td>
    <td>Telepon</td>
    <td colspan="2" class="kotak"><?php echo $hasil['telp_tujuan']; ?></td>
  </tr>
</table>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td bordercolor="#000000">3. Jenis Kepindahan</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['jenis_kepindahan']; ?></td>
    <td bordercolor="#000000"><p>&nbsp;</p></td>
  <tr>
    <td width="27%" bordercolor="#000000">4. Status KK Bagi  </td>
    <td width="22%" bordercolor="#000000" class="kotak"><?php echo $hasil['status_kk_bagi_yang_tidak_pindah']; ?></td>
    <td width="51%" bordercolor="#000000">&nbsp;</td>
  <tr>
    <td bordercolor="#000000">Yang Tidak Pindah</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000">&nbsp;</td>
  <tr>
    <td bordercolor="#000000">5. Status KK Bagi  </td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['status_kk_bagi_yang_pindah']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
  <tr>
    <td bordercolor="#000000">Yang Pindah</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000">&nbsp;</td>
</table>
<?php
$query2 = "
SELECT * 
FROM t_dukcapil_f126_detail
WHERE penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

//$hasil2 = mysql_fetch_array($tampil2);
?>
<br>6. Keluarga Yang Pindah
<table width="100%" border="1">
  <tr>
    <td width="5%"><div align="center">NO.</div></td>
    <td width="28%"><div align="center">NIK</div></td>
    <td width="26%"><div align="center">NAMA</div></td>
    <td width="32%"><div align="center">MASA BERLAKU KTP S/D</div></td>
    <td width="9%"><div align="center">SHDK*)</div></td>
  </tr>
  <?php
$nourut =0;

while($hasil2=mysql_fetch_array($tampil2))
{
 $nourut++;
  ?>
  <tr>
    <td><?php echo $nourut; ?></td>
    <td><?php echo $hasil2['nik']; ?></td>
    <td><?php echo $hasil2['nama']; ?></td>
    <td width="32%"><?php echo $hasil2['masa_berlaku_ktp']; ?></td>
    <td><?php echo $hasil2['SHDK']; ?></td>
  </tr>
   <?php } ?>
</table>
Surat Keterangan Pindah (SKP) ini berlaku sebagai pengganti KTP selama KTP baru belum diterbitkan, paling lama 30 hari kerja sejak SKP ini diterbitkan. <br>
<table width="100%"  border="0">
  
  <tr>
    <td width="60%" bordercolor="#000000">&nbsp;</td>
    <td width="40%" bordercolor="#000000"><p align="center">Purworejo, <?php echo $hasil['tanggal_cetak']; ?><br>
      Dikeluarkan Oleh :<br>
      a.n. Kepala Dinas Kependudukan dan Pencatatan Sipil<br>
      Kepala Desa/Lurah   </p>
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