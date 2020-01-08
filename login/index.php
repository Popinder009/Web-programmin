<?php 
	include(__DIR__ .'/../database/conect_to_db.php');
	// session_destroy();
	if (!isset($_SESSION['user_id'],$_SESSION['username'])){
		include ('login.php');
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
	}
?>