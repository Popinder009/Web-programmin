<?php
	include(__DIR__ .'/../database/conect_to_db.php');
	// echo $_POST['add-product-category'];

	if (isset($_SESSION['user_id'],$_SESSION['username'])){
		if(!empty($_POST['add-product-name']) && !empty($_POST['add-product-description']) && !empty($_POST['add-product-time']) 
			&& $_POST['add-product-time'] > 0 && $_POST['add-product-time'] < 24*28 
			&& !empty($_FILES['add-product-image']) && !empty($_POST['add-product-category'])){
			try {
				global $connect;
				$timeExpired = date("ymdHi",strtotime('+'.$_POST['add-product-time'].' hours'));


				// Get image id increment
    			$selectImage = $connect->prepare("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'product'");
				$selectImage->execute();
				$getImage = $selectImage->fetchAll(PDO::FETCH_ASSOC);

				echo "<h1>successful</h1>";

				$file = $_FILES['add-product-image'];
				$name = "image".$getImage[0]['auto_increment'].".".ltrim($file['type'],'image/');

				$SQL = "insert into product (product_name,product_description,product_category,product_image,time_end,user_id) 
					values(:name,:description,:category,:image,:time,:userId)";

				$handle = $connect->prepare($SQL);
				$handle->bindValue(":name", $_POST['add-product-name']);
				$handle->bindValue(":description", $_POST['add-product-description']);
				$handle->bindValue(":category", $_POST['add-product-category']);
				$handle->bindValue(":image", $name);
				$handle->bindValue(":time", $timeExpired);
				$handle->bindValue(":userId", $_SESSION['user_id']);

    			$handle->execute();
    			move_uploaded_file($file['tmp_name'], __DIR__.'/../image/'.$name);

    		} catch (PDOException $e){
    			// fdsfa
    			echo "<h1>failed to Connect to DB</h1>";
    		}
		}

		if (isset($_GET['deleteProduct'])){
			try {
				global $connect;
				$SQL = "delete from product where product_id=:id";
				$handle = $connect->prepare($SQL);
				$handle->bindValue(":id", $_GET['deleteProduct']);
				$handle->execute();
			} catch (PDOException $e){
			}
		}

		try {
			// Get product
			$std = $connect->prepare("SELECT * FROM product WHERE user_id = :userId");
			$std->bindValue(":userId", $_SESSION['user_id']);
			$std->execute();
			$getProduct = $std->fetchAll(PDO::FETCH_ASSOC); // get cat

			// Get category
			$sth = $connect->prepare("SELECT category_id,category_name FROM category");
			$sth->execute();
			$getCategory = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat
		} catch (PDOException $e){
		}
		include ('add-product.php');
	}

    
?>