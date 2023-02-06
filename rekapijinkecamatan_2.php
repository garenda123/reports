<html>
<head>

<style>
@page {
		margin-top:2em;
		margin-bottom:2em;
		margin-left:2em;
		margin-right:2em;
	
		}
</style>

<style type="text/css">
<!--
.style2 {font-size: 9px}
.style3 {font-weight: bold; font-size: 9px; }
.style4 {font-weight: bold}
-->
</style>
</head>
<body>

<?php 
	include "koneksi.php";
	$bulan=$_GET['bulan'];
	$tahun=$_GET['tahun'];	
	$nama_bulan = ambil_bulan($bulan,$koneksi);
	$nama_layanan = ambil_nama_layanan($_GET['layanan'],$koneksi);
 ?>

<table width="1150" border="0">
  <tr>
    <td>
	
      <div align="center" class="style2"><strong>REKAP PENERIMAAN P.A.D DINAS, BADAN, KANTOR DAN BAGIAN PENGELOLA P.A.D <br>
        MELALUI KANTOR PELAYANAN TERPADU SATU PINTU KAB.MUKOMUKO<br>
BULAN  <?php echo $nama_bulan  ?> TAHUN <?php echo $tahun ?></strong></div>
      <span class="style2">
      <br>
      <strong>NAMA IZIN :  <?php echo $nama_layanan ?> </strong></span>
<table width="1150px"  border="1" style="border-style:solid; ">
  <tr>
    <td><div align="center" class="style2"><strong>NO</strong></div></td>
    <td><div align="center" class="style3">
      <p><span class="style4 style2">NO. BUKTI</span></p>
      </div></td>
    <td><div align="center" class="style2"><span class="style4 style2">NAMA</span></div></td>
    <td><div align="center" class="style2"><strong><span class="style4 style2">TGL PEMBAYARAN</span><br>
    </strong></div></td>
    <td><div align="center" class="style2"><span class="style4 style2">NO. REKENING</span></div></td>
    <td><div align="center" class="style2"><span class="style4 style2">PENERIMAAN (RP) </span></div></td>
    <td><div align="center" class="style2"><span class="style4 style2">BIDANG USAHA</span></div></td>
    <td><div align="center" class="style2"><strong><span class="style4 style2">NO. SK</span></strong></div></td>
    <td><div align="center" class="style2"><span class="style4 style2">MASA BERLAKU S/D</span></div></td>  
    <td><div align="center" class="style2"><strong>KETERANGAN</strong></div></td>
  </tr>
  <tr>
    <td><div align="center" class="style2">1</div></td>
    <td><div align="center" class="style2">2</div></td>
    <td><div align="center" class="style2">3</div></td>
    <td><div align="center" class="style2">4</div></td>
    <td><div align="center" class="style2">5</div></td>
    <td><div align="center" class="style2">6</div></td>
    <td><div align="center" class="style2">7</div></td>
    <td><div align="center" class="style2">8</div></td>
    <td><div align="center" class="style2">9</div></td>
    <td><div align="center" class="style2">10</div></td>
  </tr>
    <?php
//include "koneksi.php";

$bulan=$_GET['bulan'];
$tahun=$_GET['tahun'];
$layanan=$_GET['layanan'];
$kecamatan=$_GET['kecamatan'];
$nourut=0;
$total=0;
$query = "SELECT  a.*,
 tanggal(b.tgl_terima) as tgl_terima ,
 b.nama,
 b.alamat,
 b.lokasi,
 c.rekening,
 b.nomor_SK,
 tanggal(b.tgl_SK) as tgl_SK,
 tanggal(b.tgl_berlaku) as tgl_berlaku,
 tanggal(b.tgl_bayar) as tgl_bayar,
 b.alamat_perusahaan                                         
                              
                                     

