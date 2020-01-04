<?php 
	include(__DIR__ .'/../database/conect_to_db.php');
	echo "<h1>".$_SESSION['username']."</h1>";
	if(isset($_POST['logUser']) && !empty($_POST['logUser'])){
		if(isset($_POST['logPassword']) && !empty($_POST['logPassword'])){
			try {
				global $connect;
				$SQL = "SELECT * FROM user_account WHERE username=:name AND password=:pass";
				$handle = $connect->prepare($SQL);
				$handle->bindValue(":name", $_POST['logUser']);
				$handle->bindValue(":pass", $_POST['logPassword']);
    			$handle->execute();

   		 		$get = $handle->fetchAll(PDO::FETCH_ASSOC);
   		 			if (!empty($get)){
   		 				$_SESSION['user_id'] = $get[0]['user_id'];
   		 				$_SESSION['username'] = $get[0]['username'];
   		 				header('Location: /product/');
   		 			}
    			var_dump($get);
			} catch (PDOException $e){
				echo 'failed';
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
		<h2>Login</h2>
		<form action="/login/" method="post">
			<b>username:</b> <input type="text" name="logUser"><br>      
			<b>Password:</b> <input type="text" name="logPassword"><br>
			<input type="submit">
		</form>
	</body>
</html>