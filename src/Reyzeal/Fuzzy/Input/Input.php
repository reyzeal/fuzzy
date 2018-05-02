<?php

namespace Reyzeal\Fuzzy;

use stdClass;
use Reyzeal\Fuzzy\Membership\Category;

class Input{
	private $category;

	function __construct(){
		$this->category = new stdClass();
	}

	public function addCategory($str){
		$newCategory = new Category();
		//$newCategory -> name = $str;
		$this->category->{$str} = $newCategory;
		return $newCategory;
	}

	public function calc($name,$x){
		$result = new stdClass();
		foreach ($this->category->{$name} as $cat) {
			$result->{$name} = [];
			foreach ($cat as $mf) {
				$result->{$name}[$mf->name] = $mf->calc($x);
			}
		}
		return $result;
	}
}