<?php
ob_start();
?>

<?php
include "koneksi.php";
include "fungsi.php";

$penduduk_detail_id = $_GET['penduduk_detail_id'];
//print $penduduk_detail_id;

$desa_id = $_GET['desa_id'];


$query = "
SELECT * FROM m_penduduk WHERE no_kk = (SELECT b.no_kk
FROM m_penduduk_detail as a 
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
where penduduk_detail_id = $penduduk_detail_id)
"; //untuk ambil data keluarga

$query2 = "
SELECT *, m.agama as agama FROM t_pindah as z
left outer join m_penduduk as m on z.nik_pemohon = m.nik
left outer join l_desa as d on d.desa_id = m.desa_id
left outer join alasan_pindah as e on e.no = z.alasan_pindah
left outer join shdk as f on f.no = z.pemohon_stat_hbkel
left outer join shdk as g on g.no = z.pemohon_stat_kwn
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
LEFT OUTER JOIN t_pindah c ON a.penduduk_detail_id = c.penduduk_detail_id
 LEFT OUTER JOIN l_desa d ON a.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and a.desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SURAT KETERANGAN PINDAH</title>
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
            <td style="font-size:18px" align="center"><b><u>SURAT KETERANGAN PINDAH</u></b></td>
            
            
        </tr>
        <tr>
        <td rowspan="1"align="center">NOMOR : <?php echo $hasil['no_surat']; ?></td>
</tr>
    </table>

  
  
   <p>Yang bertanda tangan di bawah ini :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"> 1.</td>
            <td width="23%">Nama</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_pemohon']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>2. </td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_jenis_klmin']; ?></td>
        </tr>
        
        <tr>
            <td></td>
            <td>3. </td>
            <td>Tempat dan Tanggal</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_tmpt_lht']." / ".tanggal($hasil['pemohon_tgl_lhr']); ?></td>
        </tr>

        <tr>
            <td></td>
            <td>4. </td>
            <td></td>
            <td>:</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>5.</td>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_agama']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>6. </td>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_stat_kwn']; ?></td>
            
        </tr>
        <tr>
            <td></td>
            <td>7. </td>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_pekerjaan']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>8. </td>
            <td>Pendidikan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_pendidikan']; ?></td>
            
        </tr>
        <tr>
            <td></td>
            <td>9. </td>
            <td>Alamat Asal</td>
            <td>:</td>
            <td><?php echo $hasil['alamat_asal']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>10. </td>
            <td>No KTP/NIK</td>
            <td>:</td>
            <td><?php echo $hasil['nik_pemohon']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>11. </td>
            <td>No KK</td>
            <td>:</td>
            <td><?php echo $hasil['no_kk_asal']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>12. </td>
            <td>Status Hubungan Dalam</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_stat_hbkel']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>13. </td>
            <td>NIK ibu</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_nik_ibu']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>14. </td>
            <td>Nama Lengkap Ibu</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_nama_lgkp_ibu']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>15. </td>
            <td>NIK Ayah</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_nik_ayah']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>16. </td>
            <td>Nama Lengkap Ayah</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_nama_lgkp_ayah']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>17. </td>
            <td>Pindah ke</td>
            <td>:</td>
            <td></td>
           
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Dusun</td>
            <td>:</td>
            <td><?php echo $hasil['dusun_tujuan']; ?>  Rt. <?php echo $hasil['rt_tujuan']; ?> / Rw. <?php echo $hasil['rw_tujuan']; ?></td>
           
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Desa/Kelurahan</td>
            <td>:</td>
            <td><?php echo $hasil['kel_tujuan']; ?></td>
           
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Kecamatan</td>
            <td>:</td>
            <td><?php echo $hasil['kec_tujuan']; ?></td>
           
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td><?php echo $hasil['kab_tujuan']; ?></td>
           
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Provinsi</td>
            <td>:</td>
            <td><?php echo $hasil['prop_tujuan']; ?></td>
           
        </tr>

        <tr>
            <td></td>
            <td>18. </td>
            <td>Pada Tanggal</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_entri']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>19. </td>
            <td>Alasan Pindah</td>
            <td>:</td>
            <td><?php echo $hasil['alasan_pindah']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td>20. </td>
            <td>Pengikut</td>
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
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">L/P </div></td>
                <td width="1%">&nbsp;</td>
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">Umur</div></td>
                <td width="1%">&nbsp;</td>
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">Status</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Pendidikan</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">No KTP/KK</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Keterangan</div></td>
              </tr>
              
              <?php
              while($show = mysqli_fetch_array($ubahquery)){
            ?>
              <tr>
                <td class="kotak"><?php echo $show['id']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['nama_lengkap']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['jenis_kelamin']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['status_kawin']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['pendidikan']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['no_kk']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"></td>
              </tr>
              <?php } ?>
            </table>

    
    <p>Untuk maksud tersebut di atas sejak tanggal diterbitkan suret pindah datang WNI sebagaimana dimaksud maka yang bersangkutan tidak lagi penduduk <?php echo ucwords(strtolower($hasil['alamat_asal'])); ?></p>
    <table width="100%" border="0">

<tr>

    <td width="1%"> </td>
    <td width="20%">No Reg</td>
    <td width="1%">:</td>
    <td></td>
</tr>
<tr>

    <td></td>
    <td>Tanggal</td>
    <td>:</td>
    <td></td>
</tr>


</table>

          <table width="100%"  border="0">
                
         
                <tr>
                  <td width="25%"><p align="center">Mengetahui</p>
                    <p align="center">Camat <?php echo ucwords(strtolower( $hasil['desa'])); ?>&nbsp;</p>
                    <p align="center"><br>
                    () </p>    </td>
                  <td width="25%"><p align="center"></p>
                    <p align="center">&nbsp;</p>
                    <p align="center"></p></td>
                    <p align="center"><br>
                    </p>    </td>
                  <td width="24%"><p align="center"></p>
                    <p align="center">&nbsp;</p>
                    <p align="center">&nbsp;</p>
                   
                  <p align="center">(<?php echo $hasil['pejabat_nama']; ?>)</p></td>
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