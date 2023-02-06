<?php
    ob_start();
    //include('file_html.html');
	include ('dukcapil_ktp.php') ;
	//echo "halo selamat datang";
    $content = ob_get_clean();
	echo $content ;
?>


