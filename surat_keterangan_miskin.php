<?php
ob_start();
?>


<?php
include "koneksi.php";
$penduduk_detail_id = $_GET['penduduk_detail_id'];
//print $penduduk_detail_id;

$query = "
SELECT * 
FROM m_penduduk_detail as a
LEFT OUTER JOIN m_penduduk b ON a.nik = b.nik
LEFT OUTER JOIN surat_keterangan_miskin c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
LEFT OUTER JOIN l_kecamatan e ON d.kec_id = e.kec_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' "; 
//print $query;

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);
//echo $hasil['nama_lengkap'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {font-size: 14px}
.style5 {font-size: 16px}
.style6 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td height="78"><div align="center"><span class="style5">PEMERINTAH KABUPATEN PURWOREJO<br />
  KECAMATAN </span><span class="style5">PURWOREJO</span><br />
      <span class="style6">KELURAHAN <?php echo strtoupper($hasil['desa']) ; ?></span><br />
  <span class="style3">Jl. Let. Jend. Suprapto No. 145 Telp. 324955 PURWOREJO 54112 </span></div>  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><hr color="#000000" size="3" width="100%"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>Kode desa / Kelurahan : 
      <?php echo $hasil['des_id']; ?>
      <table width="100%" border="0">
        <tr>
          <td><table width="100%" border="0">
            <tr>
              <td><div align="center"><strong><u>SURAT KETERANGAN MISKIN</u></strong><br />
              Nomor : <?php echo $hasil['nomor_surat']; ?></div></td>
            </tr>
            
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>Yang bertanda tangan di bawah ini, saya :</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">Nama</td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['nama_penandatangan']; ?></td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td><?php echo $hasil['jabatan_penandatangan']; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $hasil['alamat_penandatangan']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><p>Berdasarkan  keterangan / pengakuan yang bersangkutan, bahwa :</p></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">NIK</td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['NIK']; ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $hasil['jenis_kelamin']; ?></td>
  </tr>
  <tr>
    <td>Tempat / tanggal lahir </td>
    <td>:</td>
    <td><?php echo $hasil['tempat_lahir']; ?>/<?php echo $hasil['tanggal_lahir']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">Alamat</td>
    <td width="1%">:</td>
    <td width="24%"><?php echo $hasil['alamat']; ?></td>
    <td width="18%">RT : <?php echo $hasil['rt']; ?></td>
    <td width="31%">RW : <?php echo $hasil['rw']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="26%">Umur</td>
    <td width="1%">:</td>
    <td width="73%"><?php echo $hasil['umur_yang_bersangkutan']; ?></td>
  </tr>
  <tr>
    <td>Pekerjaan</td>
    <td>:</td>
    <td><?php echo $hasil['pekerjaan']; ?></td>
  </tr>
</table>
<p>Benar-benar  merupakan keluarga miskin karena telah memenuhi 5 (lima) indikator masyarakat  miskin dari 11 (sebelas) indikator masyarakat miskin sebagai berikut ;</p>
<table width="100%" border="1">
  <tr>
    <td width="4%" rowspan="2"><div align="center">No.</div></td>
    <td width="52%" rowspan="2"><div align="center">Indikator Masyarakat Miskin </div></td>
    <td colspan="2"><div align="center">Kondisi</div></td>
    <td width="25%" rowspan="2"><div align="center">Keterangan</div></td>
  </tr>
  <tr>
    <td width="10%"><div align="center">Ya</div></td>
    <td width="9%"><div align="center">Tidak</div></td>
  </tr>
  <tr>
    <td height="25"><div align="center">1.</div></td>
    <td>Pengeluaran setiap  anggota rumah tangga dengan jumlah pengeluaran kurang dari Rp.  235.491,-/orang/bulan (Dua ratus tiga puluh lima ribu empat ratus Sembilan  puluh satu rupiah per orang per bulan);</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Jumlah anggota  keluarga sebanyak 4 orang</td>
  </tr>
  <tr>
    <td><div align="center">2.</div></td>
    <td>Terdapat anggota  rumah tangga yang menderita penyakit kronis dan atau khusus;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">3.</div></td>
    <td>Luas lantai bangunan  tempat tinggal kurang dari 8 M2 (Delapan meter persegi) per orang</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">4.</div></td>
    <td>Jenis lantai bangunan  tempat tinggal terbuat dari tanah/bambu/kayu murahan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">5.</div></td>
    <td>Jenis dinding tempat  tinggal terbuat dari bambu/rumbia/kayu berkualitas rendah /tembok tanpa  diplester;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">6.</div></td>
    <td>Tidak memiliki  fasilitas buang air besar/bersama dengan rumah tangga lain ;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">7.</div></td>
    <td>Sumber penerangan  rumah tangga tidak menggunakan listrik;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">8.</div></td>
    <td>Sumber air minum  berasal dari sumur/mata air tidak terlindung/sungai/air hujan;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">9.</div></td>
    <td>Bahan bakar untuk  memasak sehari-hari adalah kayu bakar/arang/minyak tanah;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">10.</div></td>
    <td>Pendidikan kepala  rumah tangga paling tinggi tamat; dan/atau tidak tamat SD</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">11.</div></td>
    <td>Tidak memiliki  tabungan/barang yang mudah dijual dengan nilai paling banyak Rp.  1.000.000,-(satu juta rupiah)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">&nbsp;</p>
    </td>
    <td width="50%" bordercolor="#000000"><p align="center"><?php echo $hasil['kec']; ?>, ....................20....</p>
        <p align="center">Lurah Mranti </p>
        <p align="center">&nbsp;</p>
      <p align="center"><u>(...................................................)</u></p>
      <p align="center"><br />
      </p></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td><div align="center">SURAT PERNYATAAN MISKIN<br />
      (SPM)</div></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><p>Yang bertanda tangan dibawah ini :</p></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="26%">Nama</td>
    <td width="1%">:</td>
    <td width="69%"><?php echo $hasil['nama_lengkap']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tempat / tanggal lahir </td>
    <td>:</td>
    <td><?php echo $hasil['tempat_lahir']; ?> / <?php echo $hasil['tanggal_lahir']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="26%">Alamat</td>
    <td width="1%">:</td>
    <td width="22%"><?php echo $hasil['alamat']; ?></td>
    <td width="19%">RT : <?php echo $hasil['rt']; ?></td>
    <td width="28%">RW : <?php echo $hasil['rw']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="26%">Pekerjaan</td>
    <td width="1%">:</td>
    <td width="69%"><?php echo $hasil['pekerjaan']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Hubugan keluarga dengan pasien </td>
    <td>:</td>
    <td><?php echo $hasil['hubungan_keluarga_dengan_pasien']; ?></td>
  </tr>
