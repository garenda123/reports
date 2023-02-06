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
LEFT OUTER JOIN t_f121 c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

?>

<!DOCTYPE html>
<html>

<head>
    <title>FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA</title>
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
                <div align="center"><strong>F-1.21</strong></div>
            </td>
        </tr>
    </table>

    <div style="font-size:18px">&nbsp;
    <center><b>FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP)<br>
    WARGA NEGARA INDONESIA</b></center></div>
  <br>
  <table style="width: 100%;" class="header" border=0>
      <tr>
      <td> 
        <p align="left" class="kotak"><strong>Perhatian :</strong><br>
      1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br>
      2.  Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan<br>
        </p></td>
      <tr>
      </table>

     

<table border=0 class="header" style="width: 100%;">
        <tr>
          <td width="8%"><strong>PEMERINTAH PROPINSI</strong></td>
          <td width="1%">:</td>
          <td colspan="2"width="10%" class="kotak"><?php echo $hasil['prop']; ?></td>
          
         
        <tr>
          <td><strong>PEMERINTAH KABUPATEN/KOTA</strong></td>
          <td>:</td>
          <td colspan="2" class="kotak"><?php echo $hasil['kab']; ?></td>
          
          
        <tr>
          <td><strong>KECAMATAN</strong></td>
          <td>:</td>
          <td colspan="2" class="kotak"><?php echo $hasil['kec']; ?></td>
         
          
        <tr>
          <td><strong>KELURAHAN/DESA</strong></td>
          <td>:</td>
          <td colspan="2" class="kotak"><?php echo $hasil['kel']; ?></td>
        
          </tr>
        <tr>
          <td><em>PERMOHONAN KTP</em></td>
          <td>:</td>
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
            <td width="95%"> 1. Baru</td>
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
            <td> 2. Perpanjangan</td>
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
            <td> 3. Pergantian</td>
        </tr>
    

    </table></td>
       
          
       
  </tr>

      </table>
     
      <p>&nbsp;</p>
      <table border=0 class="header" style="width: 100%;">
        <tr>
          <td width="26%" class="kotak">1. Nama Lengkap Pemohon</td>
          <td width="2%">&nbsp;</td>
          <td width="72%" class="kotak"><?php echo $hasil['nama_lgkp']; ?></td>
        <tr>
          <td class="kotak">2. No. KK</td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['no_kk']; ?></td>
        <tr>
          <td class="kotak">3. NIK</td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['nik']; ?></td>
      </table>

      <table width="100%" border="0">
        <tr>
          <td width="26%" class="kotak">4. Alamat </td>
          <td width="2%">:</td>
          <td colspan="8" class="kotak"></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="5%" class="kotak">RT : <?php echo $hasil['rt']; ?></td>
          <td width="7%" class="kotak"></td>
          <td width="5%">&nbsp;</td>
          <td width="5%" class="kotak">RW: <?php echo $hasil['rw']; ?></td>
          <td width="9%" class="kotak"></td>
          <td width="11%">&nbsp;</td>
          <td width="11%" class="kotak">Kode Pos : <?php echo $hasil['kodepos']; ?></td>
          <td width="19%" class="kotak"></td>
        </tr>
      </table>

      <table width="100%" border="1" class="table-collapse">
        <tr>
          <td width="15%" class="kotak"><div align="center">Pas Photo(2x3) </div></td>
          <td width="16%" class="kotak"><div align="center">Cap Jempol </div></td>
          <td width="41%" class="kotak"><div align="center">Specimen Tanda Tangan </div></td>
          <td width="28%"><div align="center">,.................20.....</div></td>
        </tr>
        <tr>
          <td rowspan="2" class="kotak">&nbsp;</td>
          <td rowspan="2" class="kotak">&nbsp;</td>
          <td height="80" class="kotak">&nbsp;</td>
          <td rowspan="2"><div align="center">
            <p>Pemohon,</p>
            <p>&nbsp;</p>
            <p>()</p>
          </div></td>
        </tr>
        
        <tr>
          <td height="23">Ket: Cap Jempol/Tanda Tangan</td>
        </tr>
      </table>

      <table width="100%"  border="0" >
        
        <tr>
          <td width="28%" bordercolor="#000000"><p align="center">&nbsp;</p>
            <p align="center">Camat </p>
            <p align="center">&nbsp;</p>
            <p align="center">(...........................................)<br>
              NIP............................</p></td>
          <td width="28%" bordercolor="#000000"><p align="left">Mengetahui :</p>
            <p align="center">Kepala Desa/Lurah </p>
            <p align="center">&nbsp;</p>
            <p align="center">(...........................................)<br>
            NIP............................</p>    </td>
        </tr>
      </table>

