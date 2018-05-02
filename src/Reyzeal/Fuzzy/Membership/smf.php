<?php

namespace Reyzeal\Fuzzy\Membership;

use Reyzeal\Fuzzy\Membership;

class smf extends Membership{
	function calc($x){
		$i = $this -> parameter[0];
		$j = $this -> parameter[1];
		
		if ($x <= $i)
			return 0;
		if ($x >= $j) 
			return 1;
		if ($x > ($i+$j)/2) 
			return 1 - 2 * (($j-$x)/($j-$i))**2;
		if ($x <= ($i+$j)/2) 
			return 2 * (($x-$i)/($j-$i))**2;
	}
}