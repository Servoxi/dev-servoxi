<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/shop', 'shop.php');
$router->get('/single', 'single.php');
$router->get('/update', 'update.php')->only('auth');
$router->post('/update', 'update.php')->only('auth');
$router->post('/add_product', 'add_product.php')->only('auth');
$router->get('/delete', 'delete.php')->only('auth');

$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/create.php')->only('guest');
$router->get('/admin', 'session/create.php')->only('guest');
$router->post('/admin', 'session/create.php')->only('guest');
$router->get('/logout', 'session/destroy.php')->only('auth');
// $router->post('/admin', 'admin/create.php')->only('auth');
// $router->get('/admin', 'admin/create.php')->only('auth');
// $router->get('/addproduct', 'session/.php')->only('auth');

