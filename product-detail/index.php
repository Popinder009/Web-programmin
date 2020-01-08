<?php
	include(__DIR__ .'/../database/conect_to_db.php');
		if (isset($_GET['detailId'])){
			$handle = $connect->prepare("SELECT * FROM product p 
				JOIN category c
				ON p.product_category = c.category_id
				JOIN user_account u
				ON p.user_id = u.user_id
				WHERE product_id = :productId");
			$handle->bindValue(":productId", $_GET['detailId']);
			$handle->execute();
			$getDetail = $handle->fetchAll(PDO::FETCH_ASSOC); // get cat
		}

		if (isset($_POST['reviewText'])){
			$SQL = "INSERT INTO review (product_id,user_id,review,date) values (:reviewProductId,:reviewUserId,:review,:date)";
			$handle = $connect->prepare($SQL);

			$handle->bindValue(":reviewProductId", $_GET['detailId']);
			$handle->bindValue(":reviewUserId", $_SESSION['user_id']);
			$handle->bindValue(":review", $_POST['reviewText']);
			$handle->bindValue(":date", date("d/m/y"));
    		$handle->execute();
		}

		// get review
		$sth = $connect->prepare("SELECT * FROM review r 
			JOIN user_account u 
			ON r.user_id = u.user_id 
			JOIN product p
			ON r.product_id = p.product_id
			WHERE r.product_id = ".$_GET['detailId']);
		$sth->execute();
		$reviews = $sth->fetchAll(PDO::FETCH_ASSOC);






		var_dump($reviews);

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="../ibuy.css" />
	</head>

	<body>
		<h1>Product Page</h1>
		<article class="product">
			<img src=/../image/<?php if(!empty($getDetail))echo $getDetail[0]['product_image'];?> alt="product name">
			<section class="details">
				<h2>
					<?php if(!empty($getDetail))echo $getDetail[0]['product_name']; ?>
				</h2>

				<h3>
					<?php if(!empty($getDetail))echo $getDetail[0]['category_name']; ?>
				</h3>

				<p>Auction created by 
					<a href="#">
						<?php if(!empty($getDetail))echo $getDetail[0]['username']; ?>
					</a>
				</p>

				<p class="price">Current bid: £<?php if(!empty($getDetail))echo $getDetail[0]['product_bid']; ?></p>
				<time>Time left: 8 hours 3 minutes</time>
				<form action="#" class="bid">
					<input type="text" placeholder="Enter bid amount" />
					<input type="submit" value="Place bid" />
				</form>
			</section>
			<section class="description">
			<p><?php if(!empty($getDetail))echo $getDetail[0]['product_description']; ?></p>
			</section>
			<section class="reviews">
				<h2>Reviews of <?php if(!empty($getDetail))echo $getDetail[0]['username']; ?> </h2>
				<ul>
					<?php 
						foreach ($reviews as $value){
							echo "
								<li><strong>".$value['username']." said </strong>".$value['review']."<em> ".$value['date']."</em></li>
							";
						}
					?>
				</ul>
				<form method="POST">
					<label>Add your review</label> <textarea name="reviewText"></textarea>
					<input type="submit" value="Add Review" />
				</form>
			</section>
		</article>
	</body>
</html>