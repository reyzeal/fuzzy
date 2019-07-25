<?php

namespace Reyzeal\Fuzzy\Membership;

use Reyzeal\Fuzzy\Membership;

class trimf extends Membership{
	function calc($x){
		$a = $this -> parameter[0];
		$b = $this -> parameter[1];
		$c = $this -> parameter[2];
        if($x < $a || $x > $c) return 0;
        elseif ($x < $b && $x >= $a) return ($x-$a)/($b-$a);
        elseif ($x <= $c && $x > $b) return ($x-$b)/($c-$b);
        return 1;
	}
	function reverse($y){
	    $a = $this->parameter[0];
	    $b = $this->parameter[1];
	    $c = $this->parameter[2];

	    return min(($y*($b-$a)+$a),$y*($c-$b)+$b);
    }
}