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
LEFT OUTER JOIN t_f115 c ON a.penduduk_detail_id = c.penduduk_detail_id
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
SELECT *, m.agama as agama FROM t_f115 as z
left outer join m_penduduk as m on z.nik = m.nik
left outer join l_desa as d on d.desa_id = m.desa_id
WHERE no_kk = (SELECT b.no_kk
FROM m_penduduk_detail as a 
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
where penduduk_detail_id = $penduduk_detail_id)
"; //untuk ambil data pemohon

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>

<!DOCTYPE html>
<html>

<head>
    <title>FORMULIR PERMOHONAN KARTU KELUARGA (KK) BARU WARGA NEGARA INDONESIA</title>
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
                <div align="center"><strong>F-1.15</strong></div>
            </td>
        </tr>
    </table>

    <div style="font-size:18px">&nbsp;
    <center><b>FORMULIR PERMOHONAN KARTU KELUARGA (KK) BARU<br>
    WARGA NEGARA INDONESIA </b></center></div>
  <br>

  <table style="width: 100%;" class="header" border=0>
            <tr>
            <td> 
              <p align="left" class="kotak"><strong>Perhatian :</strong><br>
            1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br>
            2. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan.<br>
              </p></td>
            <tr>
            </table>

  
  

   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"></td>
            <td width="23%">PEMERINTAH PROPINSI</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['prop']; ?></td>
           
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>PEMERINTAH KABUPATEN/KOTA</td>
            <td>:</td>
            <td><?php echo $hasil['kab']; ?></td>
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
            <td>KELURAHAN/DESA</td>
            <td>:</td>
            <td><?php echo $hasil['kel']; ?></td>
        </tr>

       
 
    </table>

    <p>Memberikan kuasa kepada :</p>

    <table width="100%" border="0">
    
    <tr>
        <td width="1%"></td>
        <td width="1%">1.</td>
        <td width="23%">Nama lengkap Pemohon</td>
        <td width="1%">:</td>
        <td><?php echo $ttd['nama_lgkp']; ?></td>
       
    </tr>
    <tr>
        <td></td>
        <td> 2.</td>
        <td>NIK Pemohon</td>
        <td>:</td>
        <td><?php echo $ttd['nik']; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>3. </td>
        <td>No. KK Semula</td>
        <td>:</td>
        <td><?php echo $ttd['no_kk_semula']; ?></td>
    </tr>


</table>

<table width="100%" border="0">
              <tr>
                <td class="kotak">&nbsp;&nbsp;4. Alamat Pemohon </td>
                <td>:</td>
                <td colspan="2" class="kotak"></td>
                <td width="4%">&nbsp;</td>
                <td>RT: <?php echo $ttd['rt']; ?></td>
                <td class="kotak"></td>
                <td width="3%">RW: <?php echo $ttd['rw']; ?></td>
                <td width="12%" class="kotak"></td>
              </tr>
              <tr>
                <td width="26%">&nbsp;</td>
                <td width="2%">&nbsp;</td>
                <td width="19%">a. Desa/Kelurahan </td>
                <td colspan="2" class="kotak"> <?php echo $ttd['pemohon_kel']; ?></td>
                <td width="3%">&nbsp;</td>
                <td width="14%">b. Kecamatan</td>
                <td colspan="2" class="kotak"> <?php echo $ttd['pemohon_kec']; ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>c. Kabupaten/Kota</td>
                <td colspan="2" class="kotak"><?php echo $ttd['pemohon_kab']; ?></td>
                <td>&nbsp;</td>
                <td>d. Propinsi</td>
                <td colspan="2" class="kotak"> <?php echo $ttd['pemohon_prop']; ?> </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Kode Pos</td>
                <td colspan="2" class="kotak"><?php echo $ttd['kodepos']; ?></td>
                <td>&nbsp;</td>
                <td>Telepon</td>
                <td colspan="2" class="kotak"><?php echo $ttd['telp']; ?></td>
              </tr>
            </table>

            <table width="100%" border="0">
            <br>
    
    <tr>
        <td width="1%"></td>
        <td width="1%">5.</td>
        <td width="23%">Alasan Permohonan</td>
        <td width="1%">:</td>
        <td> <table width="100%" border="0">
        <tr>
            <td widht="5%">
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['alasan'] == 1) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="95%"> 1.Karena Membentuk Rumah Tangga Baru</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['alasan'] == 2) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 2.Karena Kartu Keluarga Hilang/Rusak</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($hasil['alasan'] == 3) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 3.Lainnya</td>
        </tr>
    

    </table></td>
        
       
    </tr>
    <tr>
        <td></td>
        <td> 6.</td>
        <td>Jumlah Anggota Keluarga</td>
        <td>:</td>
        <td><?php echo $hasil['jml_anggota']; ?></td>
    </tr>



</table>
<p>&nbsp;&nbsp;&nbsp;7. DAFTAR ANGGOTA KELUARGA PEMOHON (Hanya diisi anggota keluarga saja) </p>

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

            <table width="100%"  border="0">
              
              <tr>
                <td colspan="2"><div align="center">Mengetahui : </div></td>
              </tr>
              <tr>
                <td width="27%"><p align="center">Camat</p>
                  <p align="center">&nbsp;</p>
                  <p align="center">......................................<br>
                  NIP............................</p>      </td>
                <td width="28%"><p align="center">Karantalun kidul<br>Pemohon</p>
                  <p align="center">&nbsp;</p>
                  <p align="center">(............................................)<br>
                  NIP............................</p>    </td>
              </tr>
            </table>

            <table width="100%"  border="0">
        
        <tr>
          <td width="60%" rowspan="5">&nbsp;</td>
          <td width="40%" ><p ><br>
           
<br>
Tgl Pemasukan Data, </p>
        </tr>
        <tr>
            <td>Tgl: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bln:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thn:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>

            </tr>
            <tr>
            <td>Paraf</td>
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