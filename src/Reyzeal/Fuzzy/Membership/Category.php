<?php

namespace Reyzeal\Fuzzy\Membership;

use stdClass;
use Reyzeal\Fuzzy\Membership;

class Category{
	public $memberships;

	function __construct(){
		$this->memberships = new stdClass();
	}
	public function addMembership($name,$func,Array $args){
		$strfunc = "Reyzeal\Fuzzy\Membership\\".$func;
		$membership = new $strfunc($args);
		$membership->name=$name;
		$this->memberships->{$name} = $membership;
		return $this;
	}
}