<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="../ibuy.css" />
		<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
	</head>

	<body>
		<div style="margin: 100px;">
			<h1>Product Page</h1>
			<article class="product">
				<img class="detailImage" src=/../image/<?php echo $getDetail[0]['product_image'];?> alt="product name">
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
					<time>Time left: <?php echo $timeLeft->format('%d days %H hours %i minutes'); ?></time>
					<form method="POST" class="bid">
						<input name="placeBid" type="text" placeholder="Enter bid amount" />
						<input type="submit" value="Place bid" />
					</form>
						<a href="https://www.facebook.com/sharer/sharer.php?u=" class="fa fa-facebook"></a>
						<a href="https://twitter.com/intent/tweet?text=" class="fa fa-twitter"></a>
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
		</div>
	</body>
</html>