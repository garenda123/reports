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
LEFT OUTER JOIN t_dukcapil_f121 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_kecamatan f ON d.kec_id = f.kec_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' "; 
//print $query;

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
          <td bordercolor="#000000"><div align="center"><strong>F-1.21</strong></div></td>
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
<td><p align="center" class="style1">FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP)</p>
  <p align="center" class="style1">WARGA NEGARA INDONESIA  </p></td>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
<td bordercolor="#000000"> 
  <p align="left" class="kotak"><strong>Perhatian :</strong><br>
1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br>
2.  Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan<br>
  </p></td>
<tr>
</table>

<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="41%" bordercolor="#000000"><strong>PEMERINTAH PROPINSI</strong></td>
    <td width="1%" bordercolor="#000000">:</td>
    <td width="2%" bordercolor="#000000" class="kotak"><?php echo $hasil['prop_id']; ?></td>
    <td width="11%" bordercolor="#000000">&nbsp;</td>
    <td width="45%" bordercolor="#000000" class="kotak">JAWA TENGAH </td>
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
  <tr>
    <td bordercolor="#000000"><em>PERMOHONAN KTP</em></td>
    <td bordercolor="#000000">:</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['Jenis_Permohonan_KTP']; ?></td>
    <td bordercolor="#000000">&nbsp;</td>
</table>
<p>&nbsp;</p>
<table border=0 class="header" style="width: 100%;">
  <tr>
    <td width="26%" bordercolor="#000000" class="kotak">1. Nama Lengkap Pemohon</td>
    <td width="2%" bordercolor="#000000">&nbsp;</td>
    <td width="72%" bordercolor="#000000" class="kotak"><?php echo $hasil['nama_lengkap']; ?></td>
  <tr>
    <td bordercolor="#000000" class="kotak">2. No. KK</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['nomor_kk']; ?></td>
  <tr>
    <td bordercolor="#000000" class="kotak">3. NIK</td>
    <td bordercolor="#000000">&nbsp;</td>
    <td bordercolor="#000000" class="kotak"><?php echo $hasil['NIK']; ?></td>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%" class="kotak">4. Alamat </td>
    <td width="2%">:</td>
    <td colspan="8" class="kotak"><?php echo $hasil['alamat']; ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="5%" class="kotak">RT :</td>
    <td width="7%" class="kotak"><?php echo $hasil['rt']; ?></td>
    <td width="5%">&nbsp;</td>
    <td width="5%" class="kotak">RW:</td>
    <td width="9%" class="kotak"><?php echo $hasil['rw']; ?></td>
    <td width="11%">&nbsp;</td>
    <td width="11%" class="kotak">Kode Pos :</td>
    <td width="19%" class="kotak"><?php echo $hasil['kode_pos']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="15%" class="kotak"><div align="center">Pas Photo(2x3) </div></td>
    <td width="16%" class="kotak"><div align="center">Cap Jempol </div></td>
    <td width="41%" class="kotak"><div align="center">Specimen Tanda Tangan </div></td>
    <td width="28%"><div align="center"><?php echo $hasil['desa']; ?>,.................20.....</div></td>
  </tr>
  <tr>
    <td rowspan="2" class="kotak">&nbsp;</td>
    <td rowspan="2" class="kotak">&nbsp;</td>
    <td height="80" class="kotak">&nbsp;</td>
    <td rowspan="2"><div align="center">
      <p>Pemohon,</p>
      <p>&nbsp;</p>
      <p>(<?php echo $hasil['nama_lengkap']; ?>)</p>
    </div></td>
  </tr>
  
  <tr>
    <td height="23">Ket: Cap Jempol/Tanda Tangan</td>
  </tr>
</table>
<table width="100%" border="0">
</table>
<br>
<table width="100%"  border="0">
  
  <tr>
    <td width="28%" bordercolor="#000000"><p align="center">&nbsp;</p>
      <p align="center">Camat <?php echo $hasil['kec']; ?></p>
      <p align="center">&nbsp;</p>
      <p align="center">(...........................................)<br>
        NIP............................</p></td>
    <td width="28%" bordercolor="#000000"><p align="left">Mengetahui :</p>
      <p align="center">Kepala Desa/Lurah <?php echo $hasil['desa']; ?></p>
      <p align="center">&nbsp;</p>
      <p align="center">(...........................................)<br>
      NIP............................</p>    </td>
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