<?php

namespace Reyzeal\Fuzzy;

abstract class Membership{
	public $name;
	public function __construct(Array $parameter){
		$this->setParameter($parameter);
	}

	abstract function calc($x);
	
	public function getParameter(){
		return $this->parameter;
	}

	public function setParameter(Array $array){
		return $this->parameter = $array;
	}

	public function getFunctionName(){
		return $this->name;
	}

}