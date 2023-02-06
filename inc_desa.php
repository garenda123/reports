<label for="desa">DESA : </label>

<?php echo "<select name='desa'>
<option value=0 selected> PILIH DESA </option>";
$tampil=mysql_query("SELECT desa_id, Ucase(desa) as desa FROM l_desa ORDER BY desa");
while($r=mysql_fetch_array($tampil)){
echo "<option value=$r[desa_id]>$r[desa]</option>";
}
echo "</select>"; ?>