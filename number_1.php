<?php

class Bank {

	private $_balance = 1000000;
	private $_years = 0;
	private $_percentage = 12;

	public function set_years($years = 0) {
		$this->_years = $years;
	}

	public function get_total($i = 0) {
		if ($i < $this->_years) {
			$total = $this->_balance + (($this->_balance * $this->_percentage) / 100);
			$this->_balance = $total;
			$i++;
			$this->get_total($i);
		}
		return $this->_balance;
	}   
}

$bank = new Bank();

//change input here
$bank->set_years(3);

echo $bank->get_total();