<?php

ob_end_clean();
ob_start();
?>
<style type="text/css">
.fnt_italic { 
    font-size: 18px;
    font-style: italic;
    font-weight:bold;
    font-family:Arial, Helvetica, sans-serif;
}
.clsTd {
    font-size: 12px;
    /*font-family:"Courier New", Courier, monospace!important;*/
}
.clsBg {
    background-color:#000;
}
.clsBgGray {
    background-color:#CCCCCC;
}
.clsBgWhite {
    background-color:#FFF;
}
.clsBold {
    font-weight: bold;
}
.tbl { border:1px double #000000; }
.notes { font-size:10px; color:#999999; }
.clsDiv { padding-top: 20px; }
</style>
<div class="clsDiv">
<table align="center" cellpadding="6" cellspacing="2" width="90%" class="tbl">
  <tr>
    <td>
      <table border="0" cellpadding="6" cellspacing="2" width="90%" align="center">
         <tbody>
          <tr align="center">
            <td class="fnt_italic" colspan="2">Certificate</td>
          </tr>
          <tr align="center">
            <td colspan="2">Name</td>
          </tr>
          <tr align="center">
            <td colspan="2" class="clsTd">Email id</td>
          </tr>
         </tbody>
       </table>
     </td>
    </tr>
</table>       
</div>
<script type="text/php">
if ( isset($pdf) ) {

  $font = Font_Metrics::get_font("helvetica");
  $size = 9;
  $text_height = Font_Metrics::get_font_height($font, $size);

  $foot = $pdf->open_object();
  $w = $pdf->get_width();
  $h = $pdf->get_height();
  $y = $h - $text_height - 40;
  $pdf->close_object();
  $pdf->add_object($foot, "all");
  $color = array(0,0,255);
  $text2 = "Page: {PAGE_NUM} of {PAGE_COUNT}";
  $pdf->page_text(710, $y, $text2, $font, $size, $color);
  $text = "Text"; 
  $pdf->page_text(15, $y, $text, $font, $size, $color);
}
</script>
<?php
require_once("../dompdf_config.inc.php");
$data = ob_get_clean();
$old_limit = ini_set("memory_limit", "64M");
$dompdf = new DOMPDF();
$size = array(0,0,800.00,700.00);
$dompdf->load_html($data);
$dompdf->set_paper($size);
$dompdf->render();
$dompdf->stream('certificate.pdf');
?>