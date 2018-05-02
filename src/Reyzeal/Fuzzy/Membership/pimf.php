<?php
namespace Reyzeal\Fuzzy\Membership;

use Reyzeal\Fuzzy\Membership;

class pimf extends Membership{
	
	function calc($x){
		$a = $this -> parameter[0];
		$b = $this -> parameter[1];
		$c = $this -> parameter[2];
		$d = $this -> parameter[3];
		
		if ($x < $a || $x > $d)
			return 0;
		if ($x <= $b)
			return (new smf([$a,$b]))->calc($x);
		if ($x > $c)
			return (new zmf([$c,$d]))->calc($x);
		return 1;
	}
	
}