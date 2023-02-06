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
LEFT OUTER JOIN t_dukcapil_f133 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
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
          <td bordercolor="#000000"><div align="center"><strong>F-1.33</strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

<div align="center">
  <table width="100%" border="0">
    <tr>
      <td><div align="center"></div></td>
    </tr>
  </table>
</div>
<table style="width: 100%;" class="header" border=0>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
</table>

<table width="100%" border="0">
  <tr>
    <td width="100%" colspan="2"><p align="center"><span class="style1">SURAT PENGANTAR PINDAH <br><U>
      ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI </U></span><span class="style3"><br>
    No: </span> <?php echo $hasil['nomor_surat']; ?></p>    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>Yang bertanda tangan di bawah ini, menerangkan Pemohonan Pindah Penduduk WNI dengan data sebagai berikut : </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="33%">1. NIK </td>
    <td width="1%">:</td>
    <td width="66%"><?php echo $hasil['NIK']; ?></td>
  </tr>
  <tr>
    <td>2. Nama_Lengkap </td>
    <td>:</td>
    <td><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td>3. Nomor Kartu Keluarga </td>
    <td>:</td>
    <td><?php echo $hasil['nomor_kk']; ?></td>
  </tr>
  <tr>
    <td>4. Nama Kepala Keluarga </td>
    <td>:</td>
    <td><?php echo $hasil['nama_kepala_keluarga']; ?></td>
  </tr>
  <tr>
    <td>5. Alamat Sekarang </td>
    <td>:</td>
    <td><?php echo $hasil['alamat']; ?>, RT : <?php echo $hasil['rt']; ?> RW : <?php echo $hasil['rw']; ?></td>
  </tr>
  <tr>
    <td>6. Alamat Tujuan Pindah </td>
    <td>:</td>
    <td><?php echo $hasil['alamat_tujuan_pindah']; ?></td>
  </tr>
  <tr>
    <td>7. Jumlah Keluarga Yang Pindah </td>
    <td>:</td>
    <td> <?php echo $hasil['jumlah_keluarga_yang_pindah']; ?> Orang</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><br/>Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir. </td>
  </tr>
  <tr>
    <td>Demikian Surat Pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya. </td>
  </tr>
</table>
<br>
<br>
<table width="100%"  border="0">
  
  <tr>
    <td width="60%" bordercolor="#000000"><p align="center">&nbsp;</p>
    </td>
    <td width="40%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, <?php echo $hasil['tanggal_cetak']; ?><br>
      Kepala Desa/Lurah</p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(...........................................)</u></p>
      <p align="center"><br>
      </p></td>
  </tr>
</table>
<p><b>Keterangan :<br>
  Surat Pengantar ini dibawa oleh pemohon dan diarsipkan di kecamatan. <br>
</b></p>
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