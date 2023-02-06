<label for="layanan">LAYANAN : </label>

<?php echo "<select name='layanan'>
<option value=0 selected> PILIH LAYANAN </option>";
$tampil=mysql_query("SELECT id, Ucase(namaLayanan) as layanan FROM layanan ORDER BY id");
while($r=mysql_fetch_array($tampil)){
echo "<option value=$r[id]>$r[layanan]</option>";
}
echo "</select>"; ?> 