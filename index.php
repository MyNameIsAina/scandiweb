<?php
require "Controllers/Controller.php";
require "Models/DB.php";
require "Models/Product.php";

require "resources/config/config.php";

$dbCon =new DB();
$controller = new Controller($dbCon);
                                                               
