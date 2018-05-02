<?php


namespace Reyzeal\Fuzzy\Rules;

use stdClass;
use Reyzeal\Fuzzy\Rules\Logic;
use Reyzeal\Fuzzy\Rules\Stack;

class SingleRule{
	private $rule;
	private $var;
	private $op;
	private $args;
	public $then;
	public function __construct($str=null,$args=null)
	{
		$this->var = new Stack();
		$this->op = new Stack();
		if($str){
			$this->rule =$str;
			//$this->set($str,null);
		}
	}
	private function parse($str){
		$a = explode(' ', trim($str));
		switch (sizeof($a)) {
			case 1:
				$this -> op -> push($a[0]);
			break;
			case 2:
				//$this -> var -> push( $this->args->{$a[0]} );
				$this -> var -> push( $this->getMembership($a[0]) );
				$this -> op -> push($a[1]);
				break;
			
			case 3:
				//$d = Logic::{$a[1]}($this->args->{$a[0]},$this->args->{$a[2]});
				$d = Logic::{$a[1]}($this->getMembership($a[0]),$this->getMembership($a[2]));
				
				while ($this->var->size() == $this->op->size() && $this->var->size() > 0) {
					$d = Logic::{$this->op->pop()}($d,$this->var->pop());
				}
				$this->var->push($d);
				break;
		}
	}
	public function set($in,$out=null){
		$this->input = $in;
		$this->output = $out;
		// $this->args = new stdClass();
		// foreach ($args as $arg) {
		// 	$this->args->{$arg} = 0;
		// }
		//$this->rule = $str;
	}
	public function calc($x){
		//$this -> x = $x;
		// foreach ($args as $key => $value) {
		// 	$this->args->{$key} = $value;
		// }
		$str = $this->rule;
		$c = strtok($str, '()');
		$this->parse($c);
		while ($c !== false) {
			$c = strtok('()');
			$this->parse($c);
		}
		$result = $this->var->peek();
		$this->reset();
		return $result;
	}

	public function reset(){
		$this->var->clear();
		$this->op->clear();
	}

	public function getMembership($str){
		$str = explode('_', $str);
		return $this-> input -> {$str[0]} [$str[1]];
	}
	public function then(){
		$result =[];
		if( is_array($this->then) ){
			foreach ($this->then as $str) {
				$str = explode('_', $str);
				$result[] = $this-> output -> {$str[0]} [$str[1]];
			}
		}
		$str = explode('_', $this -> then);
		return $this-> output -> {$str[0]} [$str[1]];
	}
}