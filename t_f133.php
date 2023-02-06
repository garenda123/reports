<?php
ob_start();
?>

<?php
include "koneksi.php";

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
LEFT OUTER JOIN t_f133 c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

?>

<!DOCTYPE html>
<html>

<head>
    <title>SURAT PENGANTAR PINDAH ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</title>
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
                <div align="center"><strong>F-1.33</strong></div>
            </td>
        </tr>
    </table>
    <div style="font-size:18px">&nbsp;
    <center><b>SURAT PENGANTAR PINDAH <br>

ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</b></center></div>
    <hr color="#000000" size="3" width="100%" />
  
   <p align="center">Nomor :</p>
   <p>Yang bertanda tangan di bawah ini,menerangkan Permohonan Pindah Penduduk

Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana
terlampir.
WNI dengan data sebagai berikut :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"> 1.</td>
            <td width="23%">NIK</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nik']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>2.</td>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $hasil['nama']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> 3.</td>
            <td>Nomor Kartu Keluarga</td>
            <td>:</td>
            <td><?php echo $hasil['no_kk']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>4.</td>
            <td>Nama Kepala Keluarga</td>
            <td>:</td>
            <td><?php echo $hasil['nama_kep_kel']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>5. </td>
            <td> Alamat Sekarang</td>
            <td>:</td>
            <td><?php echo $hasil['alamat_sekarang']; ?> RT:<?php echo $hasil['rt_asal']; ?> RW:<?php echo $hasil['rw_asal']; ?> <br>DESA/KEL:<?php echo $hasil['kel_asal']; ?> KAB:<?php echo $hasil['kab_asal']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> 6.</td>
            <td> Alamat Tujuan Pindah</td>
            <td>:</td>
            <td><?php echo $hasil['alamat_tujuan']; ?> RT:<?php echo $hasil['rt_tujuan']; ?> RW:<?php echo $hasil['rw_tujuan']; ?> <br> DESA/KEL:<?php echo $hasil['kel_tujuan']; ?> KAB:<?php echo $hasil['kab_tujuan']; ?> PROP: <?php echo $hasil['prop_tujuan']; ?></td>
         
        </tr>
        <tr>
            <td></td>
            <td> 7.</td>
            <td> Jumlah Keluarga Yang Pindah</td>
            <td>:</td>
            <td><?php echo $hasil['jml_kel']; ?></td>
         
        </tr>
    </table>

   <p>Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana
terlampir.</p>

    <p align ="center">Demikian Surat Pengantar Pindah ini dibuat agar digunakan
sebagaimana mestinya.</p>

<table width="100%"  border="0">
              
              <tr>
                <td colspan="2"><div align="center"> </div></td>
              </tr>
              <tr>
                <td width="27%"><p align="center">Camat</p>
                  <p align="center">&nbsp;</p>
                  <p align="center">......................................<br>
                 </p>      </td>
                <td width="28%"><p align="center">Karantalun kidul<br>Pemohon</p>
                  <p align="center">&nbsp;</p>
                  <p align="center">(<?php echo $hasil['pejabat_nama']; ?>)<br>
                  </p>    </td>
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