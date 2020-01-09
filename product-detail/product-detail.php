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
			<img src=/../image/<?php echo $getDetail[0]['product_image'];?> alt="product name">
			<section class="details">
				<h2>
					<?php echo $getDetail[0]['product_name']; ?>
				</h2>

				<h3>
					<?php echo $getDetail[0]['category_name']; ?>
				</h3>

				<p>Auction created by 
					<a href="#">
						<?php echo $getDetail[0]['username']; ?>
					</a>
				</p>

				<p class="price">Current bid: £<?php echo $getDetail[0]['product_bid']; ?></p>
				<time>Time left: 8 hours 3 minutes</time>
				<form method="POST" class="bid">
					<input name="placeBid" type="text" placeholder="Enter bid amount" />
					<input type="submit" value="Place bid" />
				</form>
			</section>
			<section class="description">
			<p><?php echo $getDetail[0]['product_description']; ?></p>
			</section>
			<section class="reviews">
				<h2>Reviews of <?php echo $getDetail[0]['username']; ?> </h2>
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