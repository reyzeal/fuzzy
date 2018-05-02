<?php 

namespace Reyzeal;

use Reyzeal\Fuzzy\Input;
use Reyzeal\Fuzzy\Output;
use Reyzeal\Fuzzy\Rules;

class Fuzzy
{
	private $name ;
	private $input ;
	private $output ;
	private $rules ;

	public function __construct($name = '',$type = ''){
		$this->input = new Input;
		$this->output = new Output($type);
		$this->rules = new Rules;

		$this->rules->input($this->input);
		$this->rules->output($this->output);
	}
	
	public function input(){
		return $this->input;
	}

	public function rules(){
		return $this->rules;
	}

	public function output(){
		return $this->output;
	}

	public function calc(Array $data){
		$result = $this->rules->calc($data);
		$this->output->setAggregate($result);
		$this->output->inference()->aggregation();
		return $this->output->inference()->defuzzy(); 
	}
}