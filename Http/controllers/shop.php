<?php
use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);

$products = $db->query('SELECT * FROM products')->get();
// r_print($products);die();
view("shop.view.php", [
    'heading' => 'Shop',
	'products' => $products
]);