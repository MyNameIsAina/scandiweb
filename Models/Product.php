<?php

class Product{
    private $id;
    private $sku;
    private $name;
    private $price;
    private $type;
    private $option;
    public function __constructor($data=[]){
        if(isset($data['id'])){
            $this->id=$data['id'];
            $this->sku=data['sku'];
            $this->name=$data['name'];
            $this->price=$data['price'];
            $this->type=$data['type'];
            $this->option=$data['option'];
        }
    }
    /***@return mixed*/
    public function getId(){return $this->id;}
    /***@param mixed $id*/
    public function setId($id){ $this->id=$id;}
    
    /***@return mixed*/
    public function getSku(){return $this->sku;}
    /***@param mixed $sku*/
    public function setSku($sku){ $this->sku=$sku;}
    
    /***@return mixed*/
    public function getName(){return $this->name;}
    /***@param mixed $name*/
    public function setName($name){ $this->name=$name;}
    
     /***@return mixed*/
    public function getPrice(){return $this->price;}
    /***@param mixed $price*/
    public function setPrice($price){ $this->price=$price;}
    
     /***@return mixed*/
    public function getType(){return $this->type;}
    /***@param mixed $type*/
    public function setType($type){ $this->type=$type;}
    
     /***@return mixed*/
    public function getOption(){return $this->option;}
    /***@param mixed $option*/
    public function setOption($option){ $this->option=$option;}
    
    public function toArray(){
        return [
            "id"=>$this->getId(),
            "sku"=>$this->getSku(),
            "name"=>$this->getName(),
            "price"=>$this->getPrice(),
            "type"=>$this->getType(),
            "option"=>$this->getOption()
        ];
    }
}