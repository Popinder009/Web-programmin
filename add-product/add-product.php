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
			<main>
				<h1>ADD PRODUCT</h1>

				<form method="POST" enctype="multipart/form-data"> <!-- Accept $_FILES[] type -->
						
					<label>Product name </label> <input type="text" name="add-product-name"/><br>

						<label>Product Description </label> <textarea name="add-product-description"></textarea><br>

						<lable>End hours duration: </lable><input type="number" name="add-product-time"><br>

						<label>Product Image </label> <input type="file" name="add-product-image" accept="image/*"/><br>

						<label>Product Category: </label><br>
						<?php
							foreach ($getCategory as $value){
								echo "
								<input type=radio value=".$value['category_id']." name=add-product-category>
									<label>".$value['category_name']."</label><br>
								";
							}
						?>
						<input type="submit" value="Submit" />

					</form>
					<table style="width:100%">
						<tr>
							<th>product-id</th>
							<th>product-name</th>
							<th>edit-product</th>
							<th>delete-product</th>
						</tr>
						<?php
						 // click here to trigger the below input tag
							foreach($getProduct as $value){
								//echo "dasljkfsadf<br>";

								echo "<tr>
									<td>".$value['product_id']."</td>
									<td>".$value['product_name']."</td>
									<td>
										<form method=GET action=/edit-product>
											<input name=editId type=hidden value=".$value['product_id'].">
											<input type=submit value=edit>
										</form>
									</td>
									<td>
										<form method=GET action=/add-product>
											<input name=deleteProduct type=hidden value=".$value['product_id'].">
											<input type=submit value=delete>
										</form>
									</td>
								</tr>";
							}
						?>
					</table>

			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>