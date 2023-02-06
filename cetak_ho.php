<?php
ob_start();
?>

<?php
include "koneksi.php";

$tandatangan=$_GET['y'];		
$noreg=$_GET['noreg'];
$query = "SELECT a.*,year(c.tgl_SK) as tahun,
 c.nomor_SK AS noSK,
 c.nama, c.ktp,
 c.alamat,
 c.lokasi,
 c.nama_perusahaan AS naper,
 c.alamat_perusahaan AS alaper,                                                                 
 tanggal(c.tgl_SK) AS tanggal_SK,
 tanggal(c.tgl_berlaku) as tgl_berlaku,
 d.gangguan_gangguan
 ,a.retribusi
 ,terbilang(a.retribusi) as retribusi_terbilang
                                  
 FROM
 data_gangguan a
 LEFT OUTER JOIN data_awal c ON a.noreg = c.noreg
 LEFT OUTER JOIN l_gangguan_gangguan d ON a.gangguan_gangguan_id = d.gangguan_gangguan_id
                
 where a.noreg = '$noreg' "; 
$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$result=mysql_fetch_array($tampil);
$file_qrcode =  '../kptsp_qrcode/da_' . $result['ktp'] . '.png' ;
?>

<html>
<head>
<link rel="STYLESHEET" href="print.css" type="text/css" />
<title>Cetak HO</title>

<style>
#rcorners2 {
    border-radius: 25px;
    border: 10px solid #8AC007;
    padding: 10px;
  /*  width: 400px;
    height: 300px; */
}
#rcorners3 {
    border-radius: 25px;
    border: 4px solid #8AC007;
    padding: 1px;
  /*  width: 400px;
    height: 300px; 
	
	*/
}

</style>

</head>

<body>

<div align="center" style="background-image:url(borderho.jpg); width:760px; height:1175px; ">

<table width="655px" height="900px" style="vertical-align:middle" align="center">
<tr>
<td height="20px">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>


