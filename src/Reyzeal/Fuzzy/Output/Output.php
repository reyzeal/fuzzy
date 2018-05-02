<?php

namespace Reyzeal\Fuzzy;

use stdClass;
use Reyzeal\Fuzzy\Membership\Category;

class Output{
	private $category;
	private $inference;
	function __construct($type = ''){
		$this->category = new stdClass();

		switch ($type) {
			case 'Tsukamoto':
				$this->inference=new \Reyzeal\Fuzzy\Inference\Tsukamoto();
				break;
			
			default:
				
				break;
		}
	}

	public function addCategory($str){
		$newCategory = new Category();
		$this->category->{$str} = $newCategory;
		return $newCategory;
	}

	public function calc($name,$y){
		$result = new stdClass();
		//echo "<br>data: <br>";
		foreach ($this->category->{$name} as $cat) {
			$result->{$name} = new stdClass();
			foreach ($cat as $mf) {
				$result->{$name}->{$mf->name} = $mf->reverse($y);
				//echo $y.' : '.$mf->reverse($y).'  '.print_r($mf,1).'<br>';
			}
		}
		return $result;
	}

	public function setAggregate($data){
		$this->inference->data = $data['data'];
		$this->inference->alpha = $data['alpha'];
		$this->inference->then = $data['then'];
	}

	public function inference(){
		return $this->inference;
	}
}