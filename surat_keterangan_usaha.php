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
LEFT OUTER JOIN t_surat_keterangan_usaha c ON a.penduduk_detail_id = c.penduduk_detail_id
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
      <span class="style3">Jl. Let. Jend. Suprapto No. 145 Telp. 324955 PURWOREJO 54112<br />
      </span><span class="style3"><br />
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
              <td><div align="center"><strong><u>SURAT KETERANGAN USAHA<br />
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
    <td width="27%">1. Nama</td>
    <td width="1%">:</td>
    <td width="72%"><?php echo $hasil['nama_lengkap']; ?></td>
    </tr>
  <tr>
    <td>2. Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $hasil['jenis_kelamin']; ?></td>
    </tr>
  <tr>
    <td>3. Tempat dan tanggal lahir </td>
    <td>:</td>
    <td><?php echo $hasil['tempat_lahir']; ?>,  <?php echo $hasil['tanggal_lahir'];  ?></td>
    </tr>
  <tr>
    <td>4. Warganegara</td>
    <td>:</td>
    <td><?php echo $hasil['warganegara']; ?></td>
    </tr>
  <tr>
    <td>5. No.KTP/NIK </td>
    <td>:</td>
    <td><?php echo $hasil['NIK']; ?></td>
    </tr>
  <tr>
    <td>6. Pekerjaan </td>
    <td>:</td>
    <td><?php echo $hasil['pekerjaan']; ?></td>
    </tr>
  <tr>
    <td>7. Alamat </td>
    <td>:</td>
    <td><?php echo $hasil['alamat']; ?></td>
    </tr>
  
  <tr>
    <td colspan="3"><br>Berdasarkan Surat Keterangan dari Ketua Rukun Warga <?php echo $hasil['rw']; ?> Nomor <?php echo $hasil['nomor_surat_rw']; ?> Tanggal <?php echo $hasil['tanggal_surat_rw']; ?>, bahwa yang bersangkutan betul warga desa <?php echo $hasil['desa']; ?> dan menurut pengakuan yang bersangkutan mempunyai usaha <?php echo $hasil['jenis_usaha']; ?>.<br />
      Surat Keterangan ini diperlukan untuk <?php echo $hasil['keperluan']; ?>.<br />
      Demikian Surat Keterangan ini kami buat atas permintaan yang bersangkutan dan dapat dipergunakan sebagaimana mestinya. </td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">&nbsp;</p>
        </td>
    <td width="50%" bordercolor="#000000"><p align="center"><?php echo $hasil['desa']; ?>, ....................20....<br />
      Lurah <?php echo $hasil['desa']; ?> </p>
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