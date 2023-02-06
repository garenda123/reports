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
SELECT *, m.agama as agama FROM t_sktt as z
left outer join m_penduduk as m on z.nik_pemohon = m.nik
left outer join l_desa as d on d.desa_id = m.desa_id

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
LEFT OUTER JOIN t_sktt c ON a.penduduk_detail_id = c.penduduk_detail_id
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
<title>PEMERINTAH KABUPATEN BANYUMAS DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</title>
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

<table border=0 class="header" style="width: 100%;">
        <tr>
          <td width="41%"><strong>PEMERINTAH PROPINSI</strong></td>
          <td width="1%">:</td>
          <td width="2%" class="kotak"></td>
          <td width="11%">&nbsp;</td>
          <td width="45%" class="kotak"><?php echo $hasil['pem_prop']; ?></td>
        <tr>
          <td><strong>PEMERINTAH KABUPATEN/KOTA</strong></td>
          <td>:</td>
          <td class="kotak"></td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['pem_kab']; ?></td>
        <tr>
          <td><strong>KECAMATAN</strong></td>
          <td>:</td>
          <td class="kotak"></td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['pem_kec']; ?></td>
        <tr>
          <td><strong>KELURAHAN/DESA</strong></td>
          <td>:</td>
          <td class="kotak"></td>
          <td>&nbsp;</td>
          <td class="kotak"><?php echo $hasil['pem_kel']; ?></td>
        
      </table>
      <p align="center"><b>FOLMULIR PENDAFTARAN ORANG ASING TINGGAL TERBATAS</b></p>
      <p align="center"><b>No  <?php echo $hasil['no_surat']; ?> </b></p>
      

      <p>yang bertanda tangan dibawah ini:</p>
      <table width="100%" border="0">
        <tr>
            <td></td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td width="1%"></td>
            <td width="1%">1. </td>
            <td width="30%">NIK</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nik_pemohon']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>2. </td>
            <td>Nama Lengkap Pemohon</td>
            <td>:</td>
            <td><?php echo $hasil['nama_pemohon']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>3. </td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_jenis_klmin']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>4. </td>
            <td>Tempat Lahir </td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_tmpt_lht']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>5. </td>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_tgl_lhr']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>6. </td>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_warganegara']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>7. </td>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_stat_kwn']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>8. </td>
            <td>Bidang Pekerjaan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_pekerjaan']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>9. </td>
            <td>Nomor & Tanggal Paspor</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_paspor']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>10. </td>
            <td>Masa Berlaku Paspor</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_akh_paspor']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>11. </td>
            <td>Nomor KITAS</td>
            <td>:</td>
            <td><?php echo $hasil['no_kitas']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>12. </td>
            <td>Dikeluarkan tanggal</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_keluar']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>13. </td>
            <td>Diizinkan tinggal diindonesia sampai</td>
            <td>:</td>
            <td><?php echo $hasil['tgl_akh_tinggal']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>5. </td>
            <td>Pengikut /Anggota Keluarga</td>
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
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">NIK</div></td>
                <td width="1%">&nbsp;</td>
                <td width="12%" bgcolor="#CCCCCC" class="kotak"><div align="center">Jenis Kelamin</div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Tempat Lahir </div></td>
                <td width="1%">&nbsp;</td>
                <td width="20%" bgcolor="#CCCCCC" class="kotak"><div align="center">Tanggal Lahir </div></td>
                <td width="1%">&nbsp;</td>
                <td width="44%" bgcolor="#CCCCCC" class="kotak"><div align="center">Hubungan Dengan Pemohon </div></td>
              </tr>
              
              <?php
              while($show = mysqli_fetch_array($ubahquery)){
            ?>
              <tr>
                <td class="kotak"><?php echo $show['id']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['nama_lengkap']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['nik']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['jenis_kelamin']; ?></td>
                <td>&nbsp;</td>
                <td class="kotak"><?php echo $show['tempat_lahir']; ?> </td>
                <td>&nbsp;</td>
                <td class="kotak"> <?php echo $show['tgl_lahir']; ?> </td>
                <td>&nbsp;</td>
                <td class="kotak"> <?php echo $show['status_hubungan_keluarga']; ?> </td>
              </tr>
              <?php } ?>
            </table>

            <table width="100%"  border="0">
                
         
                <tr>
                  <td width="25%"><p align="center"></p>
                    <p align="center">&nbsp;</p>
                    <p align="center"><br>
                    (NIP________________________) </p>    </td>
                  <td width="50%"><p align="center">Mengetahui:<br>Petugas Registrasi</p>
                    <p align="center">&nbsp;</p>
                    <p align="center">(________________________)</p></td>
                    <p align="center"></p> </td>
                  <td width="24%"><p align="center"><?php echo ucwords(strtolower( $hasil['desa'])); ?></p>
                    <p align="center">Pemohon&nbsp;</p>
                    <p align="center">&nbsp;</p>
                   
                  <p align="center">(________________________)</p></td>
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