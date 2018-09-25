<?php
include_once './Models/ProductRepository.php';
include_once './Models/IProductRepository.php';
include_once './Models/Book.php';
include_once './Models/Dvd.php';
include_once './Models/Furniture.php';
class Controller {
	public $productRI;
    public function __construct(IProductRepository $productRepositoryInterface) {
		$this->productRI= $productRepositoryInterface;
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
//				$prodRep=new ProductRepository();
//				$bas=new BaseObject();
                require "Views/start.php";
				
                break;
            
            case ($page==="/add"):
                $this->getColNames();
                if(isset($_POST['addProduct'])){
					print_r($_POST);
                    if(!$this->productRI->uniqSku($_POST[$this->sku])){// false jo neatrada neko
                        if($_POST[$this->type]===$this->types['book']){
							$book = new Book($_POST);
							$this->productRI->addProduct($book);
                        }elseif($_POST[$this->type]===$this->types['dvd']){
							 $dvd= new Dvd($_POST);
							 $this->productRI->addProduct($dvd);
                        }elseif($_POST[$this->type]===$this->types['furniture']){
							$furniture= new Furniture($_POST);
							$this->productRI->addProduct($furniture);
                        }
                        header('Location: /');
                    }else{                   
                    }
                }
                require "Views/add.php";
                break;
             case ($page==="/update/$id"):
                $this->getColNames();
                if(isset($_POST['updateProduct'])){
                    if($_POST[$this->type]===$this->types['book']){
                        $book = new Book($_POST);
						$this->productRI->update($id,$book);
                    }elseif($_POST[$this->type]===$this->types['dvd']){
                        $dvd= new Dvd($_POST);
						$this->productRI->update($id,$dvd);
                    }elseif($_POST[$this->type]===$this->types['furniture']){
                        $furniture= new Furniture($_POST);
						$this->productRI->update($id,$furniture);
                    }
                    header('Location: /');
                }
                require "Views/update.php";
                break;
            case ($page==="/del?id=$idd"):
                header('Location: /');
                require "Views/start.php";
				
                $this->productRI->delete($idd);
                break;
            case ($page==="/del"):
                header('Location: /');
                require "Views/start.php";
                $productIds=$_POST['mycheckbox'];
                $this->productRI->deleteMultiple($productIds);
				
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