<?php

class View
{
	public $view_bag;
	public $name;

	public function __construct($params, $name=""){
		$this->name = $name;
		$this->view_bag = $params;
	}
}