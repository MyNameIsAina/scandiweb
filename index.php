<?php
require "Controllers/Controller.php";
require_once  "Models/ProductRepository.php";


$controller = new Controller(new ProductRepository);
                                                               
