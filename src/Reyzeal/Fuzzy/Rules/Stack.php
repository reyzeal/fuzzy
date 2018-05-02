<?php


namespace Reyzeal\Fuzzy\Rules;


class Stack{
	private $stacks;
	function __construct(){
		$this -> stacks = [];
	}
	public function push($element){
		$this -> stacks[] = $element;
	}
	public function pop(){
		$popped = array_pop($this->stacks);
		return $popped;
	}
	public function size(){
		return count($this->stacks);
	}
	public function peek(){
		return $this -> stacks[ $this->size() -1 ];
	}
	public function clear(){
		$this -> stacks=[];
	}
}