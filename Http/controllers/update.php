<?php
use Core\Database;
use Core\Session;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];
$old_img = '';
// Ftech the data
if(!empty($_GET['id'])){
$update = $db->query('select * from products where p_id = :p_id', [
	'p_id' => $_GET['id']
	])->find();
	$old_img = ($update['p_main_img']) ?? '';
	// r_print($old_img);

}
if(isset($_POST['update'])){
	if(empty($_POST['p_name']) || empty($_POST['p_desc']) ||  empty($_POST['p_price'] )){
		Session::flash('errors', __('All fields are mandatory'));
        return redirect('/update?id='.$_POST['id']);
    }

    $product['p_name'] = $_POST['p_name'];
    $product['p_id'] = $_POST['id'];
    $product['previous_img'] = $_POST['previous_img'];
    $product['p_desc'] = $_POST['p_desc'];
    $product['p_price'] = $_POST['p_price'];
    $product['p_quantity'] = (int) $_POST['p_quantity'];
    $product['p_category'] = $_POST['p_category'];
	$images = $_FILES['p_imgs'];
	
	$filename = $images["name"];
    $tempname = $images["tmp_name"];  
	$allowTypes = array('jpg','png','jpeg','gif'); 
	$folder = "/images/";
	$destination = $_SERVER['DOCUMENT_ROOT'] . $folder . $filename;
	
	if(!empty($filename)){
	   if(move_uploaded_file($tempname, $destination)){
        	if(file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$product['previous_img'])){
    			unlink($_SERVER['DOCUMENT_ROOT'].'/images/'.$product['previous_img']);
    		}
	   }else{
    		Session::flash('errors', __('unable to save main image'));
            return redirect('/update?id='.$_POST['id']);
	    }
	}

	$db->query('UPDATE products
	SET p_name = :p_name, p_desc = :p_desc, p_price = :p_price, p_quantity = :p_quantity,  p_category = :p_category, p_main_img = :p_main_img, created_date = :created_date 
	WHERE p_id = :p_id;', [
		'p_id' => $_POST['id'],
		'p_name' => $product['p_name'],
		'p_desc' => $product['p_desc'],
		'p_price' => $product['p_price'],
		'p_quantity' => $product['p_quantity'],
		'p_main_img' => (!empty($filename) ? $filename : $product['previous_img']),
		'p_category' => $product['p_category'],
		'created_date' => date('Y-m-d H:i:s')
	]);
	
	
	// fetch newly added product and add other imgs in new table
	$pro_id = $db->query('select * from products where p_id = :p_id', [
		'p_id' => $product['p_id']
		])->find();

//         if(file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$product['previous_img'])){
// 			unlink($_SERVER['DOCUMENT_ROOT'].'/images/'.$product['previous_img']);
// 		}
		// r_print($pro_id);die();
		// GET post imgs
		$other_img = $_FILES['p_multi_imgs'];
		if(!empty($pro_id) && !empty($other_img)){
			foreach($_FILES['p_multi_imgs']['name'] as $key=>$val){ 
				// File upload path 
				$fileName = basename($_FILES['p_multi_imgs']['name'][$key]);
				$Image_name = $pro_id['p_id'].'-'.$fileName; 
				$targetFilePath =  $_SERVER['DOCUMENT_ROOT'] . $folder . $Image_name;
				
				// Check whether file type is valid 
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
				if(in_array($fileType, $allowTypes)){ 
					// Upload file to server 
					if(move_uploaded_file($_FILES["p_multi_imgs"]["tmp_name"][$key], $targetFilePath)){ 
						// Image db insert sql 
						$db->query('update images set img_name = :img_name, p_id = :p_id , created_date = :created_date where p_id =:p_id', [
							'img_name' => $Image_name,
							'p_id' => $pro_id['p_id'],
							'created_date' => date('Y-m-d H:i:s')
						]);
					}else{
						Session::flash('errors', __('unable to Update others image'));
						return redirect('/update?id='.$_POST['id']);
					}
				}
			} 
		}
		header('location: /shop');
		exit();
	}
view("update.view.php", [
	'heading' => 'Update',
	'errors' => Session::get('errors'),
	'update_val' => $update
]);
	
	