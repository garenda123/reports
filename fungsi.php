<?php
function tanggal($x){ /* format date d/m/Y */
	date_default_timezone_set("Asia/Jakarta");
	$x = date_format(date_create($x), 'd/m/Y');

	if(!is_null($x)){
		if(strpos($x, '/')){
			$array_tanggal = explode('/', $x);
		}
		else if(strpos($x,'-')){
			$array_tanggal = explode('-', $x);
		}
		else if(strpos($x,' ')){
			$array_tanggal = explode(' ', $x);
		}

		switch ($array_tanggal[1]) {
			case '01':
				$bulanText = "Januari";
				break;
			case '02':
				$bulanText = "Februari";
				break;
			case '03':
				$bulanText = "Maret";
				break;
			case '04':
				$bulanText = "April";
				break;
			case '05':
				$bulanText = "Mei";
				break;
			case '06':
				$bulanText = "Juni";
				break;
			case '07':
				$bulanText = "Juli";
				break;
			case '08':
				$bulanText = "Agustus";
				break;
			case '09':
				$bulanText = "September";
				break;
			case '10':
				$bulanText = "Oktober";
				break;
			case '11':
				$bulanText = "November";
				break;
			case '12':
				$bulanText = "Desember";
				break;
			default:
				$bulanText = "Januari";
				break;
		}

		$out = $array_tanggal[0].' '.$bulanText.' '.$array_tanggal[2];

	}
	else{
		$out = "";
	}
	return $out;
}
?>