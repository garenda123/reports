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
LEFT OUTER JOIN model_n7 c ON a.penduduk_detail_id = c.penduduk_detail_id
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

<table style="width: 100%;" class="header" border="0">  
  
  <tr>
    <td><p align="right">Lampiran 13 PMA : No. 2 Tahun 1990<br>
    -Pasal 6 ayat (2)-</p></td>
  </tr>
  
  <tr>
    <td width="15%"> <div align="center">
      <table width="100%"  border="0">
        <tr>
          <td bordercolor="#000000"><div align="right"><strong>Model N - 7 </strong></div></td>
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
    <td width="20%" bordercolor="#000000">Lampiran</td>
    <td width="1%" bordercolor="#000000">:</td>
    <td width="5%" bordercolor="#000000"><?php echo $hasil['lampiran']; ?></td>
    <td width="74%" bordercolor="#000000">Lembar</td>
  <tr>
    <td bordercolor="#000000">Perihal</td>
    <td bordercolor="#000000">:</td>
    <td colspan="2" bordercolor="#000000">Pemberitahuan Kehendak Nikah</td>
</table>

<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td>Assalamu 'alaikum wr.wb.</td>
  </tr>
  <tr>
    <td><div align="center">Dengan ini kami beritahukan bahwa kami bermaksud akan melangsungkan pernikahan antara :</div></td>
  </tr>
  <tr>
    <td><div align="center">= =<?php echo $hasil['nama_lengkap']; ?> <?php echo $hasil['bin_binti1']; ?> <?php echo $hasil['nama_ayah']; ?>= =</div></td>
  </tr>
  <tr>
    <td><div align="center">dengan</div></td>
  </tr>
  <tr>
    <td><div align="center">= =<?php echo $hasil['nama_calon']; ?> <?php echo $hasil['bin_binti2']; ?> <?php echo $hasil['nama_ayah_calon']; ?>= =</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="13%">pada hari</td>
    <td width="11%"><?php echo $hasil['hari']; ?></td>
    <td width="7%">tanggal</td>
    <td width="20%"><?php echo $hasil['tanggal']; ?></td>
    <td width="5%">jam </td>
    <td width="12%"><?php echo $hasil['jam']; ?></td>
    <td width="32%">WIB,</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="20%">dengan maskawin </td>
    <td width="20%"><?php echo $hasil['mas_kawin']; ?></td>
    <td width="60%"><?php echo $hasil['ket']; ?></td>
  </tr>
  <tr>
    <td>bertempat di </td>
    <td colspan="2"><?php echo $hasil['tempat']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table border=0 class="header" style="width: 100%;">
  <tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><div align="center">Bersama ini kami lampirkan surat-surat yang diperlukan untuk diperiksa sebagai berikut :</div></td>
  </tr>
</table>
<table width="100%" border="0">
  
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
    <td width="38%">3. Surat Persetujuan Mempelai</td>
    <td width="1%">:</td>
    <td width="61%">model N3 </td>
  </tr>
  <tr>
    <td>4.  Surat Keterangan tentang Orang Tua</td>
    <td>:</td>
    <td>model N4</td>
  </tr>
  <tr>
    <td colspan="3">5. <?php echo $hasil['5']; ?></td>
  </tr>
  <tr>
    <td colspan="3">6. <?php echo $hasil['6']; ?></td>
  </tr>
  <tr>
    <td colspan="3">7. <?php echo $hasil['7']; ?></td>
  </tr>
  <tr>
    <td colspan="3">8. <?php echo $hasil['8']; ?></td>
  </tr>
</table>
<br>
<p>Kiranya dapat dihadiri dan dicatat pelaksanaannya sesuai dengan ketentuan perundang-undangan yang berlaku.</p>
<table width="100%"  border="0">
  
  <tr>
    <td width="54%" bordercolor="#000000"><p align="center">Diterima tanggal <?php echo $hasil['tanggal_terima']; ?></p>
    <p align="center">Yang Menerima</p>
    <p align="center">PPN/Pembantu PPN</p>
    <p align="center">&nbsp;</p>
    <p align="center"><?php echo $hasil['nama_penerima']; ?>**) </p>
    </td>
    <td width="54%" bordercolor="#000000">&nbsp;</td>
    <td width="46%" bordercolor="#000000"><p align="center">Wassalam, </p>
      <p align="center">Yang Memberitahukan, </p>
      <p align="center"><?php echo $hasil['pemberitahu']; ?></p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(<?php echo $hasil['nama_pemberitahu']; ?>)</u><br>
    </p></td>
  </tr>
</table>
<p>**) nama terang</p>
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