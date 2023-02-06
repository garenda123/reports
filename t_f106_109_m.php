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
LEFT OUTER JOIN t_f106_109_m c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array

$query = "
SELECT *, shdk.descrip as stat_hbkel FROM t_f106_109_d 
LEFT OUTER JOIN shdk ON shdk.no = t_f106_109_d.stat_hbkel 
where penduduk_detail_id = $penduduk_detail_id
"; //untuk ambil data keluarga

$query2 = "
SELECT * FROM t_f106_109_m 

where penduduk_detail_id = $penduduk_detail_id
"; //untuk ambil data pemohon

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$pendidikan = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$agama = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SURAT PERNYATAAN PERUBAHAN ELEMEN DATA KEPENDUDUKAN</title>
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
                <div align="center"><strong>F-1.06</strong></div>
            </td>
        </tr>
    </table>
    <div style="font-size:18px">&nbsp;
        <center><b>SURAT PERNYATAAN PERUBAHAN ELEMEN DATA KEPENDUDUKAN</b></center>
    </div>
    <br>

    <p>Yang bertanda tangan di bawah ini :</p>
    <table width="100%" border="0">

        <tr>
            <td width="1%"></td>
            <td width="1%"></td>
            <td width="23%">Nama lengkap</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['nama_pelapor']; ?></td>

        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $ttd['nik_pelapor']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td> </td>
            <td>Nomor KK</td>
            <td>:</td>
            <td><?php echo $ttd['no_kk']; ?></td>
        </tr>

        <tr>
            <td></td>
            <td> </td>
            <td>Alamat rumah</td>
            <td>:</td>
            <td><?php echo $ttd['alamat']; ?> RT: <?php echo $ttd['no_rt']; ?> / RW<?php echo $ttd['no_rw']; ?></td>
        </tr>



    </table>

    <p>dengan rincian KK sebagai berikut :</p>
    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td width="2%" align="center">No.</td>
            <td width="10%" align="center">Nama</td>
            <td width="5%" align="center">NIK</td>
            <td width="10%" align="center">SHDK</td>
            <td width="15%" align="center">Keterangan</td>


        </tr>
        <?php
              while($show = mysqli_fetch_array($ubahquery)){
                @$coba1++;
            ?>
        <tr>
            <td class="kotak"><?php echo $coba1; ?></td>
            <td class="kotak"><?php echo $show['nama_lgkp']; ?></td>
            <td class="kotak"><?php echo $show['nik']; ?></td>
            <td class="kotak"><?php echo $show['stat_hbkel']; ?></td>
            <td class="kotak"><?php echo $show['keterangan']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <p>Menyatakan bahwa data elemen data kependudukan saya dan anggota keluarga saya telah berubah, dengan rincian:</p>
    <p>A.Pendidikan dan Pekerjaan:</p>
    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td rowspan="3" width="5%" align="center">No.</td>
            <td colspan="6" align="center">Elemen Data</td>
            <td rowspan="3" align="center" width="10%">Keterangan</td>
        </tr>
        <tr>

            <td colspan="3" align="center" width="50%">Pendidikan Terakhir</td>

            <td colspan="3" align="center">Pekerjaan</td>


        </tr>
        <tr>

            <td width="15%" align="center">Semula</td>
            <td width="15%" align="center">Menjadi</td>
            <td width="15%" align="center">Dasar Perubahan</td>
            <td width="15%" align="center">Semula</td>
            <td align="center">Menjadi</td>
            <td align="center">Dasar Perubahan</td>




        </tr>
        <?php
              while($pend = mysqli_fetch_array($pendidikan)){
                @$coba2++;
            ?>

        <tr>
            <td><?php echo $coba2; ?></td>
            <td><?php echo $pend['pddk_awl']; ?></td>
            <td><?php echo $pend['pddk_akh']; ?></td>
            <td><?php echo $pend['pddk_dasar']; ?></td>
            <td><?php echo $pend['pkrjn_awl']; ?></td>
            <td><?php echo $pend['pkrjn_akh']; ?></td>
            <td><?php echo $pend['pkrjn_dasar']; ?></td>
            <td class="kotak"><?php echo $pend['keterangan_pddk']; ?></td>
        </tr>
        <?php } ?>

    </table>
    <p>B. Agama dan Perubahan Lainnya</p>

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td rowspan="3" width="5%" align="center">No.</td>
            <td colspan="6" align="center">Elemen Data</td>
            <td rowspan="3" align="center" width="10%">Keterangan</td>
        </tr>
        <tr>

            <td colspan="3" align="center" width="50%">Agama</td>

            <td colspan="3" align="center">Lainnya, yaitu:</td>


        </tr>
        <tr>

            <td width="15%" align="center">Semula</td>
            <td width="15%" align="center">Menjadi</td>
            <td width="15%" align="center">Dasar Perubahan</td>
            <td width="15%" align="center">Semula</td>
            <td align="center">Menjadi</td>
            <td align="center">Dasar Perubahan</td>
        </tr>
        
        <?php
              while($aga = mysqli_fetch_array($agama)){
                @$coba3++;
            ?>
        <tr>
            <td><?php echo $coba3; ?></td>
            <td><?php echo $aga['agama_awl']; ?></td>
            <td><?php echo $aga['agama_akh']; ?></td>
            <td><?php echo $aga['agama_dasar']; ?></td>
            <td><?php echo $aga['lainnya_awl']; ?></td>
            <td><?php echo $aga['lainnya_akh']; ?></td>
            <td><?php echo $aga['lainnya_dasar']; ?></td>
            <td><?php echo $aga['keterangan_lainnya']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <p>Terlampir disampaikan fotokopi berkas-berkas yang terkait dengan perubahan elemen data tersebut.
        Demikian Surat Pernyataan ini saya buat dengan sebenarnya, apabila dalam keterangan yang saya berikan terdapat
        hal-hal yang
        tidak berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan peraturan
        perundang-undangan
        yang berlaku.</p>

    <table width="100%" border="0">

        <tr>
            <td width="60%" bordercolor="#000000">&nbsp;</td>
            <td width="40%" bordercolor="#000000">
                <p align="center"><br>
                    <?php echo ucwords(strtolower($ttd['alamat'])); ?>, <?php echo tanggal($ttd['tgl_entri']); ?>
                    <br>
                    Yang membuat pernyataan,
                </p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Materai<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cukup
                </p>
                <p align="center">&nbsp;</p>
                <p align="center">(<?php echo $ttd['nama_pelapor']; ?>)<br>
                </p>
            </td>
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