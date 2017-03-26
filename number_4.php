<?php

class Path {
	private $_array = array();
	private $_end = 2;
	private $_result = 0;
	private $_result_array = array();

	public function __construct($array) {
		$this->_array = $array;
	}

	public function shortest_path($index = 1, $start = 1, $result = 0) {
		if ($start <= $this->_end) {
			if ($start === 1) {
				$result += $this->_array[$start][$index];
				$this->_result = $result;	
				$start++;
				$this->shortest_path(2, $start, $result);
			}
			else {
				for ($i=1; $i<=$index; $i++) {
					$result_array[] = $result + $this->_array[$start][$i];
				}
				$this->_result_array = $result_array;
			}
			
		}

		return $this->_result_array;
	}
}

$array[1][1] = 5;
$array[2][1] = 2;
$array[2][2] = 3;
$array[3][1] = 4;
$array[3][2] = 6;
$array[3][3] = 1;

$path = new Path($array);

$result = $path->shortest_path();

print_r($result);
