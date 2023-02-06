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
LEFT OUTER JOIN l_kecamatan f ON d.kec_id = f.kec_id
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
    <td height="78"><div align="center"><span class="style5">PEMERINTAH KABUPATEN PURWOREJO<br />
  KECAMATAN </span><span class="style5">PURWOREJO</span><br />
      <span class="style6">KELURAHAN <?php echo strtoupper($hasil['desa']) ; ?></span><br />
      <span class="style3">Jl. Let. Jend. Suprapto No. 145 Telp. 324955 PURWOREJO 54112
      </span></div>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><hr color="#000000" size="3" width="100%" />
    Kode desa / Kelurahan : <?php echo $hasil['des_id']; ?></td>
  </tr></table>
      <table width="100%" border="0">
        <tr>
          <td><table width="100%" border="0">
            <tr>
              <td><div align="center"><strong><u>SURAT KETERANGAN<br />
              </u></strong>Nomor : <?php echo $hasil['nomor_surat']; ?></div></td>
            </tr>
       

</table>
            <table width="100%" border="0">
              <tr>
                <td>Yang betandatangan dibawah ini kami Kepala Desa <?php echo $hasil['desa']; ?> Kecamatan <?php echo $hasil['kec']; ?> Kabupaten Purworejo Provinsi Jawa Tengah, menerangkan bahwa : </td>
              </tr>
            </table>
            <table width="100%" border="0">
  <tr>
    <td width="26%">1. Nama </td>
    <td width="1%">:</td>
    <td width="38%"><?php echo $hasil['nama_lengkap']; ?></td>
    <td width="35%"><?php echo $hasil['jenis_kelamin']; ?></td>
  </tr>
  <tr>
    <td>2. Tempat dan tanggal lahir </td>
    <td>:</td>
    <td><?php echo $hasil['tempat_lahir']; ?>  <?php date_default_timezone_set("Asia/Jakarta"); echo date( 'd-m-Y', strtotime($hasil['tanggal_lahir'] ));  ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>3. Warganegara</td>
    <td>:</td>
    <td><?php echo $hasil['warganegara']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>4. Agama </td>
    <td>:</td>
    <td><?php echo $hasil['agama']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>5. Pekerjaan </td>
    <td>:</td>
    <td><?php echo $hasil['pekerjaan']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>6. Tempat Tinggal</td>
    <td>:</td>
    <td><?php echo $hasil['alamat']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>7. Surat Bukti Diri </td>
    <td>:</td>
    <td><?php echo $hasil['NIK']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $hasil['nomor_kk']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>8. Keperluan </td>
    <td>:</td>
    <td><?php echo $hasil['keperluan']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>9. Berlaku </td>
    <td>:</td>
    <td><?php echo $hasil['berlaku']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>10. Keterangan Lain </td>
    <td>:</td>
    <td colspan="2"><?php echo $hasil['keterangan_lain']; ?></td>
  </tr>
  <tr>
    <td colspan="4"><br>Demikian untuk menjadikan maklum bagi yang berkepentingan.</td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">Pemohon</p>
        <p align="center">&nbsp;</p>
      <p align="center"><u>(<?php echo $hasil['nama_lengkap']; ?>)</u></p></td>
    <td width="50%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....</p>
        <p align="center">Lurah Mranti </p>
        <p align="center">&nbsp;</p>
      <p align="center"><u>(..............................................)</u></p>
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