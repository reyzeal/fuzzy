<?php

namespace Reyzeal\Fuzzy\Membership;

use Reyzeal\Fuzzy\Membership;

class zmf extends Membership{
	function calc($x){
		$i = $this -> parameter[0];
		$j = $this -> parameter[1];
		
		if ($x <= $i) 
			return 1;
		if ($x >= $j) 
			return 0;
		if ($x <= ($i+$j)/2) 
			return 1 - 2 * (($i-$x)/($j-$i))**2;
		if ($x > ($i+$j)/2) 
			return 2 * (($x-$j)/($j-$i))**2;
	}
}