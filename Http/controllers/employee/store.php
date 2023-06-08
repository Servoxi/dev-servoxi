<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if (! Validator::string($_POST['title'], 1, 5)) {
    $errors['body'] = 'A Title of no more than 5 characters is required.';
}

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if(empty($_POST['id'])){
    $db->query('INSERT INTO notes(title, body, user_id) VALUES(:title, :body, :user_id)', [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
    if (! empty($errors)) {
        return view("notes/create.view.php", [
            'heading' => 'Create Note',
            'errors' => $errors
        ]);
    }
}else{
    $db->query('UPDATE notes set title = :title, body = :body, user_id = :user_id where id = :id', [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'id' => $_POST['id'],
        'user_id' => 1
    ]);
    // $notes = $db->query('select * from notes where user_id = 1')->get();

    // view("notes/index.view.php", [
    //     'heading' => 'My Notes',
    //     'notes' => $notes
    // ]);
    // return true;
    // if (! empty($errors)) {
    //     return view("notes/create.view.php", [
    //         'heading' => 'Update notes',
    //         'errors' => $errors
    //     ]);
    // }
}


header('location: /notes');
die();
