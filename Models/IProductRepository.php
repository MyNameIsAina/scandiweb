<?php

interface IProductRepository{
	public function addProduct($product);
	public function update($id, $data);
	public function delete($id);
	public function readllAll();
	public function uniqSku($value);
	public function selectById($id);
	 public function deleteMultiple($ids=[]);
}