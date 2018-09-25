<?php
require_once 'db.php';
require_once 'IProductRepository.php';
class ProductRepository implements IProductRepository{
	public function __construct(){
		$this->db = new db();
	}
	public function addProduct($product){
		
		return $this->db->addProduct($product);
	}
	public function update($id, $data){
		
		return $this->db->update($id, $data);
	}
	 public function delete($id){
		 
		 return $this->db->delete($id);
	}
	
	public function readllAll(){
		
		return $this->db->readllAll();
		
	}
	public function uniqSku($value)
	{
		
		return $this->db->uniqSku($value);
	}
	 public function selectById($id){
		 
		 return $this->db->selectById($id);
	}
	 public function deleteMultiple($ids=[]){
		 
//		 echo "<script>console.log($ids);</script>";
//		 print_r($ids);
		return $this->db->deleteMultiple($ids=[]);
	}
	
}