<table cellspacing="0">
<tr>
<td>&nbsp;</td>
<td>
<table width="100%" align="center" cellspacing="0">
    <tr>
    <td colspan="4" align="center"><br><br><img src="logo.png" alt="" width="65" height="79" align="middle">
	<b><br>
	PEMERINTAH KABUPATEN MUKOMUKO
	<br>PETIKAN
	<br>KEPUTUSAN KEPALA KANTOR PELAYANAN TERPADU SATU PINTU</b>
	<br><?php echo $result['noSK']; ?>
	<br>TENTANG
	<br>
	IZIN GANGGUAN (H O)	<br>
	KEPALA KPTSP,
	<br>Membaca dst.
	<br>Menimbang dst.
	<br>Mengingat dst.
	<b><br>MEMUTUSKAN</b>	</td>
  </tr>
    <tr>
      <td width="28%" valign="top"><div align="justify">Menetapkan</div></td>
      <td width="1%" valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify">KEPUTUSAN KEPALA KPTSP TENTANG IZIN GANGGUAN (HO);</div></td>
    </tr>
    <tr>
      <td valign="top"><div align="justify">- Nama </div></td>
      <td valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify"><?php echo $result['nama']; ?></div></td>
    </tr>
    <tr>
      <td valign="top"><div align="justify">- Alamat</div></td>
      <td valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify"><?php echo $result['alamat']; ?></div></td>
    </tr>
    <tr>
      <td valign="top"><div align="justify">- Jenis Usaha</div></td>
      <td valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify"><?php echo $result['bidang_usaha']; ?></div></td>
    </tr>
    <tr>
      <td valign="top"><div align="justify">- Lokasi Usaha</div></td>
      <td valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify"><?php echo $result['lokasi']; ?></div></td>
    </tr>
    <tr>
      <td valign="top"><div align="justify">- Nama Perusahaan/Toko</div></td>
      <td valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify"><?php echo $result['naper']; ?></div></td>
    </tr>
    <tr>
      <td valign="top"><div align="justify">- Klasifikasi</div></td>
      <td valign="top"><div align="justify">:</div></td>
      <td colspan="2"><div align="justify">Index Gangguan <?php echo $result['gangguan_gangguan']; ?></div></td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="center">Selanjutnya bagi pemegang izin diwajibkan mentaati ketentuan-ketentuan sebagai berikut :<br>
      Pasal 1</td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="left">
	  
	  <table width="100%" border="0" cellspacing="0">
        <tr valign="top">
          <td width="3%" valign="top"><div align="justify">1. </div></td>
          <td width="97%"><div align="justify">Menjaga agar dalam melakukan kegiatan usaha tidak menimbulkan polusi / pencemaran lingkungan 
          kebisingan dan lain-lain yang mengganggu ketentraman umum.</div></td>
        </tr>
        <tr valign="top">
          <td valign="top"><div align="justify">2. </div></td>
          <td><div align="justify">Pemegang izin harus menyediakan tempat pembuangan limbah/sampah.</div></td>
        </tr>
        <tr>
          <td valign="top"><div align="justify">3. </div></td>
          <td><div align="justify">Pemegang izin harus menyediakan halaman yang digunakan sebagai tempat bongkar muat barang penimbunan material.</div></td>
        </tr>
        <tr>
          <td valign="top"><div align="justify">4. </div></td>
          <td><div align="justify">Harus menyediakan racun api/alat pemadam kebakaran.</div></td>
        </tr>
        <tr>
          <td valign="top"><div align="justify">5. </div></td>
          <td><div align="justify">Pemegang izin harus menyampaikan laporan secara tertulis kepada Kepala Kantor Pelayanan Terpadu Satu Pintu Kabupaten Mukomuko minimal 2 (dua) kali dalam 1 (satu) tahun.</div></td>
        </tr>
        <tr>
          <td valign="top"><div align="justify">6. </div></td>
          <td><div align="justify">Jika perusahaan bubar atau pindah tempat pemegang izin diwajibkan memberikan laporan secara tertulis kepada Bupati Mukomuko.</div></td>
        </tr>
        <tr>
          <td valign="top"><div align="justify">7. </div></td>
          <td><div align="justify">Mengizinkan petugas yang ditugaskan untuk memasuki, memeriksa usaha yang dimaksud.</div></td>
        </tr>
      </table>	  </td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="center">Pasal 2 </td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="left"><div align="justify">Retribusi  Izin  Gangguan hanya berlaku untuk jangka waktu 1 (satu) tahun terhitung sejak tanggal ditetapkan</div></td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="center">Pasal 3 </td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="left"><div align="justify">Jika  Perusahaan  Bubar  atau  Pindah  Tempat,  Pemegang  Izin  Wajib  melaporkan  secara  tertulis kepada Pemberi Izin.</div></td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="center">Pasal 4 </td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="left"><div align="justify">Bagi yang tidak mengindahkan ketentuan-ketentuan seperti pasal 1-3 diatas, dapat dikenakan sanksi Kurungan Denda dan/atau pencabutan izin gangguan tanpa mendapat ganti rugi apapun.</div></td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="center">Pasal 5 </td>
    </tr>
    <tr>
      <td colspan="4" valign="top" align="left">
        <div align="justify">Keputusan   ini   mulai   berlaku  pada  tanggal  : <?php echo $result['tanggal_SK']; ?>  PETIKAN :  Disampaikan kepada yang bersangkutan untuk diketahui dan diindahkan.</div></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td width="21%" align="center">&nbsp;</td>
      <td width="50%" align="center"></td>
    </tr>
    <tr>
      <td height="121" align="left" valign="top"><div align="left">Kepada : <br>
        Sdr <?php echo $result['nama']; ?><br>
      di MUKOMUKO <?php 
if (file_exists($file_qrcode))
{ echo '<img src="../kptsp_qrcode/da_' . $result['ktp'] . '.png"' ; } else { echo " "; }
?> 


	  </div></td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left" valign="top">
<p>Ditetapkan di Mukomuko <br> 
        Pada Tanggal <?php echo $result['tanggal_SK']; ?><br> 
KEPALA KPTSP,<br>

