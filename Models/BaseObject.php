<?php
require_once 'BaseProduct.php';

class BaseObject extends BaseProduct{
	
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
//		 echo "<script>console.log($ids);</script>";
//		 print_r($ids);
		 parent::deleteMultiple($ids=[]);
	}
	
}