</table>
<?php
$query2 = "
SELECT b.* 
FROM surat_keterangan_miskin as a
LEFT OUTER JOIN m_penduduk b ON a.nik_pasien = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil2 = mysql_query($query2, $koneksi) or die ("Gagal Query".mysql_error());

$hasil2 = mysql_fetch_array($tampil2);
?>
<table width="100%" border="0">
  <tr>
    <td><p>Dalam hal ini bertindak selaku penanggung  jawab pasien :</p></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="26%">Nama</td>
    <td width="1%">:</td>
    <td width="69%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['nama_pasien'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Tempat / tanggal lahir </td>
    <td>:</td>
    <td><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tempat_lahir']; }  else {echo $hasil['tanggal_lahir_pasien'] ; } ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="26%">Alamat</td>
    <td width="1%">:</td>
    <td width="22%"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['alamat_pasien'] ; } ?></td>
    <td width="19%">RT : 
    <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['rt_pasien'] ; } ?></td>
    <td width="28%">RW : 
    <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['rw_pasien'] ; } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
    <td>:</td>
    <td colspan="3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['pekerjaan_pasien'] ; } ?></td>
  </tr>
</table>
<p>Dengan ini  menyatakan dengan sesungguhnya bahwa saya/pasien tersebut diatas merupakan  masyarakat miskin, untuk itu kami mohon mendapatkan biaya pelayanan kesehatan  atas pasien tersebut diatas sesuai ketentuan yang berlaku.</p>
<p>Apabila pernyataan  yang kami sampaikan ini ternyata tidak benar, maka kami sanggup mengganti  seluruh biaya perawatan yang telah dikeluarkan oleh negara dan  mempertanggungjawabkan kepada Tuhan Yang Maha Esa.</p>
<p>Demikian surat  pernyataan kami buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana  mestinya.</p>
<table width="100%"  border="0">
  <tr>
    <td width="50%" bordercolor="#000000"><p align="center">Mengetahui : <br />
      Lurah Mranti </p>
      <p align="center">&nbsp;</p>
      <p align="center"><u>(...................................................)</u></p></td>
    <td width="50%" bordercolor="#000000"><p align="center"><?php echo $hasil['kec']; ?>, ....................20....<br />
      Yang Membuat Pernyataan </p>
        <p align="center">&nbsp;</p>
      <p align="center"><u>(<?php echo $hasil['nama_lengkap']; ?>)</u></p>
      <p align="center"><br />
      </p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
$html = ob_get_clean();
 
// require_once("../dompdf_config.inc.php");
require_once("dompdf/dompdf_config.inc.php");
/* 
$html =
  '<html><body>'.
  '<h1>Halo, berikut alamat Anda : </h1>'.
  '<p>Alamat lengkap Anda adalah : </p>'.
  '</body></html>';
*/
 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
//$dompdf->stream('coba.pdf');
$dompdf->stream('coba.pdf',array('Attachment' => 0));
//$dompdf->stream('my.pdf',array('Attachment'=>0));.
 
?>