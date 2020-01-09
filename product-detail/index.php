<?php
	include(__DIR__ .'/../database/conect_to_db.php');
	if (isset($_GET['detailId'])){
		if (isset($_POST['reviewText'])){
			$SQL = "INSERT INTO review (product_id,user_id,review,date) values (:reviewProductId,:reviewUserId,:review,:date)";
			$handle = $connect->prepare($SQL);

			$handle->bindValue(":reviewProductId", $_GET['detailId']);
			$handle->bindValue(":reviewUserId", $_SESSION['user_id']);
			$handle->bindValue(":review", $_POST['reviewText']);
			$handle->bindValue(":date", date("d/m/y"));
    		$handle->execute();
		}

		if (isset($_POST['placeBid'])){
			$SQL = "
				UPDATE product SET product_bid=:bid WHERE product_id=:id AND
				:compareBid > product_bid
			";

			$handle = $connect->prepare($SQL);
			$handle->bindValue(":bid",$_POST['placeBid']);
			$handle->bindValue(":id",$_GET['detailId']);
			$handle->bindValue(":compareBid",$_POST['placeBid']);
			$handle->execute();
		}


		// get product detail
		$handle = $connect->prepare("SELECT * FROM product p 
			JOIN category c
			ON p.product_category = c.category_id
			JOIN user_account u
			ON p.user_id = u.user_id
			WHERE product_id = :productId");
		$handle->bindValue(":productId", $_GET['detailId']);
		$handle->execute();
		$getDetail = $handle->fetchAll(PDO::FETCH_ASSOC); // get cat



		// get review
		$sth = $connect->prepare("SELECT * FROM review r 
			JOIN user_account u 
			ON r.user_id = u.user_id 
			JOIN product p
			ON r.product_id = p.product_id
			WHERE r.product_id = ".$_GET['detailId']);
		$sth->execute();
		$reviews = $sth->fetchAll(PDO::FETCH_ASSOC);

		if (!empty($getDetail)){
			$now = date("ymdHi");
			$end = $getDetail[0]['time_end'];
			if ($now < $end){
			// Reference from StackOverflow: https://stackoverflow.com/questions/15688775/php-find-difference-between-two-datetime
				$string1 = "";
				$string2 = "";
				for ($i = 0; $i < 5; $i++){
					$string1 .= substr($now, $i*2,2);
					$string2 .= substr($end, $i*2,2);
					if ($i == 0 || $i == 1){$string1 .= "-";$string2 .= "-";}
					if ($i == 2){$string1 .= " ";$string2 .= " ";}
					if ($i == 3){$string1 .= ":";$string2 .= ":";}
				}
				$timeStamp1 = new DateTime($string1);
				$timeStamp2 = new DateTime($string2);
				$timeLeft = $timeStamp1->diff($timeStamp2);
				include ('product-detail.php');
			}
		}
	}
 ?>