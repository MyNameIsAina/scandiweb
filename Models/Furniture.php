<?php
require_once 'BaseProduct.php';

class Furniture extends BaseProduct{
	public $width; public $height; public $option; public $length;
	public function __construct($data){
		parent::__construct($data);
		$this->width=$data['fwidth'];
		$this->height=$data['fheight'];
		$this->length=$data['flength'];
		$wid=$this->width;
		$hei=$this->height;
		$len=$this->length;
		$concatstring= $wid."x".$hei."x".$len;
		$this->option= $concatstring;
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