
<html>
<head>
<title>CETAK DAFTAR PENDUDUK BERDASARKAN GOLONGAN DARAH</title>
</head>
<?php 
include "koneksi.php"
?>
<body>

<form name="form1" method="post" action="latihan1.php">
  <label></label>
  <label></label>
<table width="100%" border="0">
    <tr>
      <td width="11%"><input name="radiobutton" type="radio" value="radiobutton">
Semua</td>
      <td width="13%"><label>RT : </label>
        <label>
        <select name="select">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        </label></td>
      <td width="76%"><label>RW : </label><label>
      <select name="select2">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        </label></td>
    </tr>
  </table>
<p>
  <label></label>
  <br>
</p>
</form>
</body>
</html>
