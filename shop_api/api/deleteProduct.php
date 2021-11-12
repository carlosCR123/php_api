<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers");

require_once "../config/config.php";
require_once "../models/product.php";

$connector = new DB();
$db = $connector->connect();
$productModel = new Product($db);

$data = json_decode(file_get_contents("php://input"));
$productModel->id = $data->id;
$result = $productModel->delete();

echo $result ? json_encode(array('message'=>'OK')) : json_encode(array('message'=>'Error'));