
<?php
function encode($param) {
	$n = strlen($param);
	$result = '';
	for ($i = 0; $i < $n; $i++) {
		$result .= chr(ord($param[$i]) + 16);
	}
	return strtoupper($result);	
}

$string = 'Saya_mau_makan';
$input = strtoupper($string);

$encode = encode($input);

echo $encode;