FROM (
  
  SELECT  
    'Izin Gangguan' as layanan,
    x.alamatUsaha as lokasi, x.bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket     
  FROM data_gangguan x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 2   
  OR 'SEMUA' = $layanan

  UNION
  
  SELECT  
    'Izin Mendirikan Bangunan' as layanan,
    x.lokasi,x.peruntukanTanah AS bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket        
  FROM data_imb x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 4
  OR 'SEMUA' = $layanan
 
  UNION
  
  SELECT  
    'SIUP' as layanan,
    x.lokasi,x.bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket        
  FROM data_siup x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 6   
  OR 'SEMUA' = $layanan

  UNION
  
  SELECT  
    'Tanda Daftar Perusahaan' as layanan,
    x.lokasi,x.infoKomoditi AS bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket     
  FROM data_tdp x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 7   
  OR 'SEMUA' = $layanan

     UNION
  
  SELECT  
    'IUJK' as layanan,
    x.lokasi, '' bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket     
  FROM data_iujk x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 10     
  OR 'SEMUA' = $layanan

  UNION    

  SELECT  
    'Izin STDB' as layanan,
    x.lokasi, 'budidaya Perkebunan' bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket     
  FROM data_stdb x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 24
  OR 'SEMUA' = $layanan

  UNION
  
  SELECT  
    'Izin STDP' as layanan,
    x.lokasi, 'Pengolahan hasil Perkebunan' bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket   
  FROM data_stdp x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 25
  OR 'SEMUA' = $layanan

   UNION
  
  SELECT  
    'Izin TDG' as layanan,
    x.lokasi, 'Tanda Daftar Gudang' bidang_usaha, x.noreg, x.noSK, x.tgl_SK,
    x.retribusi, x.leges, x.tgl_akhir_ket  
  FROM data_tdg x 
  WHERE  (SELECT id FROM layanan WHERE id = $layanan) = 26      
  OR 'SEMUA' = $layanan
  
) as a
LEFT OUTER JOIN data_awal b ON a.noreg = b.noreg
LEFT OUTER JOIN layanan  c ON b.layanan  = c.id

LEFT OUTER JOIN data_bulan  h ON (SELECT id_bulan FROM data_bulan WHERE id_bulan = $bulan)= h.id_bulan                

WHERE MONTH(b.tgl_terima)=(SELECT id_bulan FROM data_bulan WHERE id_bulan= $bulan)
                         AND year(b.tgl_terima) = $tahun
                         AND b.tgl_terima is not null
                         AND b.kecamatan_id = (select kecamatan_id from l_kecamatan_user where kecamatan_id = $kecamatan )                                                 
ORDER BY  a.layanan, tgl_terima ASC ";
$tampil = mysql_query($query, $koneksi)
or die ("Gagal Query".mysql_error());
while($result=mysql_fetch_array($tampil)){
$nourut++;
$retribusi = $result['retribusi'];
$total+=$retribusi;
$jumlah=mysql_num_rows($tampil);

?>  <tr>
    <td align="center" valign="middle"><span class="style2"><?php echo $nourut; ?></span></td>
    <td><span class="style2"><?php echo $result['noreg']; ?></span></td>
    <td><span class="style4 style2"><?php echo $result['nama']; ?></span></td>
    <td><span class="style4 style2"><?php echo $result['tgl_bayar']; ?></span></td>
    <td><span class="style2"><?php echo $result['rekening']; ?></span></td>
    <td><span class="style2"><?php echo number_format($result['retribusi'], 0 , '' , '.' ); ?></span></td>
    <td><span class="style4 style2"><?php echo $result['bidang_usaha']; ?></span></td>
    <td><span class="style4 style2"><?php echo $result['nomor_SK']; ?></span></td>
    <td><span class="style2"><?php echo $result['tgl_berlaku']; ?></span></td>
    <td><span class="style2"><?php echo $result['alamat_perusahaan']; ?></span></td>
  </tr>
 <?php }?>
</table>	</td>
  </tr>
  <tr>
    <td><table width="100%" >
      <tr>
        <td width="31%"><table width="100%" border="1" style="border-style:solid ">
          <tr>
            <td width="63%" class="style2"><strong>JUMLAH TRANSAKSI </strong></td>
            <td width="37%" class="style2"><strong><?php echo $jumlah; ?></strong></td>
          </tr>
          <tr>
            <td class="style2"><strong>TOTAL PENERIMAAN</strong></td>
            <td class="style2"><strong><?php echo 'Rp. ' . number_format($total, 0 , '' , '.' ) . ',-'; ?></strong></td>
          </tr>
        </table></td>
        <td width="31%">&nbsp;</td>
        <td width="38%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><p align="center" class="style2">Kota Mukomuko<br>
            Plt. Kepala Kantor Pelayanan Terpadu Satu Pintu <br>
            Kabupaten Mukomuko<br>
          Sekretaris.</p>
          <p align="center" class="style2">&nbsp;</p>
          <p align="center" class="style2">Pembina</p></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>