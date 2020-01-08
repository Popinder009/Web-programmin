<?php 
	include(__DIR__ .'/../database/conect_to_db.php');
	// Get product
	$nono = $connect->prepare("SELECT * from product 
		join category on category.category_id = product.product_category");
	$nono->execute();
	$getProduct = $nono->fetchAll(PDO::FETCH_ASSOC);

	// var_dump($getProduct);
	// Get category
	$sth = $connect->prepare("SELECT category_id,category_name FROM category");
	$sth->execute();
	$get = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat

	if (isset($_GET['search'])){
    	try{
			global $connect;
			$SQL = "SELECT * from product 
				join category on category.category_id = product.product_category 
				WHERE product_name LIKE '%".$_GET['search']."%'"; // Referrence https://www.w3schools.com/sql/trysql.asp?filename=trysql_select_like
			echo $SQL;                        
			$handle = $connect->prepare($SQL);
			//$handle->bindValue(":search", $_GET['search']);
    		$handle->execute();
    		$getProduct = $handle->fetchAll(PDO::FETCH_ASSOC);
    	} catch (PDOException $e){
    		echo "<h1>failed to Connect to DB</h1>";
    	}
    	// var_dump($get);
    }

    if (isset($_GET['searchCate'])){
		try{
			global $connect;
			$SQL = "SELECT * from product 
				join category on category.category_id = product.product_category
				WHERE category_id = ".$_GET['searchCate'];
			$handle = $connect->prepare($SQL);
			//$handle->bindValue(":search", $_GET['search']);
    		$handle->execute();
    		$getProduct = $handle->fetchAll(PDO::FETCH_ASSOC);
    	} catch (PDOException $e){
    		echo "<h1>failed to Connect to DB</h1>";
    	}
    }
	
	// Search product

	function getProductBySearch($test){
    }

	include('product.php');
?>