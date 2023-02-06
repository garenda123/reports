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
LEFT OUTER JOIN kartu_identitas_pengungsi c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
-- WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array


$query = "
SELECT * FROM m_penduduk WHERE no_kk = (SELECT b.no_kk
FROM m_penduduk_detail as a 
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
where penduduk_detail_id = $penduduk_detail_id)
"; //untuk ambil data keluarga

$query2 = "
SELECT *, m.agama as agama FROM t_kip as z
left outer join m_penduduk as m on z.nik_kk = m.nik
left outer join l_desa as d on d.desa_id = m.desa_id
WHERE no_kk = (SELECT b.no_kk
FROM m_penduduk_detail as a 
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
where penduduk_detail_id = $penduduk_detail_id)
"; //untuk ambil data pemohon

$scriptQuery = "
SELECT *
-- ,
-- tanggal(tanggal_lahir) as tanggal_lahir_cetak,
-- tanggal(tanggal) as tanggal_cetak
FROM m_penduduk_detail as a
-- LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN t_kip c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON a.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and a.desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil);

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
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



<table width="100%" border="0">
        <tr>
            <td width="20%" align="center">
                <img src="img/logo.png" class="img" alt="l" width="100px">
            </td>
            <td valign="top">
                <div style="font-size:8px">&nbsp;</div>
                <table width="90%" border="0">
                    <tr>
                        <td align="center">
                            <div style="font-size:20px">
                                <b>PEMERINTAH KABUPATEN BANYUMAS <br>
                                DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</b> <br>
                            </div>
                            <div style="font-size:15px">
                                <i>
                                    Jl. Raya Karangtalun Kidul, Kode Pos 53175 <br>
                                    Email : pemdeskadul16@gmail.com
                                </i>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
   
    <hr color="#000000" size="3" width="100%" />
    <table width="100%" border="0">
        <tr>
            <th align="center" >KARTU IDENTITAS PENGUNGSI</th>
           
        </tr>
        <tr>
        <th align="center" >No: <?php echo $hasil['no_surat']; ?></th>
        </tr>
    </table>

   
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"> </td>
            <td width="23%">NIK</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nik_kk']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>NAMA</td>
            <td>:</td>
            <td><?php echo $hasil['nama'] ." / UMUR: ".$hasil['umur']; ?> TAHUN</td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>DESA ASAL</td>
            <td>:</td>
            <td><?php echo $hasil['kel']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>KECAMATAN</td>
            <td>:</td>
            <td><?php echo $hasil['kec']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>DAFTAR KELUARGA</td>
            <td>:</td>
            <td></td>
        </tr>
        
    </table>

    <table width="100%" border="0">
              
              <tr>
                <td width="5%" bgcolor="#CCCCCC" class="kotak"><div align="center">No.</div></td>
                <td width="1%">&nbsp;</td>
                <td width="36%" bgcolor="#CCCCCC" class="kotak"><div align="center">Nama</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Tempat/Tgl Lahir  </div></td>
                <td width="1%">&nbsp;</td>
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">L/P</div></td>
                <td width="1%">&nbsp;</td>
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">Agama</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Hubungan Keluarga</div></td>
                <td width="1%">&nbsp;</td>
                
              </tr>
              
              <?php
              while($show = mysqli_fetch_array($ubahquery)){
            ?>
              <tr>
              <td class="kotak"><?php echo $show['id']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['nama_lengkap']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['tempat_lahir']." / ".tanggal($show['tgl_lahir']) ;?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['jenis_kelamin']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['agama']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['status_hubungan_keluarga']; ?></td>
              </tr>
              <?php } ?>
            </table>

    

    

<table width="100%"  border="0">
            
            <tr>
              <td width="60%" bordercolor="#000000">&nbsp;</td>
              <td width="40%" bordercolor="#000000"><p align="center"><?php echo ucwords(strtolower( $hasil['desa'])); ?>,</p>
                <p align="center"><?php echo ucwords(strtolower($hasil['pejabat_ttd'])); ?> <?php echo ucwords(strtolower( $hasil['desa'])); ?><br>   </p>
        
                <p align="center">&nbsp;</p>
                <p align="center"><u>(<?php echo $hasil['pejabat_nama']; ?>)</u><br>
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