<?php 
	include('../database/conect_to_db.php');

	// Get category
	$sth = $connect->prepare("SELECT category_id,category_name FROM category");
	$sth->execute();
	$get = $sth->fetchAll(PDO::FETCH_ASSOC); // get cat
	
	include('product.php');
?>