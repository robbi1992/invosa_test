<?php
class Rate {
	private $_exists_rate = array();

	public function set_rate($name1, $name2, $rate) {
		$check = $this->check_rate($name1, $name2);
		//var_dump($check); exit();
		if ($check) {
			$data = $this->get_data();
			$data[$name1 . '-' . $name2] = $rate;
			$data[$name2 . '-' . $name1] = 1 / $rate;
			file_put_contents('data.json', json_encode($data));
			return TRUE;
		}
		return FALSE;
	}

	public function calc_rate($name1, $name2, $input) {
		$exists_rate = $this->get_data();
		if (isset($exists_rate[$name1 . '-' . $name2])) {
			$result = $input * $exists_rate[$name1 . '-' . $name2];
			return is_float($result) ? number_format($result, 2, '.', ',') : $result;
		}
	}

	private function get_data() {
		return json_decode(file_get_contents('data.json'), TRUE);
	}

	private function check_rate($name1, $name2) {
		$exists_rate = $this->get_data();
		if (isset($exists_rate[$name1 . '-' . $name2])) return FALSE;
		if (isset($exists_rate[$name2 . '-' . $name1])) return FALSE;
		return TRUE;
	}
}

$postdata = json_decode(file_get_contents("php://input"), TRUE);

$obj = new Rate();
$result = array();
$output = array();

foreach ($postdata['console'] as $rows) {
	//echo $cmd . $name1 . $name2 .$rate; exit();
	if ($rows !== 'END') {
		$exp = explode(' ', $rows);
			$cmd = $exp[0];
			$name1 = $exp[1];
			$name2 = $exp[2];
			$rate = intval($exp[3]);
	
		if ($cmd === 'ADD') {
			$set = $obj->set_rate($name1, $name2, $rate);
			if ($set) $output[] = 'SUCCESS';
			else $output[] = 'ERROR: RATE';
		}
		else if ($cmd === 'CALC') {
			$calc = $obj->calc_rate($name1, $name2, $rate);
			if ($calc !== FALSE) $output[] = $calc;
		}
	}
}

header('Content-Type: application/json');
echo json_encode($output);
