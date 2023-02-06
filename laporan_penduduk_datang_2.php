<?php
ob_start();
?>

<html>
<head>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>

<style type="text/css">
<!--
.style4 {font-weight: bold}
.style5 {font-size: 24px}
-->
</style>
</head>
<body>

<?php 
	include "koneksi.php";
	$bulan=$_GET['bulan'];
	$tahun=$_GET['tahun'];	
	$nama_bulan = ambil_bulan($bulan);
	
 ?>

<table width="910" border="0">
  <tr>
    <td width="902">
	
      <div align="center" class="style1 style5"><strong>LAPORAN PENDUDUK DATANG <br>
KELURAHAN MRANTI :   <?php echo $nama_bulan  ?>   <?php echo $tahun ?></strong></div>
      <br>
      </span>
<table width="899"  border="1" style="border-style:solid; ">
  <tr>
    <td width="35" rowspan="2"><div align="center" class="style1"><strong>NO</strong></div>      
      <div align="center" class="style1"></div></td>
    <td width="131"><div align="center" class="style1"><strong><span class="style1 style1">Nama</span></strong></div></td>
    <td width="95"><div align="center" class="style1"><strong><span class="style1 style1">Tempat Lahir </span></strong></div></td>
    <td width="55"><div align="center" class="style1"><strong><span class="style1 style1">Agama</span><br>
    </strong></div></td>
    <td width="142"><div align="center" class="style1"><span class="style4 style1">PDDK </span></div></td>
    <td width="102"><div align="center" class="style1"><span class="style4 style1">Nama KK </span></div></td>
    <td width="115"><div align="center" class="style1"><span class="style4 style1">SDHRT</span></div></td>
    <td width="43"><div align="center" class="style1"><strong><span class="style4 style1">RT</span></strong></div></td>
    <td width="123"><div align="center" class="style1"><span class="style1 style4">Jenis Peristiwa </span></div></td>  
    </tr>
  <tr>
    <td><div align="center" class="style1">
        <span class="style4 style1">NIK</span>
      </div>
    </div></td>
    <td>
      <div align="center" class="style1"><span class="style4 style1">Tanggal Lahir </span></div>
    </div></td>
    <td>
      <div align="center" class="style1"><span class="style4 style1">GDRH</span></div>
    </div></td>
    <td><div align="center" class="style1"><span class="style4 style1">Pekerjaan</span></div></td>
    <td>
      <div align="center" class="style1"><span class="style4 style1">No. K K</span></div>
    </div></td>
    <td>
      <div align="center" class="style1"><span class="style4 style1">Status</span></div>
    </div></td>
    <td><div align="center" class="style1"><span class="style4 style1">RW </span></div></td>
    <td>
      <div align="center" class="style1"><span class="style4 style1">Tanggal Peristiwa </span></div>
    </div></td>
    </tr>
    <?php
//include "koneksi.php";

$bulan=$_GET['bulan'];
$tahun=$_GET['tahun'];
//$layanan=$_GET['layanan'];
$desa=$_GET['desa'];
$nourut=0;
//$total=0;
$query = "select c.*, 
tanggal(tanggal_kedatangan) as tanggal_kedatangan_cetak,
a.tanggal_kedatangan, a.nama_kepala_keluarga_tujuan
from
(
select penduduk_detail_id, tanggal_kedatangan, nama_kepala_keluarga_tujuan from t_dukcapil_f124
union
select penduduk_detail_id, tanggal_kedatangan, nama_kepala_keluarga_tujuan from t_dukcapil_f128
union
select penduduk_detail_id, tanggal_kedatangan, nama_kepala_keluarga_tujuan from t_dukcapil_f131
union
select penduduk_detail_id, tanggal_kedatangan, nama_kepala_keluarga_tujuan from t_dukcapil_f138
) as a
left outer join m_penduduk_detail as b on a.penduduk_detail_id = b.penduduk_detail_id
left outer join m_penduduk as c on b.nik = c.nik
where month(a.tanggal_kedatangan)= $bulan and year(a.tanggal_kedatangan) = $tahun 

order by a.tanggal_kedatangan ";
//and c.desa_id = $desa 
//print $query;

$tampil = mysql_query($query, $koneksi)
or die ("Gagal Query".mysql_error());
while($result=mysql_fetch_array($tampil)){
$nourut++;
//$retribusi = $result['retribusi'];
//$total+=$retribusi;
//$jumlah=mysql_num_rows($tampil);

?>  <tr>
    <td rowspan="2" align="center" valign="middle"><span class="style1"><?php echo $nourut; ?></span></td>
    <td><span class="style1"><?php echo $result['nama_lengkap']; ?></span><br>
    </span></td>
    <td><span class=" style1"><?php echo $result['tempat_lahir']; ?></span></td>
    <td><span class=" style1"><?php echo $result['agama']; ?></span></td>
    <td><span class=" style1"><?php echo $result['pendidikan']; ?></span></td>
    <td><span class=" style1"><?php echo $result['nama_kepala_keluarga_tujuan']; ?></span></td>
    <td><span class=" style1"><?php echo $result['status_hubungan_keluarga']; ?></span></td>
    <td align="center"><span class=" style1"><?php echo $result['rt']; ?></span></td>
    <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style1"><?php echo $result['NIK']; ?></span></td>
      <td><span class="style1"><?php echo $result['tanggal_lahir']; ?></span></td>
      <td>&nbsp;</td>
      <td><span class="style1"><?php echo $result['pekerjaan']; ?></span></td>
      <td><span class="style1"><?php echo $result['nomor_kk']; ?></span></td>
      <td><span class="style1"><?php echo $result['status_kawin']; ?></span></td>
      <td align="center"><span class="style1"><?php echo $result['rw']; ?></span></td>
      <td><span class="style1"><?php echo $result['tanggal_kedatangan_cetak']; ?></span></td>
    </tr>
 <?php }?>
</table>	</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" >
      <tr>
        <td width="31%" height="173"><p align="center" class="style1"><br>
          Mengetahui,<span class="style1"></span><br>
          Lurah Mranti </p>
          <p align="center" class="style1">&nbsp;</p>
          <p align="center" class="style1">(........................................................)<br>
          Pembina<br>
          NIP. ........................................................ </p></td>
        <td width="31%">&nbsp;</td>
        <td width="38%"><p align="center" class="style1">Purworejo, <span class="style1">..................20</span>....<br>
            Petugas Pendata </p>
          <p align="center" class="style1">&nbsp;</p>
          <p align="center" class="style1">(........................................................)<br>
          NIP. .............................................. </p></td>
      </tr>
    </table></td>
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
$dompdf->set_paper("folio", "landscape");
$dompdf->render();
//$dompdf->stream('coba.pdf');
$dompdf->stream('coba.pdf',array('Attachment' => 0));
//$dompdf->stream('my.pdf',array('Attachment'=>0));.
 
?>