<?php
use Core\Database;
use Core\Session;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if(isset($_POST['add_product'])){
    if(empty($_POST['p_name']) || empty($_POST['p_desc']) ||  empty($_POST['p_price'] )){
		Session::flash('errors', __('All fields are mandatory'));
        return redirect('/add_product');
    }

    $product['p_name'] = $_POST['p_name'];
    $product['p_desc'] = $_POST['p_desc'];
    $product['p_price'] = $_POST['p_price'];
    $product['p_quantity'] = $_POST['p_quantity'];
    $product['p_category'] = $_POST['p_category'];
	$images = $_FILES['p_imgs'];

    // Check product exists or not
    $exists = $db->query('select * from products where p_name = :p_name', [
        'p_name' => $product['p_name']
    ])->find();
	
    if(!empty($exists)){
		Session::flash('errors', __('Product :p_name Alredy Exists!', [$product['p_name']]));
        return redirect('/add_product');
    }
	
	$filename = $images["name"];
    $tempname = $images["tmp_name"];  
	$allowTypes = array('jpg','png','jpeg','gif'); 
	$folder = "/images/";
	$destination = $_SERVER['DOCUMENT_ROOT'] . $folder . $filename;
	
	if(move_uploaded_file($tempname, $destination)){	
		// All good lets add product
		$db->query('INSERT INTO products(p_name, p_desc, p_price, p_quantity, p_category, p_main_img, created_date) VALUES(:p_name, :p_desc, :p_price, :p_quantity, :p_category, :p_main_img, :created_date)', [
			'p_name' => $product['p_name'],
			'p_desc' => $product['p_desc'],
			'p_price' => $product['p_price'],
			'p_quantity' => $product['p_quantity'],
			'p_main_img' => $filename,
			'p_category' => $product['p_category'],
			'created_date' => date('Y-m-d H:i:s')
		]);
	}else{
		Session::flash('errors', __('unable to save main image'));
        return redirect('/add_product');
	}
	
	// fetch newly added product and add other imgs in new table
	$pro_id = $db->query('select * from products where p_name = :p_name', [
        'p_name' => $product['p_name']
    ])->find();
	
	// r_print($pro_id);die();
	// GET post imgs
	$other_img = $_FILES['p_multi_imgs'];
	if(!empty($pro_id) && !empty($other_img)){
		foreach($_FILES['p_multi_imgs']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['p_multi_imgs']['name'][$key]);
			$Image_name = $pro_id['p_id'].'-'.$fileName; 
            $targetFilePath =  $_SERVER['DOCUMENT_ROOT'] . $folder . $Image_name; 
// 			r_print($targetFilePath);die();
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["p_multi_imgs"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
					$db->query('INSERT INTO images(img_name, p_id, created_date) VALUES(:img_name, :p_id, :created_date)', [
						'img_name' => $Image_name,
						'p_id' => $pro_id['p_id'],
						'created_date' => date('Y-m-d H:i:s')
					]);
                }else{
					Session::flash('errors', __('unable to save others image'));
        			return redirect('/add_product');
				}
			}
        } 
	}
	/*for($i = 0; $i < count($images['name']); $i++) {
		$fileName = basename($images["name"][$i]); 
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
	 
		// Allow certain file formats 
		$allowTypes = array('jpg','png','jpeg','gif'); 
		if(in_array($fileType, $allowTypes)){ 
			$image = $images['tmp_name'][$i]; 
			$imgContent = addslashes(file_get_contents($image)); 
		// r_print($imgContent);die();
			// $compressedImage = compressImage($images['tmp_name'][$i], $fileType);
		 
			// Insert image content into database 
			$db->query('INSERT INTO images(img_name, image, mime, p_id, created_date) VALUES(:img_name, :image, :mime, :p_id, :created_date)', [
				'img_name' => $fileName,
				'image' => base64_encode($imgContent),
				'mime' => $images["type"],
				'p_id' => $pro_id['p_id'],
				'created_date' => date('Y-m-d H:i:s')
			]); 
		}
	} */
    header('location: /shop');
    exit();
}
view("add_product.view.php", [
    'heading' => 'Add Product',
    'errors' => Session::get('errors')
]);