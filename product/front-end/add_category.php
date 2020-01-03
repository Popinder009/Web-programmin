<?php 

include(__DIR__ .'/../database/conect_to_db.php');
if(!empty($_POST['category'])){
global $connect;
$SQL = "insert into category values('".$_POST['category']. "')";    
echo $SQL;                    
$handel = $connect->prepare($SQL);
    $handel->execute();
}
?>




<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="front-end/ibuy.css" />
	</head>

	<body>
		<hr />
					<h1>ADD CATEGORY</h1>

					<form method="POST">
						
						<label>Category</label> <input type="text" name="category"/>
						
						
						<input type="submit" value="Submit" />

					</form>



			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>
