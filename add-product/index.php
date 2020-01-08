<?php
	include(__DIR__ .'/../database/conect_to_db.php');
	// echo $_POST['add-product-category'];


	if (isset($_SESSION['user_id'],$_SESSION['username'])){

		// Get product
		$std = $connect->prepare("SELECT * FROM product WHERE user_id = :userId");
		$std->bindValue(":userId", $_SESSION['user_id']);
		$std->execute();
		$getProduct = $std->fetchAll(PDO::FETCH_ASSOC); // get cat

		// Get category
		$sth = $connect->prepare("SELECT category_id,category_name FROM category");
		$sth->execute();
		$getCategory = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat

		include ('add-product.php');




		if(!empty($_POST['add-product-name']) && !empty($_POST['add-product-description'])
			&& !empty($_FILES['add-product-image']) && !empty($_POST['add-product-category'])){
			// var_dump($file);
			try {
				global $connect;
				echo "<h1>successful</h1>";
				$file = $_FILES['add-product-image'];
				$name = rand(0,10000)."image.".ltrim($file['type'],'image/');
				move_uploaded_file($file['tmp_name'], __DIR__.'/../image/'.$name);

				$SQL = "insert into product (product_name,product_description,product_image,product_category,user_id) 
					values(:name,:description,:image,:category,:userId)";

				$handle = $connect->prepare($SQL);
				$handle->bindValue(":name", $_POST['add-product-name']);
				$handle->bindValue(":description", $_POST['add-product-description']);
				$handle->bindValue(":image", $name);
				$handle->bindValue(":category", $_POST['add-product-category']);
				$handle->bindValue(":userId", $_SESSION['user_id']);
    			$handle->execute();
    		} catch (PDOException $e){
    			// fdsfa
    			echo "<h1>failed to Connect to DB</h1>";
    		}
		}
	}

    
?>