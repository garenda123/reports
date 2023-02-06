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
LEFT OUTER JOIN t_dukcapil_f105 c ON a.penduduk_detail_id = c.penduduk_detail_id
LEFT OUTER JOIN l_desa d ON b.desa_id = d.desa_id
WHERE a.penduduk_detail_id = '$penduduk_detail_id' "; 
//print $query;

$tampil = mysql_query($query, $koneksi) or die ("Gagal Query".mysql_error());

$hasil = mysql_fetch_array($tampil);
//echo $hasil['nama_lengkap'];

?>


<html>
<head>

<link rel="STYLESHEET" href="cetak.css" type="text/css" />
</head>

<body>



<div id="body">

<div id="section_header">
</div>

<table style="width: 100%;" class="header" border="0">  
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="69%">&nbsp;</td>
    <td width="13%"> <div align="center">
      <table width="100%"  border="1">
        <tr>
          <td bordercolor="#000000"><div align="center"><strong>F-1.05</strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

<?php
	for ($i=1; $i<=2;$i++)
	{
?>
<table style="width: 100%;" class="header" border=0>
<tr>
<td><p align="center" class="style1">SURAT PERNYATAAN PERUBAHAN DATA PENDUDUK<br>
  WARGA NEGARA INDONESIA  </p>
  </td>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
<td bordercolor="#000000"> 
  <p align="left"> Yang bertanda tangan di bawah ini : <br>
  </p></td>
<tr>
</table>

<table style="width: 100%;" class="header" border=0>
<tr>
  <td width="3%" bordercolor="#000000">&nbsp;</td>
  <td width="17%" bordercolor="#000000">Nama lengkap</td>
  <td width="2%" bordercolor="#000000">:</td>
  <td width="78%" bordercolor="#000000"><?php echo $hasil['nama_lengkap']; ?></td>
  <tr>
  <td bordercolor="#000000">&nbsp;</td>
  <td height="23" bordercolor="#000000">NIK</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php echo $hasil['NIK']; ?></td>
  <tr>
  <td bordercolor="#000000">&nbsp;</td>
  <td bordercolor="#000000">Alamat rumah</td>
  <td bordercolor="#000000">:</td>
  <td bordercolor="#000000"><?php echo $hasil['alamat']; ?></td>
</table>
<p>&nbsp;</p>   
</p>
Menyatakan bahwa data dan status kependudukan saya telah berubah, mengenai :
<table width="100%" border="0">
  <tr>
    <th width="3%"  bordercolor="#000000" class="kotak" scope="row">
	<?php 
	if ($hasil['pendidikan_terakhir_menjadi'] != '')
		{ 
			echo 'X'; 
		}

	?>&nbsp;</th>
	 <td width="2%">&nbsp;</td>
    <td width="95%">Pendidikan terakhir</td>
  </tr>
  <tr>
    <th bordercolor="#000000" class="kotak" scope="row"><?php 
	if ($hasil['pekerjaan_menjadi'] != '')
		{ 
			echo 'X'; 
		}

	?></th>
    <td>&nbsp;</td>
    <td>Pekerjaan</td>
  </tr>
  <tr>
    <th bordercolor="#000000" class="kotak" scope="row"><?php 
	if ($hasil['agama_menjadi'] != '')
		{ 
			echo 'X'; 
		}

	?></th>
    <td>&nbsp;</td>
    <td>Agama</td>
  </tr>
  <tr>
    <th rowspan="2" bordercolor="#000000" class="kotak" scope="row"><?php 
	if ($hasil['perubahan_lain_menjadi'] != '')
		{ 
			echo 'X'; 
		}

	?></th>
    <td>&nbsp;</td>
    <td>Perubahan lain,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>sebutkan : <?php echo $hasil['perubahan_lainnya']; ?>*)</td>
  </tr>
</table>
<p>&nbsp;</p>

