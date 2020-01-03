<?php 
var_dump($_POST);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="front-end/ibuy.css" />
	</head>

	<body>
		<h1>DELETE CATEGORY</h1>

					<form method="POST" action="https://v.je/webyear2/front-end/delete_category.php">
						
						<label>Category name</label> <input type="text" name="category"/>
						
						
						<input type="submit" value="delete" />

					</form>













		<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>