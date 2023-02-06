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
LEFT OUTER JOIN t_f104 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN goldrh_master b ON c.gol_drh = b.no
LEFT OUTER JOIN pddkn_master d ON c.pddk_akh = d.no
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

?>

<!DOCTYPE html>
<html>

<head>
    <title>SURAT PERNYATAAN TIDAK MEMILIKI DOKUMEN KEPENDUDUKAN</title>
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
                <div align="center"><strong>F-1.04</strong></div>
            </td>
        </tr>
    </table>

    <div style="font-size:18px">&nbsp;
    <center><b>SURAT PERNYATAAN TIDAK MEMILIKI DOKUMEN KEPENDUDUKAN</b></center></div>
    <hr color="#000000" size="3" width="100%" />
  
   <p>Yang bertanda tangan di bawah ini :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"> </td>
            <td width="23%">Nama Lengkap</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_lgkp']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Tempat dan Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_lhr']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Nama Ibu</td>
            <td>:</td>
            <td><?php echo $hasil['nama_ibu']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Golongan Darah</td>
            <td>:</td>
            <td><?php echo $hasil['gol']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Pendidikan Terakhir</td>
            <td>:</td>
            <td><?php echo $hasil['pddk']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Alamat</td>
            <td>: </td>
            <td><?php echo $hasil['alamat']; ?></td>
            <td>RT : <?php echo $hasil['no_rt']; ?></td>
            <td>RW : <?php echo $hasil['no_rw']; ?></td>
        </tr>
    </table>

    <table width="100%" border="0">
       
        <tr>
            <td width="27%"></td>
            <td width="1%">a. </td>
            <td width="30%">Desa/Kelurahan</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_kel']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>b. </td>
            <td>Kecamatan</td>
            <td>:</td>
            <td><?php echo $hasil['nama_kec']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>c. </td>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td><?php echo $hasil['nama_kab']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>d. </td>
            <td>Provinsi</td>
            <td>:</td>
            <td><?php echo $hasil['nama_prop']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>e.  </td>
            <td>Kode Pos</td>
            <td>:</td>
            <td><?php echo $hasil['kode_pos']; ?></td>
        </tr>
    </table>

    <p>Dengan ini menyatakan bahwa saya tidak memiliki dokumen kependudukan dan apabila di kemudian hari ternyata
pernyataan saya ini tidak benar, maka saya bersedia diproses secara hukum sesuai dengan peraturan
perundang-undangan yang berlaku serta dokumen yang diterbitkan dari permohonan ini menjadi tidak sah.</p>

<table width="100%"  border="0">
            
            <tr>
              <td width="60%" bordercolor="#000000">&nbsp;</td>
              <td width="40%" bordercolor="#000000"><p align="center">Kabupaten <?php echo ucwords(strtolower($hasil['nama_kab'])); ?>, <?php echo tanggal($hasil['tgl_entri']); ?></p>
                <p align="center">Yang Menyatakan,<br> <br>Materai
Cukup   </p>
        
                <p align="center">&nbsp;</p>
                <p align="center"><u><?php echo $hasil['nama_lgkp']; ?></u><br>
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