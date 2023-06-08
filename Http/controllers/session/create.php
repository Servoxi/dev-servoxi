<?php
// This file is responsible for login
use Core\Validator;
use Core\Database;
use Core\Session;
$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];
if(isset($_POST['login'])){
    $user['username'] = $_POST['username'];
    $password = $_POST['password'];
        
    if(empty($user['username']) || empty($password)){
        Session::flash('errors', __('All fields are mandatory'));
        return redirect('/admin');
    }
    
    // Check user exists or not
    if(!empty($user['username'])){
        $user = $db->query('select * from admin where username = :username', [
            'username' => $user['username']
        ])->find();
    }

    $ret = password_verify($password, $user['passwd']);
    if(empty($ret)){
        Session::flash('errors', __('Username and Password does not match'));
        return redirect('/admin');
    }

    if(Session::has('errors')){
        Session::flash('errors', __('All fields are mandatory'));
        return redirect('/admin');
    }

    login($user);
    header('location: /');
    exit();
}


view('session/create.view.php', [
    'errors' => Session::get('errors')
]);