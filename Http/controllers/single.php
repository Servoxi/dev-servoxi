<?php
use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);

// To get product using product id
if($_GET['id'] && !empty($_GET['id'])){
    $product_id = $_GET['id'];
    $products = $db->query('SELECT * FROM products where p_id = '.$product_id)->find();
    $imgs = $db->query('SELECT * FROM images where p_id = '.$product_id)->get();
    $related_products = $db->query('SELECT * from products ORDER BY RAND() LIMIT 3')->get();
    
}
// r_print($related_products);die();
view("single.view.php", [
    'heading' => 'show product',
    'product' => $products ?? NULL,
    'images' => $imgs ?? NULL,
    'related_products' => $related_products ?? NULL
]);