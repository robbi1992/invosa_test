<?php

function recursive($param) {
	$result = 1;
	if ($param >= 2) {
		$result = ($param * recursive($param - 3));
	}
	return $result;
}

echo recursive(5);