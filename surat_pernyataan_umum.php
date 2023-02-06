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
LEFT OUTER JOIN t_surat_pernyataan_umum c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
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
              <td><div align="center"><strong><u>SURAT PERNYATAAN <?php echo $hasil['surat_pernyataan']; ?></u></strong></div></td>
            </tr>
       

</table>
            <br />
            <br />
    <table width="100%" border="0">
  <tr>
    <td width="25%">Nama </td>
    <td width="1%">:</td>
    <td width="74%"><?php echo $hasil['nama_lengkap']; ?></td>
    </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $hasil['jenis_kelamin']; ?></td>
  </tr>
  <tr>
    <td>Tempat dan tanggal lahir </td>
    <td>:</td>
    <td><?php echo $hasil['tempat_lahir']; ?>/<?php echo $hasil['tanggal_lahir']; ?></td>
    </tr>
  
  <tr>
    <td>Bangsa/Agama </td>
    <td>:</td>
    <td><?php echo $hasil['warganegara']; ?>/<?php echo $hasil['agama']; ?></td>
    </tr>
  <tr>
    <td> KTP/NIK </td>
    <td>&nbsp;</td>
    <td><?php echo $hasil['NIK']; ?></td>
  </tr>
  <tr>
    <td>Pekerjaan </td>
    <td>:</td>
    <td><?php echo $hasil['pekerjaan']; ?></td>
    </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $hasil['alamat']; ?>, RT : <?php echo $hasil['rt']; ?>, RW : <?php echo $hasil['rw']; ?></td>
    </tr>
  
  <tr>
    <td colspan="3"><br />
      Menyatakan dengan sebenarnya bahwa <?php echo $hasil['menyatakan_bahwa']; ?><br />
      Dengan Surat Pernyataan ini saya buat dalam keadaan sehat jasmani dan rohani tanpa adanya unsur paksaan dari siapapun untuk keperluan <?php echo $hasil['untuk_keperluan']; ?><br>Demikian untuk menjadikan maklum bagi yang berkepentingan.</td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">Saksi-saksi :<br />
      1.
          <?php echo $hasil['nama_saksi1']; ?> (......................) <br />
    2. <?php echo $hasil['nama_saksi2']; ?> (......................) </p>
    <td width="50%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....<br />
    Yang Menyatakan </p>
        <p align="center">&nbsp;</p>
      <p align="center"><u>(<?php echo $hasil['nama_lengkap']; ?>)</u></p>
      <p align="center"><br />
      </p></td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">Nomor : ......................<br />
      Mengetahui <br />
      Ketua RW 
      <?php echo $hasil['rw']; ?></p>
      <p align="center">&nbsp;</p>
      <p align="center">(<?php echo $hasil['nama_ketua_rw']; ?>)</p></td>
    <td width="50%" bordercolor="#000000"><p align="center"><br />
      Nomor : ......................<br />
Mengetahui <br />
Ketua RT <?php echo $hasil['rt']; ?></p>
        <p align="center">&nbsp;</p>
        <p align="center">(<?php echo $hasil['nama_ketua_rt']; ?>)</p>
        <p align="center"><br />
      </p></td>
  </tr>
</table>
  <table width="100%"  border="0">
    <tr>
      <td width="50%" bordercolor="#000000"><p align="center">Nomor : ......................
        <br />
        Lurah <?php echo $hasil['desa']; ?></p>
          <p align="center">&nbsp;</p>
        <p align="center">(...................................................)</p>
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