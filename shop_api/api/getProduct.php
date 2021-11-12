<?php
header("Content-Type: application/json");

require_once "../config/config.php";
require_once "../models/product.php";

class ReadProduct {

    public function getProduct() {

        $connector = new DB();
        $db = $connector->connect();
        $productModel = new Product($db);

        $productModel->id = isset($_GET['id']) ? $_GET['id'] : die();
        
        $productModel->read();

        $result = array(
            'id' => $productModel->id,
            'name' => $productModel->name,
            'price' => $productModel->price,
            'category' => $productModel->category
        );

        //Si es null devolver otra cosa
        return $result['id'] == null ? json_encode(array('message' => 'No encontre ni mierda')) : json_encode($result);
    }

}

$readProduct = new ReadProduct();
echo $readProduct->getProduct();
