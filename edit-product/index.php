<?php
	include(__DIR__ .'/../database/conect_to_db.php');
	if(!empty($_POST['edit-product-name']) && !empty($_POST['edit-product-description'])
		&& !empty($_POST['edit-product-image']) && !empty($_POST['edit-product-category'])){
		if (isset($_GET['editId'])){
			echo "VERY GOOD";
			try {
				echo "<h1>successful</h1>";
				global $connect;
				$SQL = "update product SET product_name=:name, product_description=:description,
					product_image=:image, product_category=:category WHERE product_id=:id";
				$handle = $connect->prepare($SQL);
				$handle->bindValue(":id", $_GET['editId']);
				$handle->bindValue(":name", $_POST['edit-product-name']);
				$handle->bindValue(":description", $_POST['edit-product-description']);
				$handle->bindValue(":image", $_POST['edit-product-image']);
				$handle->bindValue(":category", $_POST['edit-product-category']);
    			$handle->execute();
    		} catch (PDOException $e){
    			// fdsfa
    			echo $e->getMessage();
    		}
    	}
	}

	// Get category

		$sth = $connect->prepare("SELECT category_id,category_name FROM category");
		$sth->execute();
		$getCategory = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat


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
					<h1>EDIT PRODUCT</h1>

					<form method="POST">
						
						<label>Product name </label> <input type="text" name="edit-product-name"/><br>

						<label>Product Description </label> <textarea name="edit-product-description"></textarea><br>

						<label>Product Image </label> <input type="text" name="edit-product-image"/><br>

						<label>Product Category: </label><br>
							<?php
								foreach ($getCategory as $value){
									echo "
									<input type=radio value=".$value['category_id']." name=edit-product-category>
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