<table width="100%" border="0">
  <tr>
    <td width="2%">1. </td>
    <td width="5%"><table width="97%" border="0">
      <tr>
        <td class="kotak">&nbsp;</td>
      </tr>
    </table></td>
    <td width="93%">Pendidikan terakhir </td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="18%">Semula</td>
	<td width="1%">:</td>
	<td colspan="3"  ><?php echo $hasil['pendidikan_semula']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Menjadi</td>
    <td>:</td>
    <td colspan="3"><?php echo $hasil['pendidikan_menjadi']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dasar perubahan</td>
    <td>:</td>
    <td width="20%"><?php echo $hasil['dasar_perubahan_pendidikan']; ?></td>
    <td width="20%">No : <?php echo $hasil['no_dasar_perubahan_pendidikan']; ?></td>
    <td width="39%">Tgl : <?php echo $hasil['tanggal_dasar_perubahan_pendidikan']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="2%">2. </td>
    <td width="5%"><table width="100%" border="0">
      <tr>
        <td class="kotak">&nbsp;</td>
      </tr>
    </table></td>
    <td width="93%">Pekerjaan</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="18%">Semula</td>
    <td width="1%">:</td>
    <td width="20%"><?php echo $hasil['pekerjaan_semula']; ?></td>
    <td colspan="2">menjadi : <?php echo $hasil['pekerjaan_menjadi']; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dasar perubahan </td>
    <td>:</td>
    <td><?php echo $hasil['dasar_perubahan_pekerjaan']; ?></td>
    <td width="20%">No : <?php echo $hasil['no_dasar_perubahan_pekerjaan']; ?></td>
    <td width="39%">Tgl : <?php echo $hasil['tanggal_dasar_perubahan_pekerjaan']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="2%">3. </td>
    <td width="5%"><table width="98%" border="0">
      <tr>
        <td class="kotak">&nbsp;</td>
      </tr>
    </table></td>
    <td width="93%">Agama</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="18%">Semula</td>
    <td width="1%">:</td>
    <td width="20%"><?php echo $hasil['agama_semula']; ?></td>
    <td colspan="2">menjadi : <?php echo $hasil['agama_menjadi']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dasar perubahan </td>
    <td>:</td>
    <td><?php echo $hasil['dasar_perubahan_agama']; ?></td>
    <td width="20%">No : <?php echo $hasil['no_dasar_perubahan_agama']; ?></td>
    <td width="39%">Tgl : <?php echo $hasil['tanggal_dasar_perubahan_agama']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="2%">4. </td>
    <td width="5%"><table width="97%" border="0">
      <tr>
        <td class="kotak">&nbsp;</td>
      </tr>
    </table></td>
    <td width="93%">Perubahan lainnya, sebutkan <?php echo $hasil['perubahan_lainnya']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="2%" height="22">&nbsp;</td>
    <td width="18%">Semula</td>
    <td width="1%">:</td>
    <td width="20%"><?php echo $hasil['perubahan_semula']; ?></td>
    <td colspan="2">menjadi : <?php echo $hasil['perubahan_menjadi']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dasar perubahan </td>
    <td>:</td>
    <td><?php echo $hasil['dasar_perubahan_lainnya']; ?></td>
    <td width="20%">No : <?php echo $hasil['no_dasar_perubahan_lainnya']; ?></td>
    <td width="39%">Tgl : <?php echo $hasil['tanggal_dasar_perubahan_lainnya']; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><p>Terlampir kami sampaikan copy dari berkas-berkas yang terkait dengan perubahan-perubahan tersebut.<br>
      Demikian Surat Pernyataan ini saya buat dengan sebenarnya, apabila dalam keterangan yang saya berikan terdapat hal-hal yang tidak berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai ketentuan peraturan perundang-undangan yang berlaku.</p>
    </td>
  </tr>
</table>
<table width="100%"  border="0">
  
  <tr>
    <td width="46%"><p align="center"><br>
      </p>
    </td>
    <td width="17%">&nbsp;</td>
    <td width="37%"><p align="center">Purworejo, ....................20.... </p>
      <div align="center">Yang membuat pernyataan,</div>
      <table width="47" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p align="center" class="style2">Materai Rp.6000,- </p>
      <p align="center"><u>(<?php echo $hasil['nama_lengkap']; ?>)</u><br>
    </p>    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td><strong><u>Keterangan : </u></strong></td>
  </tr>
  <tr>
    <td>*) Perubahan lainnya ini, juga dapat digunakan untuk merubah data kependudukan yang diakibatkan adanya kesalahan pada waktu pengisian Formulir Biodata maupun kesalahanpada saat peng-entry-an biodata penduduk yang dimaksud. </td>
  </tr>
</table>
<p>&nbsp;</p>

<?php
	}
?>


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
//$dompdf->set_paper('legal', 'landscape');
$dompdf->render();
//$dompdf->stream('coba.pdf');
$dompdf->stream('coba.pdf',array('Attachment' => 0));
//$dompdf->stream('my.pdf',array('Attachment'=>0));.
 
?>