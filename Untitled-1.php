<table border=0 class="header" style="width: 100%;">
        <tr>
          <td  bordercolor="#000000" class="style3">&nbsp;</td>
          <td  bordercolor="#000000" class="style3">&nbsp;</td>
          <td  bordercolor="#000000" class="style3"><div align="right">Lampiran 11 KMA : No. 477 Tahun 2004<br>
            -Pasal 7 ayat (2) huruf e-<br>
            <strong>Model N - 5 </strong></div></td>
        <tr>
          <td  bordercolor="#000000" class="style3">KANTOR DESA/KELURAHAN</td>
          <td  bordercolor="#000000" class="style3">:</td>
          <td  bordercolor="#000000" class="style3"><?php echo $hasil['desa']; ?></td>
        <tr>
          <td bordercolor="#000000" class="style3">KECAMATAN</td>
          <td bordercolor="#000000" class="style3">:</td>
          <td bordercolor="#000000" class="style3"><?php echo $hasil['kec']; ?></td>
        <tr>
          <td bordercolor="#000000" class="style3">KABUPATEN/KOTA</td>
          <td bordercolor="#000000" class="style3">:</td>
          <td bordercolor="#000000" class="style3">Purworejo</td>
      </table>
      <table border=0 class="header" style="width: 100%;">
        <tr>
          <td><p align="center"><span class="style1"><u>SURAT IZIN ORANG TUA<br>
          </u></span>Nomor : <?php echo $hasil['nomor_surat']; ?></p></td>
        <tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td>Yang bertanda tangan dibawah ini    :</td>
        </tr>
      </table>
      <table  border="0">
        <tr>
          <td class="style3">I.</td>
          <td class="style3">1. Nama Lengkap dan Alias</td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['N2_nama_ayah'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3" >&nbsp;</td>
          <td width="30%" class="style3">2. Tempat dan Tanggal Lahir </td>
          <td class="style3" >: </td>
          <td width="66%" class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tempat_lahir']; }  else {echo $hasil['N2_tempat_lahir_ayah'] ; } ?>
            ,
            <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['tanggal_lahir']; }  else {echo $hasil['N2_tanggal_lahir_ayah'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">3. Warganegara </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">4. Agama</td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['agama']; }  else {echo $hasil['N2_agama_ayah'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">5. Pekerjaan </td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['pekerjaan']; }  else {echo $hasil['N2_pekerjaan_ayah'] ; } ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td >&nbsp;</td>
          <td width="30%">6. Tempat Tinggal </td>
          <td >:</td>
          <td colspan="2"><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['alamat']; }  else {echo $hasil['N2_alamat_ayah'] ; } ?></td>
          <td >RT:</td>
          <td ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rt']; }  else {echo $hasil['N2_rt_ayah'] ; } ?></td>
          <td >RW:</td>
          <td ><?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['rw']; }  else {echo $hasil['N2_rw_ayah'] ; } ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr>
          <td class="style3">II.</td>
          <td class="style3">1. Nama Lengkap dan Alias</td>
          <td class="style3">&nbsp;</td>
          <td class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['N2_nama_ibu'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3" >&nbsp;</td>
          <td width="30%" class="style3">2. Tempat dan Tanggal Lahir </td>
          <td class="style3" >:</td>
          <td width="66%" class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tempat_lahir']; }  else {echo $hasil['N2_tempat_lahir_ibu'] ; } ?>
            ,
            <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['tanggal_lahir']; }  else {echo $hasil['N2_tanggal_lahir_ibu'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">3. Warganegara </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">4. Agama</td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['agama']; }  else {echo $hasil['N2_agama_ibu'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">5. Pekerjaan </td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['pekerjaan']; }  else {echo $hasil['N2_pekerjaan_ibu'] ; } ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td >&nbsp;</td>
          <td width="30%">6. Tempat Tinggal </td>
          <td >:</td>
          <td colspan="2"><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['alamat']; }  else {echo $hasil['N2_alamat_ibu'] ; } ?></td>
          <td >RT:</td>
          <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rt']; }  else {echo $hasil['N2_rt_ibu'] ; } ?></td>
          <td >RW:</td>
          <td ><?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['rw']; }  else {echo $hasil['N2_rw_ibu'] ; } ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td >&nbsp;</td>
          <td width="97%">adalah ayah kandung dan ibu kandung dari   :</td>
        </tr>
      </table>
      <table  border="0">
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">1. Nama Lengkap dan Alias</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['nama_lengkap']; ?></td>
        </tr>
        <tr>
          <td class="style3" >&nbsp;</td>
          <td width="30%" class="style3">2. Tempat dan Tanggal Lahir </td>
          <td class="style3" >:</td>
          <td width="66%" class="style3"><?php echo $hasil['tempat_lahir']; ?>, <?php echo $hasil['tanggal_lahir']; ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">3. Warganegara </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">4. Agama</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['agama']; ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">5. Pekerjaan </td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['pekerjaan']; ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td >&nbsp;</td>
          <td width="30%">6. Tempat Tinggal </td>
          <td >:</td>
          <td colspan="2"><?php echo $hasil['alamat']; ?></td>
          <td >RT:</td>
          <td ><?php echo $hasil['rt']; ?></td>
          <td >RW:</td>
          <td ><?php echo $hasil['rw']; ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td >&nbsp;</td>
          <td width="97%">memberikan izin kepadanya untuk melakukan pernikahan dengan : </td>
        </tr>
      </table>
      <?php
$query6 = "
SELECT b.* 
FROM t_model_n as a
LEFT OUTER JOIN m_penduduk b ON a.N3_nik_calon_suami_istri = b.nik
WHERE a.penduduk_detail_id = '$penduduk_detail_id' ";

//print  $hasil ; 
$tampil6 = mysql_query($query6, $koneksi) or die ("Gagal Query".mysql_error());

$hasil6 = mysql_fetch_array($tampil6);
?>
      <table  border="0">
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">1. Nama Lengkap dan Alias</td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['nama_lengkap']; }  else {echo $hasil['N3_nama_calon'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3" >&nbsp;</td>
          <td width="30%" class="style3">2. Tempat dan Tanggal Lahir </td>
          <td class="style3" >:</td>
          <td width="66%" class="style3"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['tempat_lahir']; }  else {echo $hasil['N3_tempat_lahir_calon'] ; } ?>
            ,
            <?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['tanggal_lahir']; }  else {echo $hasil['N3_tanggal_lahir_calon'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">3. Warganegara</td>
          <td class="style3">:</td>
          <td class="style3"><?php echo $hasil['N1_warganegara']; ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">4. Jenis Kelamin </td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['jenis_kelamin']; }  else {echo $hasil['N3_jenis_kelamin_calon'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">5. Agama</td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['agama']; }  else {echo $hasil['N3_agama_calon'] ; } ?></td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td class="style3">6. Pekerjaan </td>
          <td class="style3">:</td>
          <td class="style3"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['pekerjaan']; }  else {echo $hasil['N3_pekerjaan_calon'] ; } ?></td>
        </tr>
      </table>
      <table  border="0">
        <tr class="style3">
          <td >&nbsp;</td>
          <td width="30%">7. Tempat Tinggal </td>
          <td >:</td>
          <td colspan="2"><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['alamat']; }  else {echo $hasil['N3_alamat_calon'] ; } ?></td>
          <td >RT:</td>
          <td ><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['rt']; }  else {echo $hasil['N3_rt_calon'] ; } ?></td>
          <td >RW:</td>
          <td ><?php if ($hasil6['nama_lengkap'] <> '' ) { echo $hasil6['rw']; }  else {echo $hasil['N3_rw_calon'] ; } ?></td>
        </tr>
      </table>
      <p><br>
        Demikianlah, surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sepenuhnya.</p>
      <table width="94%"   border="0">
        <tr>
          <td width="42%" bordercolor="#000000" class="style3"><p align="center">&nbsp;</p>
              <p align="center">I. Ayah </p>
            <p align="center">&nbsp;</p>
            <p align="center"><u>(
              <?php if ($hasil2['nama_lengkap'] <> '' ) { echo $hasil2['nama_lengkap']; }  else {echo $hasil['N2_nama_ayah'] ; } ?>
              )</u></p></td>
          <td width="16%" bordercolor="#000000" class="style3">&nbsp;</td>
          <td width="42%" bordercolor="#000000" class="style3"><p align="center"><?php echo $hasil['desa']; ?>,  ....................20....</p>
              <p align="center">II. Ibu </p>
            <p align="center">&nbsp;</p>
            <p align="center"><u>(
              <?php if ($hasil3['nama_lengkap'] <> '' ) { echo $hasil3['nama_lengkap']; }  else {echo $hasil['N2_nama_ibu'] ; } ?>
              )</u><br>
            </p></td>
        </tr>
      </table></td>
    <td width="4%">&nbsp;</td>
    <td width="48%">&nbsp;</td>
  </tr>
</table>