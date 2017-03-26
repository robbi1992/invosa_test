<?php
class Path {
	private $_array = array();
	private $_routes = array();
	private $_start_value = 0;

	private function get_start_value() {
		return $this->_start_value;
	}

	public function __construct($path) {
		$this->_array = $path;
		$this->_start_value = $this->_array[1][1];
	}

	public function set_route($a, $b, $c, $d) {
		$total = $this->get_start_value() + $this->_array[$a[0]][$a[1]] + $this->_array[$b[0]][$b[1]] + $this->_array[$c[0]][$c[1]] + $this->_array[$d[0]][$d[1]];
		//echo $total; exit();
		$result = array(
			$total  => "n11 + n$a + n$b + n$c + n$d"
		);
		$this->_routes[$total] = $result;
	}

	public function get_shortes_route() {
		return min($this->_routes);
	}
}

$array[1][1] = 5;
$array[2][1] = 2;
$array[2][2] = 3;
$array[3][1] = 4;
$array[3][2] = 6;
$array[3][3] = 1;
$array[4][1] = 7;
$array[4][2] = 5;
$array[4][3] = 3;
$array[4][4] = 5;
$array[5][1] = 1;
$array[5][2] = 2;
$array[5][3] = 4;
$array[5][4] = 2;
$array[5][5] = 7;

$path = new Path($array);

$path->set_route('21', '31', '41', '51');
$path->set_route('21', '31', '41', '52');
$path->set_route('21', '31', '42', '52');
$path->set_route('21', '32', '42', '52');
$path->set_route('22', '32', '42', '52');
$path->set_route('21', '31', '42', '53');
$path->set_route('21', '32', '42', '53');
$path->set_route('21', '32', '43', '53');
$path->set_route('22', '32', '43', '53');
$path->set_route('22', '33', '43', '53');
$path->set_route('21', '32', '43', '54');
$path->set_route('22', '32', '43', '54');
$path->set_route('22', '33', '43', '54');
$path->set_route('22', '33', '44', '54');
$path->set_route('22', '33', '44', '55');

$shortest = $path->get_shortes_route();
echo 'The shortest path is: ' . $shortest[key($shortest)] . ' = ' . key($shortest);	
