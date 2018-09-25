<?php

abstract class BaseProduct{
	public $id;	public $sku; public $name; public $price; public $type;
	public function __construct($data){
		$this->sku=$data['sku'];
		$this->name=$data['name'];
		$this->price=$data['price'];
		$this->type=$data['type'];
	}
}