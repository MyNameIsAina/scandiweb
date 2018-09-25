<?php

class db {
	public $id;	public $sku; public $name; public $price; public $type;

	public function conn(){
		 $config = require "resources/config/config.php";
		$dbCon=new mysqli($config['db_host'], $config['db_user'], $config['db_password'], $config['db_db']);
		return $dbCon;
	}
	public function readllAll(){
		 
		$dbCon= self::conn();
        $sql="SELECT * from productlist";
		
        $response= mysqli_query($dbCon, $sql);
        if(!$response){
            return 'Something is wrong';
        }else{
            return $response;
        }
    }
	public function uniqSku($value){
		$dbCon= self::conn();
        if($value!=""){
            $sql="SELECT * FROM productlist WHERE sku='$value'";
            $result = mysqli_query($dbCon, $sql);
           
            if($result->num_rows){
                 return true;
            }else{ return false;}
        }
    }
	 public function selectById($id){
		 $dbCon= self::conn();
        $sql="SELECT * from productlist WHERE id=$id";
        $response= mysqli_query($dbCon, $sql);
        if(!$response){
            return 'Something is wrong';
        }else{
            return $response;}
     }
	
	public function addProduct($product){
		$dbCon= self::conn();
		$sql = "INSERT INTO productlist(sku, name, price, type, option) VALUES ('$product->sku','$product->name', '$product->price','$product->type','$product->option' )";
		 $response= mysqli_query($dbCon, $sql);
		$res=!$response ?  mysqli_error($dbCon) :  "added";
		echo $res;
	}
	
    
    public function update($id, $data){
		$dbCon= self::conn();
        $sql="UPDATE productlist SET sku='$data->sku',name='$data->name', price ='$data->price',type= '$data->type', option='$data->option' WHERE id='$id'";
        $response= mysqli_query($dbCon, $sql);
        $res=!$response ?  mysqli_error($dbCon) :  "Updated";
		echo $res;
    }
    public function delete($id){
		$dbCon= self::conn();
        $sql="DELETE FROM productlist WHERE id='$id'";
        $response= mysqli_query($dbCon, $sql);
        $res=!$response ?  mysqli_error($dbCon) :  "Deleted";
		echo $res;
    }
    public function deleteMultiple($ids=[]){
		$dbCon= self::conn();
        foreach ($ids as $value) { 
            $sql = "DELETE FROM productlist WHERE id={$value}"; 
            $response = mysqli_query($dbCon, $sql); 
        }  
		$res=!$response ?  mysqli_error($dbCon) :  "Deleted";
		echo $res;
    }
	
}