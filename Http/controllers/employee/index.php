<?php

use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);
$notes = $db->query('select * from notes where user_id = 1')->get();

view("employee/index.view.php", [
    'heading' => 'List Employees',
    'notes' => $notes
]);