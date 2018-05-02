<?php

namespace Reyzeal\Fuzzy\Membership;

use Reyzeal\Fuzzy\Membership;

class trimf extends Membership{
	function calc($x){
		$a = $this -> parameter[0];
		$b = $this -> parameter[1];
		$c = $this -> parameter[2];
		return max(min( ($x-$a)/($b-$a), ($c-$x)/($c-$b) ),0);
	}
}