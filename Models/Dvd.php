<?php
require_once 'BaseProduct.php';

class Dvd extends BaseProduct{
	public $option;
	public function __construct($data){
		parent::__construct($data);
		$this->option=$data['dvd'];
	}
	
}
