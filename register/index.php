<?php 
	include(__DIR__ .'/../database/conect_to_db.php');
	if(isset($_POST['regUser']) && !empty($_POST['regUser'])){
		if(isset($_POST['regPassword']) && !empty($_POST['regPassword'])){
			try {
				global $connect;
				$SQL = "insert into user_account (username,password) values(:name,:pass)";
				$handle = $connect->prepare($SQL);
				$handle->bindValue(":name", $_POST['regUser']);
				$handle->bindValue(":pass", $_POST['regPassword']);
				var_dump($SQL);
    			$handle->execute();

    			header('Location: /login/'); // redirect to another page if register successful
			} catch (PDOException $e){
			}
    	}
	}
?>

<!DOCTYPE HTML>
<html> 
	<head>
		<link rel="stylesheet" href="css.php">
	</head>
<body>
<h2>Register</h2>
<form action="/register/" method="post">
<b>username:</b> <input type="text" name="regUser"><br>
          
<b>Password:</b> <input type="text" name="regPassword"><br>
<input type="submit">
</form>


</body>
</html>