<?php


namespace Reyzeal\Fuzzy;

use stdClass;
use Reyzeal\Fuzzy\Input;
use Reyzeal\Fuzzy\Rules\SingleRule;

class Rules{
	public $input;
	public $output;
	public $result;
	private $rules;
	function __construct(){
		$this->rules = [];
	}
	public function add($str){
		$this->rules[] = new SingleRule($str);
		return $this;
	}
	public function then($str){
		$this->rules[count($this->rules)-1]->then = $str;
	}
	public function input(Input $input){
		$this->input = $input;
	}
	public function output(output $output){
		$this->output = $output;
	}
	public function calc($x){
		$input = new stdClass();
		$output = [];
		foreach ($x as $key => $value) {
			$input->{$key} = ($this -> input -> calc($key,$value))->{$key};
		}
		$alfa = [];
		$then = [];
		$data = [];
		foreach ($this->rules as $rule) {
			$rule->set($input);
			$y = $rule->calc($x);
			$alfa[] = $y;
			$then[] = explode('_',$rule->then);
			$data[] = $this->output->calc(explode('_',$rule->then)[0],$y);
		}
		return ['alpha'=>$alfa,'data'=>$data,'then'=>$then];
	}
}