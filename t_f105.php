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
LEFT OUTER JOIN t_f105 c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

$query = "
SELECT * FROM m_penduduk WHERE no_kk = (SELECT b.no_kk
FROM m_penduduk_detail as a 
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
where penduduk_detail_id = $penduduk_detail_id )
"; //untuk ambil data keluarga
$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());

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
    <div style="font-size:18px">&nbsp;
    <center><b>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK<br>
PERKAWINAN/ PERCERAIAN BELUM TERCATAT</b></center></div>
  <br>
  
   <p>Kami yang bertanda tangan di bawah ini :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%">I. </td>
            <td width="23%">Nama</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_suami']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $hasil['nik_suami']; ?></td>
        </tr>
 
    </table>

    <p>sebagai suami, selanjutnya disebut PIHAK PERTAMA ,</p>
    <table width="100%" border="0">
    
    <tr>
        <td width="1%"></td>
        <td width="1%">II. </td>
        <td width="23%">Nama</td>
        <td width="1%">:</td>
        <td><?php echo $hasil['nama_istri']; ?></td>
       
    </tr>
    <tr>
        <td></td>
        <td> </td>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $hasil['nik_istri']; ?></td>
    </tr>

</table>
    <p> sebagai istri, selanjutnya disebut PIHAK KEDUA ,</p>
    
    <p>menyatakan bahwa kami telah terkait perkawinan sebagai suami istri/ telah melakukan ), yang dilaksanakan pada 
(tanggal ), dengan saksi-saksi :</p>

<table width="100%" border="0">
    
    <tr>
        
        <td width="1%">I. </td>
        <td width="23%">Nama</td>
        <td width="1%">:</td>
        <td><?php echo $hasil['nama_saksi1']; ?></td>
       
    </tr>
    <tr>
        
        <td> </td>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $hasil['nik_saksi1']; ?></td>
    </tr>

</table>
<table width="100%" border="0">
    
    <tr>
       
        <td width="1%">II. </td>
        <td width="23%">Nama</td>
        <td width="1%">:</td>
        <td><?php echo $hasil['nama_saksi2']; ?></td>
       
    </tr>
    <tr>
        
        <td> </td>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $hasil['nik_saksi2']; ?></td>
    </tr>

</table>
<p>Dengan Nama anak-anak sebagi berikut :</p>
<table width="100%" border="0">
              
              <tr>
                <td width="5%" bgcolor="#CCCCCC" class="kotak"><div align="center">No.</div></td>
                <td width="1%">&nbsp;</td>
                <td width="36%" bgcolor="#CCCCCC" class="kotak"><div align="center">Nama</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Akta  </div></td>
                <td width="1%">&nbsp;</td>
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">SHDK</div></td>
                
                
              </tr>
              
              <?php
              while($show = mysqli_fetch_array($ubahquery)){
            ?>
              <tr>
              <td class="kotak"><?php echo $show['id']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['nama_lengkap']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['no_akta_lahir'] ;?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['status_hubungan_keluarga']; ?></td>
               
              </tr>
              <?php } ?>
            </table>

<p>Demikian Surat Pernyataan ini kami buat dengan sebenarnya, apabila dalam keterangan yang kami berikan terdapat
hal-hal yang tidak berdasarkan keadaan yang sebenarnya, kami bersedia dikenakan sanksi sesuai dengan ketentuan
peraturan perundang-undangan yang berlaku.</p>

<table width="100%"  border="0">
            
            <tr>
             
              <td width="50%" bordercolor="#000000"><p align="center">Kabupaten Banyumas, <?php echo tanggal($hasil['tgl_entri']); ?></p>
              <p align="center">Yang Menyatakan,</p>
              
              </td>
       
            </tr>
          </table>


<table width="100%"  border="0">


            <tr>
              <td width="50%"><p align="center">PIHAK KEDUA,</p>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
              
              <p align="center"><u>(<?php echo $hasil['nama_istri']; ?>)</u> </p></td>
             
              <p align="center">PIHAK PERTAMA</p>
            
             <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Materai<br>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cukup</p>
              <p align="center">&nbsp;</p>
              
              <p align="center"><u>(<?php echo $hasil['nama_suami']; ?>)</u>  </p></td>
              
            </tr>

            <tr>
              <td width="50%"><p align="center">SAKSI II,</p>
                <p align="center">&nbsp;</p>
           
              <p align="center"><u>(<?php echo $hasil['nama_saksi2']; ?>)</u> </p></td>
             
              <p align="center">SAKSI I,</p>
              <p align="center">&nbsp;</p>
    
              
              <p align="center"><u>(<?php echo $hasil['nama_saksi1']; ?>)</u>  </p></td>
              
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