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

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());


$query2 = "
SELECT * FROM t_f101 a
LEFT OUTER JOIN tipe_input_master b ON b.id_input = a.tipe_input
where penduduk_detail_id = $penduduk_detail_id
"; //untuk ambil data pemohon

$ubahquery = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());

$ubahquery2 = mysqli_query($koneksi, $query2) or die ("Gagal Query".mysqli_error());
$ttd = mysqli_fetch_array($ubahquery2);

$ubahquery3 = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery4 = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery5 = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
$ubahquery6 = mysqli_query($koneksi, $query) or die ("Gagal Query".mysqli_error());
?>

<!DOCTYPE html>
<html>

<head>
    <title>FOLMULIR BIODATA KELUARGA</title>
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
                <div align="center"><strong>F-1.01</strong></div>
            </td>
        </tr>
    </table>
    <div style="font-size:18px">&nbsp;
    <center><b>FOLMULIR BIODATA KELUARGA</b></center></div>
    <br>

    <p>PERHATIAN : Isilah Folmulir ini dengan huruf cetak dan jelas serta mengikuti "TATA CATA PENGISIAN FOLMULIR"</p>
    <p>pilih salah satu :</p>

    <table width="100%" border="0">
        <tr>
            <td widht="5%">
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($ttd['id_input'] == 1) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="95%"> 1. Input Data Kepala Keluarga dan Anggota Keluarga WNI</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($ttd['id_input'] == 2) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 2. Input Data Kepala Keluarga dan Anggota Keluarga Orang Asing</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="table-collapse">
                    <tr>
                        <td>
                            <?php if ($ttd['id_input'] == 3) { ?>
                                <img src="img/centang.png" alt="logo garut" width="30px">
                            <?php } else { ?>
                            &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td> 3. Input Data Kepala Keluarga dan Anggota Keluarga WNI di luar Negeri</td>
        </tr>
    

    </table>

    <b>DATA KEPALA KELUARGA</b>
    <table width="100%" border="0">

        <tr>

            <td width="1%">1. </td>
            <td width="45%">Nama Kepala Keluarga/Name of Head of the Family</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['nama_kep']; ?></td>
        </tr>
        <tr>

            <td>2. </td>
            <td>Alamat/ Addres</td>
            <td>:</td>
            <td><?php echo $ttd['alamat']; ?></td>
        </tr>
        <tr>

            <td>3. </td>
            <td>Kode Post/ Post Code</td>
            <td>:</td>
            <td><?php echo $ttd['kode_pos']; ?> / RT : <?php echo $ttd['no_rt']; ?>/ RW : <?php echo $ttd['no_rw']; ?>/  Jumlah Anggota Keluarga: <?php echo $ttd['jml_anggota']; ?></td>
        </tr>
        <tr>

            <td>4. </td>
            <td>Telepon</td>
            <td>:</td>
            <td><?php echo $ttd['telp']; ?></td>
        </tr>
        <tr>

            <td>5. </td>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $ttd['email']; ?></td>
        </tr>

    </table>

    <p>Kode Wilayah Diisi Oleh Petugas Kependudukan dan Pencatatan sipil</p>

    <b>DATA WILAYAH</b>

    <table width="100%" border="0">

        <tr>

            <td width="1%">8. </td>
            <td width="45%">Kode-Nama Provinsi/Code-Province</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['no_prop']; ?></td>
        </tr>
        <tr>

            <td>9. </td>
            <td>Kode-Nama Kabupaten/Kota/Code-Regency/Municipality</td>
            <td>:</td>
            <td><?php echo $ttd['no_kab']; ?></td>
        </tr>
        <tr>

            <td>10. </td>
            <td>Kode- Nama Kecamatan/Code-Sub District</td>
            <td>:</td>
            <td><?php echo $ttd['no_kec']; ?></td>
        </tr>
        <tr>

            <td>11. </td>
            <td>Kode- Nama Kelurahan/Desa/Code-Village</td>
            <td>:</td>
            <td><?php echo $ttd['no_kel']; ?></td>
        </tr>
        <tr>

            <td>12. </td>
            <td>Nama Dusun/Dukuh/Kampung/Sub -Village</td>
            <td>:</td>
            <td><?php echo $ttd['dusun']; ?></td>
        </tr>

    </table>

    <p>Alamat di Luar Negeri (diisi oleh WNI di luar negeri)</p>
    <table width="100%" border="0">

        <tr>

            <td width="1%">1. </td>
            <td width="25%">Alamat/ Addres</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['alamat_ln']; ?></td>
        </tr>
        <tr>

            <td>2. </td>
            <td>Kota</td>
            <td>:</td>
            <td><?php echo $ttd['kota_ln']; ?></td>
        </tr>
        <tr>

            <td>3. </td>
            <td>Provinsi/ Negara Bagian</td>
            <td>:</td>
            <td><?php echo $ttd['provinsi_ln']; ?></td>
        </tr>
        <tr>

            <td>4. </td>
            <td>Negara</td>
            <td>:</td>
            <td><?php echo $ttd['negara_ln']; ?></td>
        </tr>
        <tr>

            <td>5. </td>
            <td>Kode Pos</td>
            <td>:</td>
            <td><?php echo $ttd['kode_pos_ln']; ?></td>
        </tr>
        <tr>

            <td>6. </td>
            <td>Jumlah Anggota Keluarga</td>
            <td>:</td>
            <td><?php echo $ttd['jml_anggota']; ?></td>
        </tr>
        <tr>

            <td>7. </td>
            <td>Telepone / Handphone</td>
            <td>:</td>
            <td><?php echo $ttd['telp_ln']; ?></td>
        </tr>
        <tr>

            <td>8. </td>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $ttd['email_ln']; ?></td>
        </tr>

    </table>
    <p>Diisi oleh Petugas</p>
    <table width="100%" border="0">

        <tr>


            <td width="25%">Kode - Nama Negara</td>
            <td width="1%">:</td>
            <td><?php echo $ttd['kode_nm_negara']; ?></td>
        </tr>
        <tr>


            <td>Kode - Nama Perwakilan RI</td>
            <td>:</td>
            <td><?php echo $ttd['kode_nm_pri']; ?></td>
        </tr>


    </table>
    <br>
    <b>DATA ANGGOTA KELUARGA</b>
    <p>Catatan :<br>
        - Bagi Penduduk WNI mengisi Kolom 2 s.d 6, 10 s.d 31, 38 s.d 41<br>
        - For Foreigne rs only, please f ill co lumn 2 to 13, 15 to 41<br>
        - bagi WNI di luar wilayah NKRI mengisi nomor 2 s.d 31,38 s.d 41</p>

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td width="3%" align="center" rowspan="2">No.</td>
            <td width="20%"align="center" rowspan="2">Nama Lengkap
                Full Name</td>
            <td width="30%" align="center" colspan="2">Gelar</td>
            <td width="20%"align="center" rowspan="2">Nomor Paspor
                Passport Number</td>
            <td width="20%" align="center" rowspan="2">Tanggal Berakhir Passport
                Date of Expiry</td>
            <td width="20%" align="center" rowspan="2">Nama Sponsor
                Sponsor Name</td>
        </tr>
        <tr>
          <td align="center">Depan</td>
          <td align="center">Belakang</td>
        </tr>
        <?php
              while($show = mysqli_fetch_array($ubahquery)){
            ?>
        <tr>
        <td class="kotak"><?php echo $show['id']; ?></td>
        <td class="kotak"><?php echo $show['nama_lengkap']; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php } ?>
        
       
    </table>

    <br>
 

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td width="5%" align="center">No.</td>
            <td width="12%">Tipe Sponsor
                Type of Sponsor</td>

            <td width="15%">Alamat Sponsor
                Sponsor Address</td>
            <td width="10%" align="center">Jenis Kelamin
                Sex</td>
            <td width="10%">Tempat Lahir
                Place of Birth</td>
            <td width="25%">Tanggal, bulan, tahun lahir
                Date of Birth</td>
            <td width="10%">Kewarganegaraan
                Nationality</td>
            <td width="15%">No. SK<br>
                Penetapan WNI</td>
            <td width="12%">Akta Lahir</td>

        </tr>
    
        <?php
              while($show2 = mysqli_fetch_array($ubahquery3)){
            ?>
        <tr>
        
        <td><?php echo $show2['id']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $show2['jenis_kelamin']; ?></td>
            <td><?php echo $show2['tempat_lahir']; ?></td>
            <td><?php echo tanggal($show2['tgl_lahir']) ;?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php } ?>
    </table>

    <br>

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td width="5%" align="center">No.</td>
            <td width="40%">Nomor Akta Kelahiran</td>

            <td width="30%">Gol. Darah<br>
                type of Blood</td>
            <td width="10%" align="center">Agama
                Religion</td>
            <td width="40%">Nama Organisasi Kepercayaan<br>
                terhadap Tuhan YME</td>
            <td width="40%">Status Perkawinan
                Marital Status</td>
            <td width="10%">Akta
                Perkawinan</td>
            <td width="40%">Nomor Akta Perkawinan</td>
            <td width="15%">Tanggal Perkawinan</td>
        </tr>
      
        <?php
              while($show3 = mysqli_fetch_array($ubahquery4)){
            ?>
        <tr>
      
            <td><?php echo $show3['id']; ?></td>
            <td><?php echo $show3['no_akta_lahir']; ?></td>
            <td><?php echo $show3['golongan_darah']; ?></td>
            <td><?php echo $show3['agama']; ?></td>
            <td></td>
            <td><?php echo $show3['status_kawin']; ?></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <?php } ?>
        

    </table>
 <br>

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td width="5%" align="center">No.</td>
            <td width="40%">Akta Cerai</td>

            <td width="30%">Nomor Akta
                Perceraian</td>
            <td width="10%" align="center">Tanggal
                Perceraian</td>
            <td width="20%">Status Hubungan
                Dalam Keluarga</td>
            <td width="20%">Kelainan Fisik &
                Mental</td>
            <td width="10%">Penyandang
                Cacat</td>
            <td width="20%">Pendidikan Terakhir</td>
            <td width="15%">Jenis Pekerjaan</td>
            <td width="15%">Nomor ITAS/ ITAP</td>
            <td width="20%">Tempat Terbit ITAS/
                ITAP</td>
        </tr>

        <?php
              while($show4 = mysqli_fetch_array($ubahquery5)){
            ?>
        <tr>
        <td><?php echo $show4['id']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $show4['status_hubungan_keluarga']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
<?php }?>

    </table>

    <br>

    <table width="100%" border="1" class="table-collapse">
        <tr>
            <td width="5%" align="center">No.</td>
            <td width="20%">Tanggal Terbit
                ITAS/ ITAP</td>

            <td width="20%">Tanggal Akhir
                ITAS/ ITAP</td>
            <td width="30%" align="center">Tempat Datang
                Pertama</td>
            <td width="30%">Tanggal Kedatangan
                Pertama</td>
            <td width="15%">NIK Ibu</td>
            <td width="15%">Nama Ibu</td>
            <td width="15%">NIK Ayah</td>
            <td width="18%">Nama Ayah</td>

        </tr>

        <?php
              while($show5 = mysqli_fetch_array($ubahquery6)){
            ?>
        <tr>
        <td><?php echo $show5['id']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $show5['nama_ibu']; ?></td>
            <td></td>
            <td><?php echo $show5['nama_ayah']; ?></td>

        </tr>
        <?php }?>

    </table>
    <p>

    </p>

    <table width="100%" border="0">

        <tr>
            <td><span class="style2"></span></td>

            <td><span class="style2"></span></td>
        </tr>
        <tr>
            <td>
                <p>Mengetahui,<br>
                    Kepala Dinas Kependudukan <br>
                    dan Pencatatan Sipil/ UPT Dinas Dukcapil/<br>
                    Kepala Perwakilan RI di Kabupaten Kabupaten Banyumas</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>____________________________________________<br>
                    NIP.</p>
                <p> PERNYATAAN<br>
                    Demikian Formulir ini saya/ kami isi dengan sesungguhnya. Apabila keterangan tersebut tidak sesuai
                    dengan keadaan sebenarnya,
                    saya bersedia dikenakan sanksi sesuai ketentuan peraturan perundang-undangan yang berlaku.</p>
            </td>

            <td>&nbsp;</td>
            <td>
                <p>Kepala Keluraga/ Head of Family</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;&nbsp;&nbsp;<?php echo $ttd['nama_kep']; ?><br>

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