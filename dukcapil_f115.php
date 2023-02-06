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
LEFT OUTER JOIN t_dukcapil_f115 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_kecamatan f ON d.kec_id = f.kec_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);

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
          <td bordercolor="#000000"><div align="center"><strong>F-1.15</strong></div></td>
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
<td><p align="center" class="style1">FORMULIR PERMOHONAN KARTU KELUARGA (KK) BARU<br>
  WARGA NEGARA INDONESIA </p>
  </td>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
<td bordercolor="#000000"> 
  <p align="left" class="kotak"><strong>Perhatian :</strong><br>
1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br>
2. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan.<br>
  </p></td>
<tr>
</table>

<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="40%" bordercolor="#000000"><strong>PEMERINTAH PROPINSI</strong></td>
    <td width="1%" bordercolor="#000000">:</td>
    <td width="2%" bordercolor="#000000" class="kotak"><?php echo $hasil['prop_id']; ?></td>
    <td width="11%" bordercolor="#000000">&nbsp;</td>
    <td width="46%" bordercolor="#000000" class="kotak">JAWA TENGAH </td>
  <tr>
    <td bordercolor="#000000"><strong>PEMERINTAH KABUPATEN/KOTA</strong></td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['kab_id']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak">PURWOREJO</td>
  <tr>
    <td bordercolor="#000000"><strong>KECAMATAN</strong></td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['kec_id']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['kec']; ?></td>
  <tr>
    <td bordercolor="#000000"><strong>KELURAHAN/DESA</strong></td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['desa_id']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['desa']; ?></td>
</table>
<p>&nbsp;</p>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="26%" bordercolor="#000000" class="kotak">1. Nama Lengkap Pemohon</td>
    <td width="2%" bordercolor="#000000">&nbsp;</td>
    <td width="72%" bordercolor="#000000" class="kotak"><?php echo $hasil['nama_lengkap']; ?></td>
  <tr>
    <td bordercolor="#000000" class="kotak">2. NIK Pemohon</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['NIK']; ?></td>
  <tr>
    <td bordercolor="#000000" class="kotak">3. No. KK Semula</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['nomor_kk']; ?></td>
</table>
<table width="100%" border="0">
  <tr>
    <td class="kotak">4. Alamat Pemohon </td>
    <td>&nbsp;</td>
    <td colspan="2" class="kotak"><?php echo $hasil['alamat']; ?></td>
    <td width="4%">&nbsp;</td>
    <td>RT:</td>
    <td class="kotak"><?php echo $hasil['rt']; ?></td>
    <td width="3%">RW:</td>
    <td width="12%" class="kotak"><?php echo $hasil['rw']; ?></td>
  </tr>
  <tr>
    <td width="26%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="19%">a. Desa/Kelurahan </td>
    <td colspan="2" class="kotak"><?php echo $hasil['desa']; ?></td>
    <td width="3%">&nbsp;</td>
    <td width="14%">b. Kecamatan</td>
    <td colspan="2" class="kotak"><?php echo $hasil['kec']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>c. Kabupaten/Kota</td>
    <td colspan="2" class="kotak">Purworejo</td>
    <td>&nbsp;</td>
    <td>d. Propinsi</td>
    <td colspan="2" class="kotak"> Jawa Tengah </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Kode Pos</td>
    <td colspan="2" class="kotak"><?php echo $hasil['kode_pos']; ?></td>
    <td>&nbsp;</td>
    <td>Telepon</td>
    <td colspan="2" class="kotak"><?php echo $hasil['telp']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%" class="kotak">5. Alasan Pemohonan</td>
    <td width="4%">&nbsp;</td>
    <td colspan="3"><?php echo $hasil['alasan_pemohonan']; ?></td>
  </tr>
  
  <tr>
    <td colspan="2" class="kotak">6. Jumlah Anggota Keluarga</td>
    <td width="6%" class="kotak"> <?php echo $hasil['jumlah_anggota_keluarga']; ?></td>
    <td width="2%">&nbsp;</td>
    <td width="62%">Orang</td>
  </tr>
</table>
<?php
$query2 = "
SELECT * 
FROM t_dukcapil_f115_detail
WHERE penduduk_detail_id = '$penduduk_detail_id' ";

//print  $query2 ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

//$hasil2 = mysql_fetch_array($tampil2);
?>
<br>
7. DAFTAR ANGGOTA KELUARGA PEMOHON (Hanya diisi anggota keluarga saja) 
<table width="100%" border="0">
  
  <tr>
    <td width="5%" bgcolor="#CCCCCC" class="kotak"><div align="center">No.</div></td>
    <td width="1%">&nbsp;</td>
    <td width="36%" bgcolor="#CCCCCC" class="kotak"><div align="center">NIK</div></td>
    <td width="1%">&nbsp;</td>
    <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Nama Lengkap </div></td>
    <td width="1%">&nbsp;</td>
    <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">SHDK*)</div></td>
  </tr>
  
  <?php
$nourut=0;

while($hasil2=mysql_fetch_array($tampil2))
{
 $nourut++;
  ?>
  <tr>
    <td class="kotak"><?php echo $nourut; ?></td>
    <td>&nbsp;</td>
    <td class="kotak"><?php echo $hasil2['nik']; ?></td>
    <td>&nbsp;</td>
    <td class="kotak"><?php echo $hasil2['nama_lengkap']; ?></td>
    <td>&nbsp;</td>
    <td class="kotak"><?php echo $hasil2['SHDK']; ?></td>
  </tr>
   <?php } ?>
</table>
<br>
<table width="100%"  border="0">
  
  <tr>
    <td colspan="2" bordercolor="#000000"><div align="center">Mengetahui : </div></td>
  </tr>
  <tr>
    <td width="27%" bordercolor="#000000"><p align="center">Camat</p>
      <p align="center">&nbsp;</p>
      <p align="center">......................................<br>
      NIP............................</p>      </td>
    <td width="28%" bordercolor="#000000"><p align="center">Kepala Desa/Lurah</p>
      <p align="center">&nbsp;</p>
      <p align="center">(............................................)<br>
      NIP............................</p>    </td>
  </tr>
</table>
<table width="100%"  border="0">
  
  <tr>
    <td width="59%" bordercolor="#000000">&nbsp;</td>
    <td width="41%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
      <p align="center">Pemohon&nbsp;</p>
        <p align="center">&nbsp;</p>
      <p align="center">(<?php echo $hasil['nama_lengkap']; ?>)<br>
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