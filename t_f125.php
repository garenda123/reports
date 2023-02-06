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
LEFT OUTER JOIN t_kuasa c ON a.penduduk_detail_id = c.penduduk_detail_id
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
SELECT * FROM t_pindah_datang a
LEFT OUTER JOIN klasifikasi_pindah b ON b.no = a.klasifikasi
where penduduk_detail_id = $penduduk_detail_id
"; //untuk ambil data pemohon

$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);
?>

<!DOCTYPE html>
<html>

<head>
    <title>FOLMULIR PERMOHONAN PINDAH WNI</title>
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

        <?php if ($ttd['klasifikasi'] == 2) { ?>
        <tr>
            <td width="30%">
                <div align="center"><strong>F-1.25</strong></div>

            </td>

        </tr>
        <?php } else { ?>
        &nbsp;
        <?php } ?>

        <?php if ($ttd['klasifikasi'] == 3) { ?>
        <tr>
            <td>
                <div align="center"><strong>F-1.29</strong></div>
            </td>


        </tr>
        <?php } else { ?>
        &nbsp;
        <?php } ?>

        <?php if ($ttd['klasifikasi'] == 4) { ?>
        <tr>
            <td>
                <div align="center"><strong>F-1.34</strong></div>
            </td>


        </tr>
        <?php } else { ?>
        &nbsp;
        <?php } ?>
    </table>

    <br><br>


    <table border=0 class="header" style="width: 100%;">
        <tr>
            <td width="41%"><strong>PEMERINTAH PROPINSI</strong></td>
            <td width="1%">:</td>
            <td width="2%" class="kotak"></td>
            <td width="11%">&nbsp;</td>
            <td width="45%" class="kotak"><?php echo $ttd['prop_asal']; ?></td>
        <tr>
            <td><strong>PEMERINTAH KABUPATEN/KOTA</strong></td>
            <td>:</td>
            <td class="kotak"></td>
            <td>&nbsp;</td>
            <td class="kotak"><?php echo $ttd['kab_asal']; ?></td>
        <tr>
            <td><strong>KECAMATAN</strong></td>
            <td>:</td>
            <td class="kotak"></td>
            <td>&nbsp;</td>
            <td class="kotak"><?php echo $ttd['kec_asal']; ?></td>
        <tr>
            <td><strong>KELURAHAN/DESA</strong></td>
            <td>:</td>
            <td class="kotak"></td>
            <td>&nbsp;</td>
            <td class="kotak"><?php echo $ttd['kel_asal']; ?></td>

    </table>
    <div style="font-size:18px">&nbsp;
    <p align="center">FOLMULIR PERMOHONAN PINDAH WNI</p></div>
    <P align="center"> <?php echo $ttd['descrip']; ?></P>
    <p align="center">No :<?php echo $ttd['no_surat']; ?></p>

    <table width="100%" border="0">
        <tr>

            <td colspan="4">DATA DAERAH ASAL</td>
        </tr>
        <tr>

            <td width="1%">1. </td>
            <td width="30%">Nomor Kartu Keluarga</td>
            <td width="1%">:</td>
            <td width="40%"><?php echo $ttd['no_kk_asal']; ?></td>
        </tr>
        <tr>

            <td>2. </td>
            <td>Nama Kepala Keluarga</td>
            <td>:</td>
            <td><?php echo $ttd['nama_kep_asal']; ?></td>
        </tr>
        <tr>

            <td>3. </td>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $ttd['alamat_asal']; ?> </td>
            <td>Rt: <?php echo $ttd['rt_asal']; ?></td>
            <td> Rw:
                <?php echo $ttd['rw_asal']; ?></td>

        </tr>

        <tr>

            <td></td>
            <td> a.Desa/Kelurahan</td>
            <td>:</td>
            <td> <?php echo $ttd['kel_asal']; ?></td>
            <td>c.Kabupaten/Kota</td>
            <td><?php echo $ttd['kab_asal']; ?></td>


        </tr>

        <tr>

            <td></td>
            <td> b.Kecamatan </td>
            <td>:</td>
            <td> <?php echo $ttd['kec_asal']; ?></td>
            <td>d.Propinsi</td>
            <td><?php echo $ttd['prop_asal']; ?></td>
        </tr>

        <tr>

            <td></td>
            <td>Kode pos </td>
            <td>:</td>
            <td> <?php echo $ttd['kodepos_asal']; ?> </td>
            <td>Telepon</td>
            <td><?php echo $ttd['telp_asal']; ?></td>
        </tr>

        <tr>

            <td>4. </td>
            <td>Nik Pemohon </td>
            <td>:</td>
            <td><?php echo $ttd['nik_pemohon']; ?></td>
        </tr>
        <tr>

            <td>5. </td>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $ttd['nama_kep_asal']; ?></td>
        </tr>
    </table>

    <table width="100%" border="0">
        <tr>

            <td colspan="4">DATA DAERAH</td>
        </tr>

        <tr>

            <td width="1%">1. </td>
            <td width="30%">Status Nomor KK Bagi Yang Pindah</td>
            <td width="1%">:</td>
            <td>
                <table width="100%" border="0">
                    <tr>
                        <td widht="5%">
                            <table width="100%" border="1" class="table-collapse">
                                <tr>
                                    <td>
                                        <?php if ($ttd['status_kk'] == 1) { ?>
                                        <img src="img/centang.png" alt="logo garut" width="30px">
                                        <?php } else { ?>
                                        &nbsp;
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="95%"> 1.Numpang KK</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="1" class="table-collapse">
                                <tr>
                                    <td>
                                        <?php if ($ttd['status_kk'] == 2) { ?>
                                        <img src="img/centang.png" alt="logo garut" width="30px">
                                        <?php } else { ?>
                                        &nbsp;
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td> 2.Membuat KK baru</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="1" class="table-collapse">
                                <tr>
                                    <td>
                                        <?php if ($ttd['status_kk'] == 3) { ?>
                                        <img src="img/centang.png" alt="logo garut" width="30px">
                                        <?php } else { ?>
                                        &nbsp;
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td> 3.No KK tetap</td>
                    </tr>


                </table>
            </td>
        </tr>
        <tr>

            <td>2. </td>
            <td>Nomor Kartu Keluarga</td>
            <td>:</td>
            <td><?php echo $ttd['no_kk_tujuan']; ?></td>
        </tr>
        <tr>

            <td>3. </td>
            <td>NIK Kepala Keluarga</td>
            <td>:</td>
            <td><?php echo $ttd['nik_kk_tujuan']; ?></td>
        </tr>
        <tr>

            <td>4. </td>
            <td>Nama Kepala Keluarga </td>
            <td>:</td>
            <td><?php echo $ttd['nama_kk_tujuan']; ?></td>
        </tr>
        <tr>

            <td>5. </td>
            <td>Tanggal Kedatangan</td>
            <td>:</td>
            <td><?php echo $ttd['tgl_datang']; ?></td>
        </tr>

        <tr>

            <td>6. </td>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $ttd['alamat_tujuan']; ?>
            <td>Rt: <?php echo $ttd['rt_tujuan']; ?></td>
            <td> Rw:
                <?php echo $ttd['rw_tujuan']; ?></td>
        </tr>
        <tr>

            <td></td>
            <td> a.Desa/Kelurahan</td>
            <td>:</td>
            <td> <?php echo $ttd['kel_tujuan']; ?></td>
            <td>c.Kabupaten/Kota</td>
            <td><?php echo $ttd['kab_tujuan']; ?></td>

        </tr>

        <tr>

            <td></td>
            <td> b.Kecamatan </td>
            <td>:</td>
            <td> <?php echo $ttd['kec_tujuan']; ?></td>
            <td>d.Propinsi</td>
            <td><?php echo $ttd['prop_tujuan']; ?></td>

        </tr>

        <tr>
            <td></td>
            <td>Kode pos </td>
            <td>:</td>
            <td> <?php echo $ttd['kodepos_tujuan']; ?> </td>
            <td>Telepon</td>
            <td><?php echo $ttd['telp_tujuan']; ?></td>

        </tr>
        <tr>

            <td>7. </td>
            <td>Keluarga Yang Datang</td>
            <td>:</td>
            <td></td>
        </tr>

    </table>
    <table width="100%" border="0">

        <tr>
            <td width="5%" bgcolor="#CCCCCC" class="kotak">
                <div align="center">No.</div>
            </td>
            <td width="1%">&nbsp;</td>
            <td width="36%" bgcolor="#CCCCCC" class="kotak">
                <div align="center">NIK</div>
            </td>
            <td width="1%">&nbsp;</td>
            <td width="44%" bgcolor="#CCCCCC" class="kotak">
                <div align="center">Nama Lengkap </div>
            </td>
            <td width="1%">&nbsp;</td>
            <td width="44%" bgcolor="#CCCCCC" class="kotak">
                <div align="center">Masa Berlaku KTP S/D</div>
            </td>
            <td width="1%">&nbsp;</td>
            <td width="12%" bgcolor="#CCCCCC" class="kotak">
                <div align="center">SHDK*)</div>
            </td>
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
            <td class="kotak"></td>
            <td>&nbsp;</td>
            <td class="kotak"><?php echo $show['status_hubungan_keluarga']; ?></td>
        </tr>
        <?php } ?>
    </table>


    <table width="100%" border="0">

        <tr>
            <td colspan="4">
                <div align="center"></div>
            </td>
        </tr>
        <tr>
            <td width="25%">
                <p align="center"></p>
                <p align="center">&nbsp;</p>
                <p align="center"><br>
                </p>
            </td>
            <td width="25%">
                <p align="center"></p>
                <p align="center">&nbsp;</p>
                <p align="center"><br>
                </p>
            </td>
            <td width="26%">
                <p align="center"></p>
                <p align="center">&nbsp;</p>
                <p align="center"><br>
                </p>
            </td>
            <td width="24%">
                <p align="center">Karantalun kidul </p>
                <p align="center">Dikeluarkan oleh:&nbsp;</p>
                <p align="center">a.n Kepala Dinas Kependudukan
                    dan<br> Pencatatan Sipil&nbsp;</p>
                <p align="center">Kepala Desa Karantalun kidul&nbsp;</p>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
                <p align="center">()</p>
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