<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="../ibuy.css" />
	</head>

	<body>
		
		<header>
			<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

			<form action="#">
				<input type="text" name="search" placeholder="Search for anything" />
				<input type="submit" name="submit" value="Search" />
				<a href="/login"><img src="images/images.png" style="width:30px height:auto"></a>
			</form>
		</header>

		<nav>
			<ul>
				<?php
					$cateNum = 0;
					foreach($get as $value){
						$cateNum++;
						if($cateNum > 8)continue;
							echo "
								<li><a href=#>".$value['category_name']."</a></li>
							";
						/*<li><a href="#">Home </a></li>
						<li><a href="#">Garden</a></li>
						<li><a href="#">Electronics</a></li>
						<li><a href="#">Fashion</a></li>
						<li><a href="#">Sport</a></li>
						<li><a href="#">Health</a></li>
						<li><a href="#">Toys</a></li>
						<li><a href="#">Motors</a></li>*/
					}
					echo "<li><a href=#>".$cateNum."</a></li>"
				?>
				
			</ul>
		</nav>
		<img src="images/randombanner.php" alt="Banner" />

		<main>

			<h1>Latest Listings / Search Results / Category listing</h1>

			<ul class="productList">
				<?php
					foreach($getProduct as $value){
						echo "
							<li>
								<img src=product.png alt=product name>
								<article>
									<h2>".$value['product_name']."</h2>
									<h3>".$value['category_name']."</h3>
									<p>".$value['product_description']."</p>
									<p class=price>Current bid: £123.45</p>
									<a href=# class=more>More &gt;&gt;</a>
								</article>
							</li>
						";
					}
				?>
				
			</ul>

			<hr />

			<h1>Product Page</h1>
			<article class="product">

					<img src="product.png" alt="product name">
					<section class="details">
						<h2>Product name</h2>
						<h3>Product category</h3>
						<p>Auction created by <a href="#">User.Name</a></p>
						<p class="price">Current bid: £123.45</p>
						<time>Time left: 8 hours 3 minutes</time>
						<form action="#" class="bid">
							<input type="text" placeholder="Enter bid amount" />
							<input type="submit" value="Place bid" />
						</form>
					</section>
					<section class="description">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>


					</section>

					<section class="reviews">
						<h2>Reviews of User.Name </h2>
						<ul>
							<li><strong>Ali said </strong> great ibuyer! Product as advertised and delivery was quick <em>29/09/2019</em></li>
							<li><strong>Dave said </strong> disappointing, product was slightly damaged and arrived slowly.<em>22/07/2019</em></li>
							<li><strong>Susan said </strong> great value but the delivery was slow <em>22/07/2019</em></li>

						</ul>

						<form>
							<label>Add your review</label> <textarea name="reviewtext"></textarea>

							<input type="submit" value="Add Review" />
						</form>
					</section>
					</article>

					



			<footer>
				&copy; ibuy 2019
			</footer>
		</main>
	</body>
</html>
