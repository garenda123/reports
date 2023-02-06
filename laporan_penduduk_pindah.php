<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DATA PENDUDUK PINDAH</title>
</head>

<body>
<?php
include "koneksi.php"; ?>
<dialog id="data_izin">
<form method="get" action="laporan_penduduk_pindah_2.php">
     <?php include 'inc_bulan.php'; ?> 
	 <?php include 'inc_tahun.php'; ?> <br><br>
	 <?php include 'inc_desa.php'; ?>
    <br><br>
      <input type="reset" value="RESET">
      <input type="submit" value="CARI">
</form>
</dialog>
<menu>
  <button id="updateDetails">DATA CARI</button>
</menu>

<script>
  (function() {
    var updateButton = document.getElementById('updateDetails');
    var cancelButton = document.getElementById('cancel');
    var favDialog = document.getElementById('data_izin');

    // Update button opens a modal dialog
    updateButton.addEventListener('click', function() {
      favDialog.showModal();
    });

    // Form cancel button closes the dialog box
    cancelButton.addEventListener('click', function() {
      favDialog.close();
    });

  })();
</script>
</body>
</html>
