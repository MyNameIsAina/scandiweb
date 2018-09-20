<?php
require_once 'BaseProduct.php';

class Dvd extends BaseProduct{
	public $option;
	public function __construct($data){
		parent::__construct($data);
		$this->option=$data['dvd'];
	}
	public function addProduct($product){
		parent::addProduct($product);
	}
	public function update($id, $data){
		parent::update($id, $data);
	}
	 public function delete($id){
		 parent::delete($id);
	}
}
