<?php

namespace Reyzeal\Fuzzy\Rules;

class Logic{
	public static function AND($x,$y){
		return min($x,$y);
	}

	public static function OR($x,$y){
		return max($x,$y);
	}

	public static function MEAN_AND($x,$y){
		return $x*$y;
	}
}