<?php

class DB{
    public  $dbCon=null;// variable for db conecion
    public function __construct(){// connection is given in the constructor and saved onto local variable
        $config = require "resources/config/config.php";
        $this->dbCon = new mysqli($config['db_host'], $config['db_user'], $config['db_password'], $config['db_db']);
    }
    
    public function reallAll(){
        $sql="SELECT * from productlist";
        $response= mysqli_query($this->dbCon, $sql);
        if(!$response){
            return 'Something is wrong';
        }else{
            return $response;
        }
    }
    public function selectById($id){
        $sql="SELECT * from productlist WHERE id=$id";
        $response= mysqli_query($this->dbCon, $sql);
        if(!$response){
            return 'Something is wrong';
        }else{
            return $response;
        }
    }
//    crud methods
     public function add($data){
        $sku=$data['sku'];
        $name=$data['name'];
        $price=$data['price'];
        $type=$data['type'];
        $option=$data['option'];
        $sql = "INSERT INTO productlist(sku, name, price, type, option) VALUES ('$sku','$name', '$price','$type','$option' )";
        if(!$this->dbCon){
            echo "error";
        }
        $response= mysqli_query($this->dbCon, $sql);
        
        if(!$response){
            echo mysqli_error($this->dbCon);
        }else{
//            echo "added";
        }
    }
    
    public function update($id, $data){
        $sku=$data['sku'];
        $name=$data['name'];
        $price=$data['price'];
        $type=$data['type'];
        $option=$data['option'];
        
        $sql="UPDATE productlist SET sku='$sku',name='$name', price ='$price',type= '$type', option='$option' WHERE id='$id'";
        $response= mysqli_query($this->dbCon, $sql);
        if(!$response){
            echo mysqli_error($this->dbCon);
        }else{
            //echo "updated";
        }
    }
    public function delete($id){
        $sql="DELETE FROM productlist WHERE id='$id'";
        $response= mysqli_query($this->dbCon, $sql);
        if(!$response){
            return mysqli_error($this->dbCon);
        }else{
            return "deleted";
        }
    }
    public function deleteMultiple($ids=[]){
        foreach ($ids as $value) { 
            $sql = "DELETE FROM productlist WHERE id={$value}"; 
             $response = mysqli_query($this->dbCon, $sql); 
            if(!$response){
            echo mysqli_error($this->dbCon);
            }else{
//                echo "updated";
            }
        }  
    }
    public function uniqSku($value){
        if($value!=""){
            $sql="SELECT * FROM productlist WHERE sku='$value'";
            $result = mysqli_query($this->dbCon, $sql);
           
            if($result->num_rows){
                 return true;
            }else{ return false;}
        }
    }
}