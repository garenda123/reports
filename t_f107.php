<?php
ob_start();
?>



<?php
include "koneksi.php";
include "fungsi.php";

$penduduk_detail_id = $_GET['penduduk_detail_id'];
//print $penduduk_detail_id;

$desa_id = $_GET['desa_id'];

$scriptQuery = "
SELECT *
-- ,
-- tanggal(tanggal_lahir) as tanggal_lahir_cetak,
-- tanggal(tanggal) as tanggal_cetak
FROM m_penduduk_detail as a
-- LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN t_kuasa c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN pkrjn_master d ON c.pekerjaan_1 = d.no
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

$query2 = "
SELECT * FROM t_kuasa where penduduk_detail_id = $penduduk_detail_id
"; //untuk ambil data pemohon

$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SURAT KUASA DALAM PELAYANAN ADMINISTRASI KEPENDUDUKAN</title>
    <style>
    body {
        font-size: 13px;
    }

    .table-collapse {
        border-collapse: collapse;
    }
    </style>
</head>

<body>

    <table width="10%" border="1" align="right" class="table-collapse">
        <tr>
            <td>
                <div align="center"><strong>F-1.07</strong></div>
            </td>
        </tr>
    </table>
    <div style="font-size:18px">&nbsp;
    <center><b>SURAT KUASA DALAM PELAYANAN<br>
ADMINISTRASI KEPENDUDUKAN</b></center></div>
  <br>
  
   <p>Pada hari ini <?php echo tanggal($ttd['tgl_entri']); ?> 
bertempat di Kabupaten <?php echo ucwords(strtolower($ttd['tempat_lhr_1'])); ?>, saya :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"></td>
            <td width="23%">Nama lengkap</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['nama_1']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Tempat/Tgl Lahir/Umur</td>
            <td>:</td>
            <td><?php echo $ttd['tempat_lhr_1']; ?> / <?php echo tanggal($ttd['tgl_lhr_1']); ?>/ <?php echo $ttd['umur_1']; ?>Tahun</td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?php echo $ttd['pekerjaan_1']; ?></td>
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $ttd['alamat_1']; ?></td>
        </tr>

       
 
    </table>

    <p>Memberikan kuasa kepada :</p>

    <table width="100%" border="0">
    
    <tr>
        <td width="1%"></td>
        <td width="1%"></td>
        <td width="23%">Nama lengkap</td>
        <td width="1%">:</td>
        <td><?php echo $ttd['nama_2']; ?></td>
       
    </tr>
    <tr>
        <td></td>
        <td> </td>
        <td>Tempat/Tgl Lahir/Umur</td>
        <td>:</td>
        <td><?php echo $ttd['tempat_lhr_2']; ?>/ <?php echo tanggal($ttd['tgl_lhr_2']); ?>/ <?php echo $ttd['umur_2']; ?> Tahun</td>
    </tr>
    <tr>
        <td></td>
        <td> </td>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $ttd['pekerjaan_2']; ?></td>
    </tr>

    <tr>
        <td></td>
        <td> </td>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $ttd['alamat_2']; ?></td>
    </tr>

   

</table>
    
    <p>Untuk mengisi formulir dalam pelayanan administrasi kependudukan, sesuai
keterangan dan kelengkapan persyaratan yang saya berikan seperti keadaan yang
sebenarnya dikarenakan kondisi saya dalam keadaan sakit/ lainnya<br>
<?php echo $ttd['alasan']; ?>………................................................…................................................. *)</p>

    
    
  

<table width="100%"  border="1">
        
        <tr>
        <td width="50%" bordercolor="#000000"><p align="center"><br>
       
<br>
Yang diberi kuasa,</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">(<?php echo $ttd['nama_2']; ?>)<br>
            </p></td>
          <td width="50%" bordercolor="#000000"><p align="center"><br>
      
<br> 
Yang memberi kuasa, </p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">(<?php echo $ttd['nama_1']; ?>)<br>
            </p></td>
        </tr>
      </table>

</body>

</html>

<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;



$html = ob_get_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('hasil.pdf',array('Attachment' =>0));
?>