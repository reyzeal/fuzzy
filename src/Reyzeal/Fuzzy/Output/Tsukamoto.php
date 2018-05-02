<?php

namespace Reyzeal\Fuzzy\Inference;

use Reyzeal\Fuzzy\Output;
use Reyzeal\Fuzzy\Inference;

class Tsukamoto implements Inference {
	public $alpha,$data,$aggregate,$then;
	public function aggregation(){
		$str = [];
		$this->aggregate = [];
		for($i = 0 ; $i < sizeof($this->alpha) ; $i++){
			$this->aggregate[] = 
			$this->alpha[$i] * $this->data[$i]->{$this->then[$i][0]}->{$this->then[$i][1]};
			$str[] = "(".$this->alpha[$i].' * '. $this->data[$i]->{$this->then[$i][0]}->{$this->then[$i][1]}.")";
		}
		$str = implode(' + ', $str);
		echo "$str";
	}
	public function defuzzy(){
		$total = 0;
		$total_alp = 0;
		foreach ($this->aggregate as $val) {
			$total += $val;
		}
		foreach ($this->alpha as $val) {
			$total_alp += $val;
		}
		echo "= $total / $total_alp = ";
		return $total/$total_alp;
	}
}