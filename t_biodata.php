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
LEFT OUTER JOIN t_biodata c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

$query2 = "
SELECT * FROM t_biodata as z
left outer join m_penduduk as m on z.nik = m.nik

left outer join l_desa as d on d.desa_id = m.desa_id
WHERE no_kk = (SELECT b.no_kk
FROM m_penduduk_detail as a 
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
where penduduk_detail_id = $penduduk_detail_id)
"; //untuk ambil data pemohon

$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK PERKAWINAN/ PERCERAIAN BELUM TERCATAT</title>
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
                <div align="center"><strong>F-1.05</strong></div>
            </td>
        </tr>
    </table>

    <center><b>SURAT PERNYATAAN PERUBAHAN DATA KEPENDUDUKAN<br>
WARGA NEGARA INDONESIA</b></center>
  <br>
  
   <p>Yang bertanda tangan di bawah ini :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"> </td>
            <td width="23%">Nama</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['nama_lgkp']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $ttd['nik']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $ttd['alamat']; ?></td>
        </tr>
 
    </table>

    <p>Menyatakan bahwa data status kependudukan saya telah berubah, mengenai:</p>
    <table width="100%" border="0">
    
    <tr>
        <td width="1%"></td>
        <td width="1%"> </td>
        <td width="23%">Pendidikan Terakhir</td>
        <td width="1%">:</td>
        <td><?php echo $ttd['pddkn']; ?></td>
       
    </tr>
    <tr>
        <td></td>
        <td> </td>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $ttd['pkrjn']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td> </td>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $ttd['agama']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td> </td>
        <td>Perubahan Lainnya, Sebutkan</td>
        <td>:</td>
        <td><?php echo $ttd['lainnya']; ?></td>
    </tr>

</table>
    <p> Adapun Perubahannya sebagai berikut:</p>
    
    

<table width="100%" border="0">
    
    <tr>
        
        <td width="1%">1. </td>
        <td width="23%">Pendidikan Terakhir</td>
        <td width="1%">:</td>
        <td>Semula: <?php echo $ttd['pddkn_lama']; ?> Menjadi : <?php echo $ttd['pddkn_baru']; ?>  </td>
        <td>Dasar perubahan: <?php echo $ttd['pddkn_dasar']; ?> no : <?php echo $ttd['pddkn_dasar_no']; ?> tgl: <?php echo $ttd['pddkn_dasar_tgl']; ?></td>
    </tr>
    <tr>
        
        <td>2.</td>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>Semula: <?php echo $ttd['pkrjn_lama']; ?> Menjadi : <?php echo $ttd['pkrjn_baru']; ?>  </td>
        <td>Dasar perubahan: <?php echo $ttd['pkrjn_dasar']; ?> no : <?php echo $ttd['pkrjn_dasar_no']; ?> tgl:  <?php echo $ttd['pkrjn_dasar_tgl']; ?></td>
    </tr>

    <tr>
        
        <td>3.</td>
        <td>Agama</td>
        <td>:</td>
        <td>Semula: <?php echo $ttd['agama_lama']; ?> Menjadi : <?php echo $ttd['agama_baru']; ?>  </td>
        <td>Dasar perubahan: <?php echo $ttd['agama_dasar']; ?> no : <?php echo $ttd['agama_dasar_no']; ?> tgl: <?php echo $ttd['agama_dasar_tgl']; ?> </td>
    </tr>


    <tr>
        
        <td>4.</td>
        <td>Perubahan lainnya, sebutkan</td>
        <td>:</td>
        <td>Semula: <?php echo $ttd['lainnya']; ?> Menjadi : <?php echo $ttd['lainnya']; ?>  </td>
        <td>Dasar perubahan:  no :  tgl: </td>
    </tr>


</table>

<p>Terlampir kami sampaikan copy dari berkas-berkas yang terkait dengan perubahan-perubahan tersebut</p>

<p>Demikian Surat Pernyataan ini saya buat dengan sebenarnya, apabila dalam keterangan yang saya berikan terdapat
hal-hal yang tidak berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai dengan ketentuan
peraturan perundang-undangan yang berlaku.</p>




<table width="100%"  border="0">


            <tr>
              <td width="50%"><p align="center"></p>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
              
              <p align="center"><u></u> </p></td>
             
              <p align="center"><?php echo ucwords(strtolower($ttd['alamat'])); ?> <?php echo tanggal($ttd['tgl_entri']); ?> <br> Yang membuat pernyataan.</p>
            
             <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Materai<br>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cukup</p>
              <p align="center">&nbsp;</p>
              
              <p align="center"><u>(<?php echo $ttd['nama_lgkp']; ?>)</u>  </p></td>
              
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