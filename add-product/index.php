<?php
	include(__DIR__ .'/../database/conect_to_db.php');
	if(!empty($_POST['add-product-name']) && !empty($_POST['add-product-description'])
		&& !empty($_POST['add-product-image']) && !empty($_POST['add-product-category'])){
		try{
			echo "<h1>successful</h1>";
			global $connect;
			$SQL = "insert into product (product_name,product_description,product_image,product_category)
			 values(:name,:description,:image,:category)";                        
			$handle = $connect->prepare($SQL);
			$handle->bindValue(":name", $_POST['add-product-name']);
			$handle->bindValue(":description", $_POST['add-product-description']);
			$handle->bindValue(":image", $_POST['add-product-image']);
			$handle->bindValue(":category", $_POST['add-product-category']);
    		$handle->execute();
    	} catch (PDOException $e){
    		// fdsfa
    		echo "<h1>failed to Connect to DB</h1>";
    	}
	}

	// Get category

		$sth = $connect->prepare("SELECT category_id,category_name FROM category");
		$sth->execute();
		$get = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat


?>

<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="front-end/ibuy.css" />
		<style>
			td,th {
				border: 2px solid black;
			}
		</style>
	</head>

	<body>
		<hr />
					<h1>ADD PRODUCT</h1>

					<form method="POST">
						
						<label>Product name </label> <input type="text" name="add-product-name"/><br>

						<label>Product Description </label> <textarea name="add-product-description"></textarea><br>

						<label>Product Image </label> <input type="text" name="add-product-image"/><br>

						<label>Product Category: </label><br>
							<?php
								foreach ($get as $value){
									echo "
									<input type=radio value=".$value['category_id']." name=add-product-category/>
										<label>".$value['category_name']."</label><br>
									";
								}
							?>
						<input type="submit" value="Submit" />

					</form>

			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>