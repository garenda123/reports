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
LEFT OUTER JOIN t_f102 c ON a.penduduk_detail_id = c.penduduk_detail_id
-- LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = $penduduk_detail_id and desa_id =  $desa_id ";
//print $query; kuwe ki query bahasa SQL dilebokna meng variabel query

$tampil = mysqli_query($koneksi, $scriptQuery) or die ("Gagal Query".mysqli_error());
$hasil = mysqli_fetch_array($tampil); //perintahkan ke mysqli untuk ambil data atau fetch dalam bentuk array




?>

<!DOCTYPE html>
<html>

<head>
    <title>FOLMULIR PENDAFTARAN PERISTIWA KEPENDUDUKAN</title>
    <style>
    body {
        font-size: 13px;
    }

    .table-collapse {
        border-collapse: collapse;
    }

    .huruf {
        z-index: -5;
        position: relative;
        display: block;
    }

    .huruf .img {
        display: block;
        position: absolute;
        margin-top: -7px;
        margin-left: -14px;
        z-index: 5;
    }
    </style>
</head>

<body>

    <table width="10%" border="1" align="right" class="table-collapse">
        <tr>
            <td>
                <div align="center"><strong>F-1.02</strong></div>
            </td>
        </tr>
    </table>

    <center><b>FOLMULIR PENDAFTARAN PERISTIWA KEPENDUDUKAN</b></center>
    <br>

    <table width="100%" border="0">
        <tr>
            <td>I.</td>
            <td colspan="4">DATA PEMOHON</td>
        </tr>
        <tr>
            <td width="1%"></td>
            <td width="1%">1. </td>
            <td width="30%">Nama Lengkap</td>
            <td width="1%">:</td>
            <td><?php echo $hasil['nama_lgkp']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>2. </td>
            <td>Nomor Induk Kependudukan</td>
            <td>:</td>
            <td><?php echo $hasil['nik']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>3. </td>
            <td>Nomor Kartu Keluarga</td>
            <td>:</td>
            <td><?php echo $hasil['no_kk']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>4. </td>
            <td>Nomor Handphone</td>
            <td>:</td>
            <td><?php echo $hasil['no_hp']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>5. </td>
            <td>Alamat Email</td>
            <td>:</td>
            <td><?php echo $hasil['email']; ?></td>
        </tr>
    </table>
    <br>

    <table width="100%" border="0">
        <tr>
            <td width="1%">II.</td>
            <td>JENIS PERMOHONAN</td>
        </tr>
    </table>

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <th width="5%" align="center">
                <?php if ($hasil['kk'] == 'Y') { ?>
                <div class="huruf">
                    I
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                I
                <?php } ?>
            </th>
            <th width="20%">KARTU KELUARGA</th>
            <th width="5%" align="center">
                <?php if ($hasil['ktp'] == 'Y') { ?>
                <div class="huruf">
                    II
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                II
                <?php } ?>
            </th>
            <th width="20%">KTP EL</th>
            <th width="5%" align="center">
                <?php if ($hasil['kia'] == 'Y') { ?>
                <div class="huruf">
                    II
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                II
                <?php } ?>
            </th>
            <th width="20%">KARTU IDENTITAS ANAK / KIA</th>
            <th width="5%" align="center">
                <?php if ($hasil['perubahan_data'] == 'Y') { ?>
                <div class="huruf">
                    II
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                II
                <?php } ?>
            </th>
            <th width="20%">PERUBAHAN DATA</th>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1') { ?>
                <div class="huruf">
                    A
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                A
                <?php } ?>
            </td>
            <td>BARU</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '1') { ?>
                <div class="huruf">
                    A
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                A
                <?php } ?>
            </td>
            <td>BARU</td>
            <td align="center">
                <?php if ($hasil['jenis_kia'] == '1') { ?>
                <div class="huruf">
                    A
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                A
                <?php } ?>
            </td>
            <td>BARU</td>
            <td align="center">
                <?php if ($hasil['jenis_perubahan'] == '1') { ?>
                <div class="huruf">
                    A
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                A
                <?php } ?>
            </td>
            <td>KK</td>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1' and $hasil['sebab_kk'] == '1') { ?>
                <div class="huruf">
                    1.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                1.
                <?php } ?>
            </td>
            <td>Membentuk Keluarga Baru</td>
            <td align="center"></td>
            <td></td>
            <td align="center"></td>
            <td></td>
            <td align="center"></td>
            <td></td>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1' and $hasil['sebab_kk'] == '2') { ?>
                <div class="huruf">
                    2.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                2.
                <?php } ?>
            </td>
            <td>Pergantian Kepala Keluarga</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '2') { ?>
                <div class="huruf">
                    B
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                B
                <?php } ?>
            </td>
            <td>PINDAH DATANG</td>
            <td align="center">
                 <?php if ($hasil['jenis_kia'] == '2') { ?>
                <div class="huruf">
                    B
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                B
                <?php } ?>
            </td>
            <td>HILANG/ RUSAK</td>
            <td align="center">
            <?php if ($hasil['jenis_perubahan'] == '2') { ?>
                <div class="huruf">
                    B
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                B
                <?php } ?>
            </td>
            <td>KTP-EL</td>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1' and $hasil['sebab_kk'] == '3') { ?>
                <div class="huruf">
                    3.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                3.
                <?php } ?>
            </td>
            <td>Pisah KK</td>
            <td align="center"></td>
            <td></td>
            <td align="center">
            <?php if ($hasil['jenis_kia'] == '2' and $hasil['sebab_kia'] == '1') { ?>
                <div class="huruf">
                    1.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                1.
                <?php } ?>
            </td>
            <td>HILANG</td>
            <td align="center"></td>
            <td></td>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1' and $hasil['sebab_kk'] == '4') { ?>
                <div class="huruf">
                    4.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                4.
                <?php } ?>
            </td>
            </td>
            <td>Pindah Datang</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '3') { ?>
                <div class="huruf">
                    C
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                C
                <?php } ?>
            </td>
            <td>HILANG/ RUSAK</td>
            <td align="center">
            <?php if ($hasil['jenis_kia'] == '2' and $hasil['sebab_kia'] == '2') { ?>
                <div class="huruf">
                    2.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                2.
                <?php } ?>
            </td>
            <td>RUSAK</td>
            <td align="center">
            <?php if ($hasil['jenis_perubahan'] == '3') { ?>
                <div class="huruf">
                    C
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                C
                <?php } ?>
            </td>
            <td>KIA</td>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1' and $hasil['sebab_kk'] == '5') { ?>
                <div class="huruf">
                    5.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                5.
                <?php } ?>
            </td>
            <td>WNI dari LN Karna Pindah</td>
            <td align="center">
            <?php if ($hasil['jenis_ktp'] == '3' and $hasil['sebab_ktp'] == '1') { ?>
                <div class="huruf">
                    1.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                1.
                <?php } ?>
            </td>
            <td>HILANG</td>
            <td align="center"></td>
            <td></td>
            <td align="center" rowspan="9"></td>
            <td rowspan="9" valign="top">Melampirkan :
                <br>
                1.Formulir perubahan data
                <br>
                2.Bukti perubahan data

            </td>
        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '1' and $hasil['sebab_kk'] == '6') { ?>
                <div class="huruf">
                    6.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                6.
                <?php } ?>
            </td>
            <td>Rentan Adminduk</td>
            <td align="center">
            <?php if ($hasil['jenis_ktp'] == '3' and $hasil['sebab_ktp'] == '2') { ?>
                <div class="huruf">
                    2.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                2.
                <?php } ?>
            </td>
            <td>RUSAK</td>
            <td align="center">
            <?php if ($hasil['jenis_kia'] == '3') { ?>
                <div class="huruf">
                    C
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                C
                <?php } ?>
            </td>
            <td>Perpanjangan ITAP</td>


        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '2') { ?>
                <div class="huruf">
                    B
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                B
                <?php } ?>
            </td>
            <td>PERUBAHAN DATA</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '2' and $hasil['sebab_kk'] == '1') { ?>
                <div class="huruf">
                    1.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                1.
                <?php } ?>
            </td>
            <td>Menumpang dalam KK</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '4') { ?>
                <div class="huruf">
                    D
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                D
                <?php } ?>
            </td>
            <td>Perpanjangan ITAP</td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td align="center">2.</td>
            <td>Peristiwa Penting</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '5') { ?>
                <div class="huruf">
                    E
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                E
                <?php } ?>
            </td>
            <td>Perubahan Status Kewarganegaraan</td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td align="center">3.</td>
            <td>Perubahan element data yang tercantum dalam KK</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '6') { ?>
                <div class="huruf">
                    F
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                F
                <?php } ?>
            </td>
            <td>Luar Domisili</td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td align="center"><?php if ($hasil['jenis_kk'] == '3') { ?>
                <div class="huruf">
                    C
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                C
                <?php } ?>
            </td>
            <td>HILANG/ RUSAK</td>
            <td align="center"></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '3' and $hasil['sebab_kk'] == '1') { ?>
                <div class="huruf">
                    1.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                1.
                <?php } ?>
            </td>
            <td>Hilang</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        <tr>
            <td align="center">
                <?php if ($hasil['jenis_kk'] == '3' and $hasil['sebab_kk'] == '2') { ?>
                <div class="huruf">
                    2.
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                2.
                <?php } ?>
            </td>
            <td>Rusak</td>
            <td align="center">
                <?php if ($hasil['jenis_ktp'] == '7') { ?>
                <div class="huruf">
                    G
                    <img src="img/circle.png" class="img" alt="l" width="30px">
                </div>
                <?php } else { ?>
                G
                <?php } ?>
            </td>
            <td>Transmigrasi</td>
            <td></td>
            <td></td>

        </tr>


    </table>
    <br>

    <table width="100%" border="1">
        <tr>
            <td width="1%">III.</td>
            <td colspan="4"> PERSYARATAN YANG DILAMPIRKAN</td>
            <tr>
            <td></td>
            <td valign="top" width="1%">
                o
            </td>
            <td valign="top" width="30%">KK Lama/KK Rusak</td>
            <td valign="top" width="1%">
                o
            </td>
            <td valign="top" width="45%">Surat Keterangan/ Bukti Perubahan Peristiwa Kependudukan dan Peristiwa penting
            </td>
        <tr>
            
        <tr>
            <td></td>
            <td valign="top" width="1%">
                o
            </td>
            <td valign="top" width="30%">KK Lama/KK Rusak</td>
            <td valign="top" width="1%">
                o
            </td>
            <td valign="top" width="45%">Surat Keterangan/ Bukti Perubahan Peristiwa Kependudukan dan Peristiwa penting
            </td>
        <tr>
            <td></td>
            <td valign="top">
                o
            </td>
            <td valign="top">Buku Nikah/ Kutipan Akta Perkawinan</td>
            <td valign="top">
            o
            </td>
            <td valign="top">STPJM Perkawinan/ Perceraian belum tercatat</td>
        <tr>
            <td></td>
            <td valign="top">
                o
            </td>
            <td valign="top">Kutipan Akta Perceraian</td>
            <td valign="top">
            o
            </td>
            <td valign="top">Akta Kematian</td>
        <tr>
            <td></td>
            <td valign="top">
            o
            </td>
            <td valign="top">Surat Keterangan Pindah</td>
            <td valign="top">
            o
            </td>
            <td valign="top">Surat Penyebab terjadinya hilang/ rusak</td>
        <tr>
            <td></td>
            <td valign="top">
            o
            </td>
            <td valign="top">Surat Keterangan Pindah Luar Negeri</td>
            <td valign="top">
            o
            </td>
            <td valign="top">Surat keterangan pindah dari perwakilan RI</td>
        <tr>
            <td></td>
            <td valign="top">
            o
            </td>
            <td valign="top">KTP-EI Rusak</td>
            <td valign="top">
            o
            </td>
            <td valign="top">Surat Pernyataan Bersedia Menerima Sebagai Anggota Keluarga</td>
        <tr>
            <td></td>
            <td valign="top">
            o
            </td>
            <td valign="top">Dokumen Perjalanan</td>
            <td valign="top"> o</td>
            <td valign="top">Surat kuasa pengasuhan dari orang tua/ wali</td>
        <tr>
            <td></td>
            <td valign="top"> o </td>
            <td valign="top">Surat Keterangan Hilang Dari Kepolisian</td>
            <td valign="top">
            o
            </td>
            <td valign="top">Kartu Izin Tetap Tinggal</td>
    </table>

    <table width="100%" border="0">

        <tr>
            <td width="50%">
                <br>
                <p align="center">Petugas</p>
                <br>
                <br>
                <p align="center"><u>(<?php echo $hasil['pejabat_nama']; ?>)</u> </p>
            </td>
            <td width="50%">
                <p align="center">BANYUMAS, <br><br>
                    Pemohon</p>
                <br>
                <br>
                <p align="center"><u>(<?php echo $hasil['nama_lgkp']; ?>)</u></p>
                <p align="center"><br>
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