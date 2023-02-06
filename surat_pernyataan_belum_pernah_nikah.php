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
LEFT OUTER JOIN t_surat_keterangan_umum c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_pejabat_penandatangan e ON a.pejabat_penandatangan_id = e.pejabat_penandatangan_id
LEFT OUTER JOIN l_pekerjaan f ON b.pekerjaan = f.pekerjaan
WHERE a.penduduk_detail_id = '$penduduk_detail_id' "; 
//print $query;

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);
//echo $hasil['nama_lengkap'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {font-size: 14px}
.style5 {font-size: 16px}
.style6 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td><div align="center"><strong><u>SURAT </u><u> PERNYATAAN BELUM PERNAH NIKAH</u></strong></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="28%">1. Nama</td>
    <td width="1%">:</td>
    <td width="71%"><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td>2. Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $hasil['jenis_kelamin']; ?></td>
  </tr>
  <tr>
    <td>2. Tempat dan tanggal lahir </td>
    <td>:</td>
    <td><?php echo $hasil['tempat_lahir']; ?>  <?php date_default_timezone_set("Asia/Jakarta"); echo date( 'd-m-Y', strtotime($hasil['tanggal_lahir'] ));  ?></td>
  </tr>
  <tr>
    <td>3. Warganegara</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>4. Agama </td>
    <td>:</td>
    <td><?php echo $hasil['agama']; ?></td>
  </tr>
  <tr>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php echo $hasil['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>6. Tempat Tinggal</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="3"><p>Menyatakan dengan dengan sebenar-benarnya bahwa saya sampai saat ini belum pernah menikah dengan siapapun baik secara Adat, Hukum Agama, maupun Hukum Negara, dan benar-benar masih perjaka (Bujang). <br />
    Demikian surat pernyaaan ini saya buat dengan sebenar-benarnya dan apabila surat pernyataan ini tidak benar, maka saya bersedia dituntut sesuai dengan Hukum dan Undang-undang yang berlaku. </p></td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">Lurah Mranti </p>
      <p align="center">&nbsp;</p>
      <p align="center">(<u><?php echo $hasil['pejabat_penandatangan']; ?></u>)</p></td>
    <td width="50%" bordercolor="#000000"><p align="center">............, ....................20....</p>
        <p align="center">Yang Menyatakan, </p>
        <p align="center">&nbsp;</p>
      <p align="center">(<u><?php echo $hasil['nama_lengkap']; ?></u>)</p>
      <p align="center"><br />
      </p></td>
  </tr>
</table>
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