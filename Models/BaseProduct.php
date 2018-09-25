<?php
require_once 'db.php';
abstract class BaseProduct extends db{
	public function __construct($data){
		$this->sku=$data['sku'];
		$this->name=$data['name'];
		$this->price=$data['price'];
		$this->type=$data['type'];
	}
	public function addProduct($product){
		return parent::addProduct($product);
	}
	public function update($id, $data){
		return parent::update($id, $data);
	}
	 public function delete($id){
		 parent::delete($id);
	}
	
	public function readllAll(){
		return parent::readllAll();
		
	}
	public function uniqSku($value){
		return parent::uniqSku($value);
	}
	 public function selectById($id){
		 return parent::selectById($id);
	}
	 public function deleteMultiple($ids=[]){
		 db::deleteMultiple($ids=[]);
//		  parent::
	}

}