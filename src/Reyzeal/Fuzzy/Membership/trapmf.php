<?php

namespace Reyzeal\Fuzzy\Membership;

use Reyzeal\Fuzzy\Membership;

class trapmf extends Membership{
	function calc($x){
		$a = $this -> parameter[0];
		$b = $this -> parameter[1];
		$c = $this -> parameter[2];
		$d = $this -> parameter[3];
		
		if ($x < $a || $x > $d)
			return 0;
		if ($x <= $b)
			return ($x-$a)/($b-$a);
		if ($x >= $c)
			return ($d-$x)/($d-$c);
		return 1;
	}
	function reverse($y){
		$a = $this -> parameter[0];
		$b = $this -> parameter[1];
		$c = $this -> parameter[2];
		$d = $this -> parameter[3];
		
		if ($y == 0)
			return $a;
		if ($a != $b)
			return $y*($b-$a)+$a;
		if ($c != $d)
			return -($y*($d-$c)-$d);
		return $c;
	}
}