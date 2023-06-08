<?php
use Core\Database;
use Core\Session;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

// Update
if(isset($_GET['id'])){
	// Ftech the data
	$db->query('DELETE FROM products  WHERE p_id = :p_id', [
		'p_id' => $_GET['id']
	]);
	$db->query('DELETE FROM images  WHERE id = :p_id', [
		'p_id' => $_GET['id']
	]);
	
	// Redirect to update page with fetched data
	// Session::flash('errors', __('unable to save image'));
	return redirect('/shop');
	return true;
}
