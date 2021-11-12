<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers");

require_once "../config/config.php";
require_once "../models/product.php";

class RegisterProduct {

    function register()
    {
        $connector = new DB();
        $db = $connector->connect();
        $productModel = new Product($db);

        $data = json_decode(file_get_contents("php://input"));
        $productModel->name     = $data->name;
        $productModel->price    = $data->price;
        $productModel->category = $data->category;

        $result = $productModel->create();


        return $result ? "OK" : json_encode(array('message'=>'Error'));
    }

}

$registerProduct = new RegisterProduct();
echo $registerProduct->register();