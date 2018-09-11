<?php
class Controller {
    private $db;
    public function __construct(DB $db) {
        $this->db = $db;
        $this->index();
    }
    public function index(){
        $id=""; $sku=""; $name=""; $price=""; $type=""; $option="";
        $types=[]; $furnitureVal=[];
        
        
        $page=$_SERVER['REQUEST_URI'];
        $uriSegments=explode('/', parse_url($page, PHP_URL_PATH));
        $id=(isset($uriSegments[2])) ? $uriSegments[2] : "";
        $idd=(array_key_exists('id',$_GET)) ? $_GET['id']: "";
        
        switch($page){
            case ($page==="/"):
                require "Views/start.php";
                break;
            
            case ($page==="/add"):
                $this->getColNames();
                if(isset($_POST['addProduct'])){
                    $product = new Product();
                    if(!$this->db->uniqSku($_POST[$this->sku])){// false jo neatrada neko
                        $product->setSku($_POST[$this->sku]);
                        $product->setName($_POST[$this->name]);
                        $product->setPrice($_POST[$this->price]);
                        $product->setType($_POST[$this->type]);
                        if($_POST[$this->type]===$this->types['book']){
                            $product->setOption($_POST[$this->types['book']]);
                        }elseif($_POST[$this->type]===$this->types['dvd']){
                             $product->setOption($_POST[$this->types['dvd']]);
                        }elseif($_POST[$this->type]===$this->types['furniture']){
                            $seperator="x";
                            $furniture= $_POST[$this->furnitureVal['fheight']].$seperator.$_POST[furnitureVal['fwidth']].$seperator.$_POST[furnitureVal['flength']];
                            $product->setOption($furniture);
                        }
                        $theProduct=$product->toArray();
                        $this->db->add($theProduct);
                        header('Location: /');
                    }else{                   
                    }
                }
                require "Views/add.php";
                break;
             case ($page==="/update/$id"):
                $this->getColNames();
                $product = new Product();
                if(isset($_POST['updateProduct'])){
                    $product->setSku($_POST[$this->sku]);
                        $product->setName($_POST[$this->name]);
                        $product->setPrice($_POST[$this->price]);
                        $product->setType($_POST[$this->type]);
                    if($_POST[$this->type]===$this->types['book']){
                            $product->setOption($_POST[$this->types['book']]);
                    }elseif($_POST[$this->type]===$this->types['dvd']){
                             $product->setOption($_POST[$this->types['dvd']]);
                    }elseif($_POST[$this->type]===$this->types['furniture']){
                        $seperator="x";
                        $furniture= $_POST[$this->furnitureVal['fheight']].$seperator.$_POST[furnitureVal['fwidth']].$seperator.$_POST[furnitureVal['flength']];
                        $product->setOption($furniture);
                    }
                    $theProduct=$product->toArray();
                    $this->db->update($id, $theProduct);
                    header('Location: /');
                }
                require "Views/update.php";
                break;
            case ($page==="/del?id=$idd"):
                header('Location: /');
                require "Views/start.php";
                $this->db->delete($idd);
                break;
            case ($page==="/del"):
                 header('Location: /');
                require "Views/start.php";
                $productIds=$_POST['mycheckbox'];
                $this->db->deleteMultiple($productIds);
                break;
            default:
                require "Views/start.php";
                break;
        }
    }
    
    public function messages() {
        include 'Messages.php';
        if(isset($_POST['addProduct'])){Messages::error("The SKU '".$_POST['sku']."' already exists");}
    }
    public function getColNames(){
        $arr= file_get_contents('./Models/TableCols.json');
        $json_a= json_decode($arr, true);
        //$arr = json_decode('cols', true);
        $this->id=$json_a[0]['id'];
        $this->sku=$json_a[0]['sku'];
        $this->price=$json_a[0]['price'];
        $this->name=$json_a[0]['name'];
        $this->type=$json_a[0]['type'];
        $this->option=$json_a[0]['option'];
        $this->types=$json_a[0]['types'];
        $this->furnitureVal=$json_a[0]['types']['furnitures'];
    }
}