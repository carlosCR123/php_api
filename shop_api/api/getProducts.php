<?php
header('Content-Type: application/json');

require_once '../config/config.php';
require_once '../models/product.php';

class GetProducts {

    function getAllProducts()
    {
        $database = new DB();
        $db = $database->connect();
        $productModel = new Product($db);

        $results = $productModel->readAll();
        
        if ($results->rowCount() > 0) {
            $products = array();
            while ($data = $results->fetch(PDO::FETCH_ASSOC)) {
                array_push($products, array(
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'price'     => $data['price'],
                    'category'  => $data['category']
                ));
                
            }
            return json_encode($products);

        } else {
            return json_encode(array(
                'message' => 'No hay productos'
            ));
        }
    }

}

$getProducts = new GetProducts();

echo $getProducts->getAllProducts();