<br>
<p>gunting disini -------------------------------------------------------------------------------------------------------------------------------------------------</p>

      <table border=0 class="header" style="width: 100%;">
        <tr>
          <td width="8%"><strong>PEMERINTAH PROPINSI</strong></td>
          <td width="1%">:</td>
          <td colspan="2"width="10%" class="kotak"><?php echo $hasil['prop']; ?></td>
          
         
        <tr>
          <td><strong>PEMERINTAH KABUPATEN/KOTA</strong></td>
          <td>:</td>
          <td colspan="2" class="kotak"><?php echo $hasil['kab']; ?></td>
          
          
        <tr>
          <td><strong>KECAMATAN</strong></td>
          <td>:</td>
          <td colspan="2" class="kotak"><?php echo $hasil['kec']; ?></td>
         
          
        <tr>
          <td><strong>KELURAHAN/DESA</strong></td>
          <td>:</td>
          <td colspan="2" class="kotak"><?php echo $hasil['kel']; ?></td>
        
          </tr>
        <tr>
          <td><em>PERMOHONAN KTP</em></td>
          <td>:</td>
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
            <td width="95%"> 1. Baru</td>
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
            <td> 2. Perpanjangan</td>
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
            <td> 3. Pergantian</td>
        </tr>
    

    </table></td>
       
          
       
  </tr>

      </table>
      <p>&nbsp;</p>
      <table border=0 class="header" style="width: 100%;">
        <tr>
          <td width="26%" class="kotak">1. Nama Lengkap Pemohon</td>
          <td width="2%">&nbsp;</td>
          <td width="72%" class="kotak"><?php echo $hasil['nama_lgkp']; ?></td>
        <tr>
          <td class="kotak">2. No. KK</td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['no_kk']; ?></td>
        <tr>
          <td class="kotak">3. NIK</td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['nik']; ?></td>
      </table>

      <table width="100%" border="0">
        <tr>
          <td width="26%" class="kotak">4. Alamat </td>
          <td width="2%">:</td>
          <td colspan="8" class="kotak"></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="5%" class="kotak">RT : <?php echo $hasil['rt']; ?></td>
          <td width="7%" class="kotak"></td>
          <td width="5%">&nbsp;</td>
          <td width="5%" class="kotak">RW: <?php echo $hasil['rw']; ?></td>
          <td width="9%" class="kotak"></td>
          <td width="11%">&nbsp;</td>
          <td width="11%" class="kotak">Kode Pos : <?php echo $hasil['kodepos']; ?></td>
          <td width="19%" class="kotak"></td>
        </tr>
      </table>

      <table width="100%" border="1" class="table-collapse">
        <tr>
          <td width="15%" class="kotak"><div align="center">Pas Photo(2x3) </div></td>
          <td width="16%" class="kotak"><div align="center">Cap Jempol </div></td>
          <td width="41%" class="kotak"><div align="center">Specimen Tanda Tangan </div></td>
          <td width="28%"><div align="center">,.................20.....</div></td>
        </tr>
        <tr>
          <td rowspan="2" class="kotak">&nbsp;</td>
          <td rowspan="2" class="kotak">&nbsp;</td>
          <td height="80" class="kotak">&nbsp;</td>
          <td rowspan="2"><div align="center">
            <p>Pemohon,</p>
            <p>&nbsp;</p>
            <p>()</p>
          </div></td>
        </tr>
        
        <tr>
          <td height="23">Ket: Cap Jempol/Tanda Tangan</td>
        </tr>
      </table>

      <table width="100%"  border="0" >
        
        <tr>
          <td width="28%" bordercolor="#000000"><p align="center">&nbsp;</p>
            <p align="center">Camat </p>
            <p align="center">&nbsp;</p>
            <p align="center">(...........................................)<br>
              NIP............................</p></td>
          <td width="28%" bordercolor="#000000"><p align="left">Mengetahui :</p>
            <p align="center">Kepala Desa/Lurah </p>
            <p align="center">&nbsp;</p>
            <p align="center">(...........................................)<br>
            NIP............................</p>    </td>
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