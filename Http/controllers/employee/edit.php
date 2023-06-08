<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if (! Validator::checkId($_GET['id'])) {
    $errors['id'] = 'ID is required.';
}
$id = trim($_GET['id']);
$errors = [];

if (! Validator::string($_POST['title'], 1, 5)) {
    $errors['body'] = 'A Title of no more than 5 characters is required.';
}

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

$note = $db->query('select * from notes where id = :id', [
    'id' => $id
])->findOrFail();

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Update Notes',
        'note' => $note,
        'id' => $id,
        'errors' => $errors
    ]);
}

header('location: /notes/edit');
die();
