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
LEFT OUTER JOIN t_batal_pindah c ON a.penduduk_detail_id = c.penduduk_detail_id
 LEFT OUTER JOIN l_desa d ON a.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and a.desa_id =  $desa_id ";
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
SELECT *, m.agama as agama FROM t_batal_pindah as z
left outer join m_penduduk as m on z.nik_pemohon = m.nik
left outer join l_desa as d on d.desa_id = m.desa_id
left outer join agama_master as e on e.no = z.pemohon_agama
left outer join pkrjn_master as f on f.no = z.pemohon_pekerjaan
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
    <title>SURAT PERNYATAAN BATAL PINDAH</title>
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


<div style="font-size:18px">&nbsp;
    <center><b>SURAT PERNYATAAN BATAL PINDAH</b></center></div>
    <hr color="#000000" size="3" width="100%" />
  
   <p>Yang bertanda tangan di bawah ini :</p>
   <table width="100%" border="0">
    
        <tr>
            <td width="1%"></td>
            <td width="1%"> </td>
            <td width="23%">Nama</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_pemohon']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Tempat dan Tanggal</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_tmpt_lhr']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_agama']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?php echo $hasil['pemohon_pekerjaan']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $hasil['kel_tujuan']; ?> Rt. <?php echo $hasil['rt_tujuan']; ?> / Rw.<?php echo $hasil['rw_tujuan']; ?>  Desa/Kelurahan <?php echo $hasil['kel_tujuan']; ?>  
            Kecamatan <?php echo $hasil['kec_tujuan']; ?> 
          Kabupaten/Kota  <?php echo $hasil['kab_tujuan']; ?> Propinsi  <?php echo $hasil['prop_tujuan']; ?> </td>
        </tr>
        
       
 
    </table>
    <p>Menyatakan dengan sebenar-benarnya nama(-nama) berikut batal Pindah Pindah dari Kabupaten Banyumas dengan
alamat tujuan Rt. Rw. Desa/Kelurahan Kecamatan Kab/Kota Provinsi dan belum membuat KK dan KTP di daerah
tujuan dan daerah manapun serta surat pindah asli dikembalikan ke Kabupaten Banyumas untuk proses KK dan KTP
baru.</p>
<p><b>Adapun nama(-nama) tersebut adalah sebagai berikut:</b></p>
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

    
    <p>Demikian pernyataan ini saya buat dengan sebenar-benarnya, <b><u>apabila di kemudian hari terbukti bahwa pernyataan
ini palsu, maka kami menerima sanksi hukum sesuai peraturan perundang-undangan yang berlaku.</b></u></p>


<table width="100%"  border="0">
            
            <tr>
              <td width="60%" bordercolor="#000000">&nbsp;</td>
              <td width="40%" bordercolor="#000000"><p align="center"><?php echo $hasil['kab_asal']; ?>,</p>
                <p align="center">Yang Membuat Pernyataan,<br> <br>Materai<br>
Rp: 6000   </p>
        
                <p align="center">&nbsp;</p>
                <p align="center"><u>(...........................................)</u><br>
                </p></td>
            </tr>
          </table>
          <table width="100%"  border="0">
              
              <tr>
                <td colspan="3"><div align="center">Mengetahui : </div></td>
              </tr>
              <tr>
                <td width="27%"><p align="center">Ketua RT</p>
                  <p align="center">&nbsp;</p>
                  <p align="center">_____________________________________<br>
                 </p>      </td>

                 <td width="27%"><p align="center"></p>
                  <p align="center">&nbsp;</p>
                  <p align="center"><?php echo $hasil['pejabat_nama']; ?>
                 </p>      </td>
                <td width="28%"><p align="center">Camat <?php echo ucwords(strtolower( $hasil['desa'])); ?></p>
                  <p align="center">&nbsp;</p>
                  <p align="center">_____________________________________<br>
                 </p>    </td>
              </tr>
            </table>

            <p><b>Undang-undang nomor 23 Tahun 2006 pasal 97 sebagaimana telah diadakan perubahan dalam UU No 24 Tahun<br>
2013.</b> Setiap penduduk yang dengan sengaja mendaftarkan diri sebagai <b>Kepala Keluarga atau anggota keluarga lebih<br>
dari satu </b> KK atau memiliki KTP lebih dari satu dipidana dengan pidanan penjara paling lama 2(dua) tahun dan atau<br>
denda paling banyak <b>Rp. 25.000.000,00 (dua puluh lima juta rupiah)</b></p>


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