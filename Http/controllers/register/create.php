<?php
use Core\Database;
use Core\Session;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if(isset($_POST['register'])){
    if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cnf_password']) || empty($_POST['username'])){
        Session::flash('errors', __('All fields are mandatory'));
        redirect('/register');
    }

    $user['username'] = $_POST['username'];
    $user['email'] = $_POST['email'];
    $password = $_POST['password'];
    $cnf_password = $_POST['cnf_password'];
    
    // Check user exists or not
    $exists = $db->query('select * from admin where email = :email', [
        'email' => $user['email']
    ])->find();

    if($password != $cnf_password){
        Session::flash('errors', __('Confrim password does not match !'));
       return redirect('/register');
    }

    if(!empty($exists)){
        Session::flash('errors', __('Email :email Alredy Exists!', ['email'=>$user['email']]));
        return redirect('/register');
    }

    // All good lets create user
    $db->query('INSERT INTO admin(username, email, passwd) VALUES(:username, :email, :passwd)', [
        'username' => $user['username'],
        'email' => $user['email'],
        'passwd' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);
    
    header('location: /');
    exit();
}


view("register/create.view.php", [
    'errors' => Session::get('errors')
]);