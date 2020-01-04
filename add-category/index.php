<?php
	include(__DIR__ .'/../database/conect_to_db.php');
	if(!empty($_POST['add-category'])){
		try {
			global $connect;
			$SQL = "insert into category (category_name) values('".$_POST['add-category']. "')";                        
			$handle = $connect->prepare($SQL);
    		$handle->execute();
    	} catch (PDOException $e){
		}
	}

	// Edit category
	if(isset($_GET['edit'])){
		if(isset($_GET['name'])){
			try {
				global $connect;
				$SQL = "update category SET category_name=:name WHERE category_id=:id";
				$handle = $connect->prepare($SQL);
				$handle->bindValue(":name", $_GET['name']);
				$handle->bindValue(":id", $_GET['edit']);
				$handle->execute();
			} catch (PDOException $e){
			}
		}
	}

	// Delete category
		if(isset($_GET['delete'])){
			try {
				global $connect;
				$SQL = "delete from category where category_id=:id";
				$handle = $connect->prepare($SQL);
				$handle->bindValue(":id", $_GET['delete']);
				$handle->execute();
			} catch (PDOException $e){
			}
		}

	// Get category

		$sth = $connect->prepare("SELECT category_id,category_name FROM category");
		$sth->execute();
		$get = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat

		
	//var_dump($get); // show category
		echo $_SESSION['username'];

		include('add-cate.html');
?>