<?php 
if ($tandatangan==1)
{ 

echo '<div style="background-image:url(tandatangan.jpg)" >'; 

}
?> 
<br><br><br>
      <u>MUSHARUDIN, S.I.P</u><br>Pembina IV/a<br>NIP. 19660313 198612 1 001 </p>


</td>
    </tr>
</table>
</td>
<td>&nbsp;</td>
</tr>
</table>

</td>
<td>&nbsp;</td>
</tr>
</table>

</div>

<br>
<p>
<table border="0">
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<table width="100%" border="1" style="border-spacing:0px; border-style:solid" cellspacing="0">
  <tr>
    <td><table width="100%" border="1" style="border-spacing:0px; border-spacing:0px;">
      <tr>
        <td align="center" width="25%">PEMERINTAH<br />
          KABUPATEN <br />
          MUKOMUKO</td>
        <td align="center" width="50%">SKRD<br />
          (Surat Ketetapan Retribusi Daerah)<br />
          Tahun <?php echo $result['tahun']; ?></td>
        <td align="center" width="25%">No. Urut<br />
          <?php echo $result['noreg']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="20%">Nama</td>
        <td width="2%">:</td>
        <td width="78%"><?php echo $result['nama']; ?></td>
      </tr>
      <tr>
        <td width="20%">Nama Perusahaan </td>
        <td>:</td>
        <td><?php echo $result['naper']; ?></td>
      </tr>
      <tr>
        <td width="20%">Alamat</td>
        <td>:</td>
        <td><?php echo $result['alaper']; ?></td>
      </tr>
      <tr>
        <td width="20%">Jenis Layanan </td>
        <td>:</td>
        <td>Izin Gangguan (HO)</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%"  border="1" style="border-spacing:0px; border-spacing:0px;">
      <tr align="center">
        <td width="30%">Nomor Rekening</td>
        <td width="40%">Jenis Retribusi Daerah</td>
        <td width="30%">Jumlah</td>
      </tr>
      <tr align="center">
        <td>1.20.1.20.03.00.00.4.1.2.03.08</td>
        <td>Jumlah Ketetapan Pokok Retribusi</td>
        <td><?php echo 'Rp. ' . number_format($result['retribusi'], 0 , '' , '.' ) . ',-'; ?></td>
      </tr>
      <tr align="center">
        <td>&nbsp;</td>
        <td align="right"><strong>Total Pembayaran</strong></td>
        <td><?php echo 'Rp. ' . number_format($result['retribusi'], 0 , '' , '.' ) . ',-'; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div align="justify">Dengan Huruf : <?php echo $result['retribusi_terbilang']; ?> Rupiah</div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td colspan="2">PERHATIAN :</td>
        </tr>
      <tr>
        <td width="4%" align="right" valign="top">1. </td>
        <td width="96%">Harap penyetoran dilakukan melalu Bendahara Khusus Peneriman pada Kantor Pelayanan Terpadu Satu Pintu Kabupaten Mukomuko</td>
      </tr>
      <tr>
        <td  align="right" valign="top">2. </td>
        <td>Apabila SKRD ini tidak atau belum dibayar setelah lewat paling lama 15 (lima belas) hari  sejak  SKRD ini diterima dikenakan sanksi administrasi berupa bunga sebesar 2% perbulan</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%"  border="1" style="border-spacing:0px; border-spacing:0px;">
      <tr>
        <td width="30%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
        <td width="30%"><div align="left">Mukomuko, <?php echo $result['tanggal_SK']; ?><br>
  Kepala KPTSP,<br /></div>
 <?php 
if ($tandatangan==1)
{ 

echo '<div style="background-image:url(tandatangan.jpg)" >'; 

}
?> 
          <br><br>
          <br>
          <div align="left"><u>MUSHARUDIN, S.IP</u><br />Pembina IV/a<br>
  NIP. 19660313 198612 1 001</div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td> Diterima Oleh Petugas Pembayaran<br />
          Tanggal               :<br />
          Tanda Tangan     :<br />
          Nama Terang      :</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</td>
<td>&nbsp;</td>
</tr>
</table>
</p>
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
$dompdf->stream('hasil.pdf',array('Attachment' =>0));
 
?>
