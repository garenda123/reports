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
LEFT OUTER JOIN t_f103 c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
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
SELECT * FROM t_f103 
where penduduk_detail_id = $penduduk_detail_id
"; //untuk ambil data pemohon

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>


<!DOCTYPE html>
<html>

<head>
    <title>FOLMULIR PENDAFTARAN PERPINDAHAN PENDUDUK</title>
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
                <div align="center"><strong>F-1.03</strong></div>
            </td>
        </tr>
    </table>

    <div style="font-size:18px">&nbsp;
    <center><b>FOLMULIR PENDAFTARAN PERPINDAHAN PENDUDUK</b></center></div>
    <hr color="#000000" size="3" width="100%" />
  
    <table style="width: 100%;" class="header" border=0>
    <tr>
    <td> 
      <p bold align="left" class="kotak"><strong>Perhatian :</strong><br>
   <strong> 1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br></strong>
    
      </p></td>
    <tr>
</table>

    <table width="100%" border="0">
        <tr>
            <td>I.</td>
            <td colspan="4">DATA PEMOHON</td>
        </tr>
        <tr>
            <td width="1%"></td>
            <td width="1%">1. </td>
            <td width="30%">No KK</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['no_kk_asal']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>2. </td>
            <td>Nama Lengkap Pemohon</td>
            <td>:</td>
            <td><?php echo $ttd['nama_pemohon']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>3. </td>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $ttd['nik_pemohon']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>4. </td>
            <td>Jenis Permohonan</td>
            <td>:   </td>

            <td> <table width="100%" border="0">
        <tr>
            <td widht="5%">
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['jenis_permohonan'] == 1) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="95%"> 1. Surat Keterangan Pindah</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['jenis_permohonan'] == 2) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 2. Surat Keterangan Pindah Luar Negeri</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['jenis_permohonan'] == 3) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 3. Surat Keterangan Tempat Tinggal (SKTT)</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['jenis_permohonan'] == 4) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 4. Bagi Orang Asing Tinggal Terbatas</td>
        </tr>
    

    </table></td>
           
            
            
           
        </tr>
        
        <tr>
            <td></td>
            <td>5. </td>
            <td>Alamat Jelas</td>
            <td>:</td>
            <td><?php echo $ttd['alamat_asal']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>6. </td>
            <td>Klasifikasi Pindah</td>
            <td>:</td>
            <td><?php echo $ttd['klasifikasi']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>7. </td>
            <td>Alamat Pindah</td>
            <td>:</td>
            <td><?php echo $ttd['alamat_tujuan']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>8. </td>
            <td>Alasan Pindah</td>
            <td>:</td>
            <td><?php echo $ttd['alasan_pindah']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>9. </td>
            <td>Jenis Kepindahan</td>
            <td>:</td>
            <td><?php echo $ttd['jenis_pindah']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>10. </td>
            <td>Anggota Keluarga Yang
Tidak Pindah</td>
            <td>:</td>
            <td><?php echo $ttd['status_kk']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>11. </td>
            <td>Anggota Keluarga Yang
Pindah</td>
            <td>:</td>
            <td><?php echo $ttd['status_kk_pindah']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>12. </td>
            <td>Daftar Anggota Keluarga Yang Pindah</td>
            <td>:</td>
            <td></td>
        </tr>
        
    </table>
  
    
    <table width="100%" border="0">
      
      <tr>
        <td width="5%" bgcolor="#CCCCCC" class="kotak"><div align="center">No.</div></td>
        <td width="1%">&nbsp;</td>
        <td width="36%" bgcolor="#CCCCCC" class="kotak"><div align="center">NIK</div></td>
        <td width="1%">&nbsp;</td>
        <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Nama Lengkap </div></td>
        <td width="1%">&nbsp;</td>
        <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">SHDK*)</div></td>
      </tr>
      
      <?php
              while($show = mysqli_fetch_array($ubahquery)){
            ?>
      <tr>
      <td class="kotak"><?php echo $show['id']; ?></td>
        <td>&nbsp;</td>
        <td class="kotak"><?php echo $show['nik']; ?></td>
        <td>&nbsp;</td>
        <td class="kotak"><?php echo $show['nama_lengkap']; ?></td>
        <td>&nbsp;</td>
        <td class="kotak"><?php echo $show['status_hubungan_keluarga']; ?></td>
      </tr>
      <?php } ?>
   
    
    </table>
    <b>Diisi oleh penduduk (Orang Asing) Pemegang ITAS yang Mengajukan SKTT dan OA Pemegang ITAP</b>


    </table>

    <table width="100%" border="0">
     
        <tr>
            <td width="1%"></td>
            <td width="1%">13. </td>
            <td width="30%">Nama Sponsor</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_sponsor']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>14. </td>
            <td>Tipe Sponsor</td>
            <td>:</td>
            <td><?php echo $hasil['tipe_sponsor']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>15. </td>
            <td>Alamat Sponsor</td>
            <td>:</td>
            <td><?php echo $hasil['alamat_sponsor']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>16. </td>
            <td>Nomor dan Tanggal ITAS
& ITAP</td>
            <td>:</td>
            <td><?php echo $hasil['no_itas_itap']; ?></td>
        </tr>
        
   
    </table>
    <b>Diisi Oleh penduduk Yang Mengajukan Surat Keterangan Pindah Luar Negeri</b>
    
    <table width="100%" border="0">
     
        <tr>
            <td width="1%"></td>
            <td width="1%">17. </td>
            <td width="30%">Negara Tujuan</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['negara_tujuan']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>18. </td>
            <td>Alamat Tujuan</td>
            <td>:</td>
            <td><?php echo $hasil['alamat_tujuan_ln']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>19. </td>
            <td>Penangung Jawab</td>
            <td>:</td>
            <td><?php echo $hasil['penanggungjawab']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>20. </td>
            <td>Rencana Pindah Tanggal</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_rencana']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>21. </td>
            <td>Nomor Handphone</td>
            <td>:</td>
            <td><?php echo $hasil['no_hp']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>22. </td>
            <td>Alamat Email</td>
            <td>:</td>
            <td><?php echo $hasil['email']; ?></td>
        </tr>
    </table>

    <table width="100%"  border="0">
      <br>
    
      <tr>
        <td width="27%"><p align="center">Mengetahui: <br>Kepala Dinas Kependudukan dan<br>
Pencatatan Sipil Kabupaten Banyumas</p>
          <p align="center">&nbsp;</p>
          <p align="center">...............................................................<br>
          NIP........................................................</p></td>
        <td width="28%"><p align="center">Kabupaten Banyumas,<br>Pemohon,</p>
          <p align="center">&nbsp;</p>
          <p align="center">(........................................................)</p>    </td>
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